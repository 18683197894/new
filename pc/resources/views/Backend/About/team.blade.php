<?php
$header = App\Model\SysMenu::where('url','/'.\Request::path())->with('getMenu')->first();
$this->title = $header->title;
$this->params = [
  ['label'=>$header->getmenu->title]
];
?>
@extends('Backend.public')

@section('style')

@endsection

@section('open')
<div class="x-body project_add" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('/backend/about/team-add') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      @csrf

      <div class="layui-form-item">
      <label class="layui-form-label">团队名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" lay-verify="name|required" value="{{ old('name') }}"  autocomplete="off" placeholder="请输入项目名称" class="layui-input">
      </div>
    </div>

      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="project_add">立即提交</button>
          </div>
        </div>
      </div>
      
    </form>
</div>
<div class="x-body team_edit" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('/backend/about/team-edit') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      @csrf
      <input type="hidden" name="id" value="">
      <div class="layui-form-item">
      <label class="layui-form-label">团队名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" lay-verify="name|required" value="{{ old('name') }}"  autocomplete="off" placeholder="请输入项目名称" class="layui-input">
      </div>
    </div>

      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="project_add">立即提交</button>
          </div>
        </div>
      </div>
      
    </form>
</div>
@endsection()

@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input type="text" name="name" value="@if(isset($request['name'])) {{ $request['name'] }} @endif"  placeholder="请输入团队名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn" onclick="project_add('添加团队')"><i class="layui-icon"></i>添加团队</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $team->count() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>

            <th>ID</th>
            <th>团队名称</th>
            <th>成员</th>
            <th style='width:15%'>操作</th>
        </thead>
        <tbody>
          @foreach($team as $k => $v)
          <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->name }}</td>
            <td><a href="{{ url('/backend/about/team/member') }}?id={{ $v->id }}&label={{$header->id}}" class="layui-btn layui-btn-sm layui-btn-normal">成员管理</a></td>
            <td>
              <a title="编辑" class="layui-btn layui-btn-sm "  onclick="team_edit(this,'团队编辑','{{ $v->id }}','{{$v->name}}')" href="javascript:;">
                编辑
              </a>
              <a href="javascript:;" onclick="project_del(this,'{{ $v->id }}','{{ $v->name }}')" class="layui-btn layui-btn-sm  layui-btn-danger">删除</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">

      </div>

    </div>
    

@endsection

@section('js')
<script type="text/javascript">
layui.use(['form'],function(){
    form = layui.form;
    form.on('submit(sreach)',function(data){
      window.location.href ='{{ url()->current() }}?name='+data.field.name;
      return false;
    })
})
  function project_add(title)
  {
    var width = ($(window).width() * 0.3)+'px';
            var height = ($(window).height() * 0.4)+'px';
            layer.open({
              type : 1,
              title : title,
              fix: false, //不固定
              maxmin: true,
              shadeClose: true,
              shade: 0.4,
              area : [width,height],
              content : $('.project_add')
            })
  }
  function team_edit(obj,title,id,name)
  {         
            $('.team_edit').find('input[name="id"]').val(id);
            $('.team_edit').find('input[name="name"]').val(name);
            var width = ($(window).width() * 0.3)+'px';
            var height = ($(window).height() * 0.4)+'px';
            layer.open({
              type : 1,
              title : title,
              fix: false, //不固定
              maxmin: true,
              shadeClose: true,
              shade: 0.4,
              area : [width,height],
              content : $('.team_edit')
            })
  }

  function project_del(obj,id,name)
  {
    layer.confirm('确定删除团队:'+name+' 吗?',function(index){
      layer.close(index);
      $.ajax({
        url : "{{ url('/backend/about/team-del') }}",
        data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
        type : 'post',
        success : function(res)
        {
          res = $.parseJSON(res);
          if(res.code == 200)
          {
            $(obj).parents('tr').css('display','none');
            layMsgOk(res.info);
          }else
          {
            layMsgError(res.info);
          }
        },
        error : function(error)
        {
          layMsgError('操作失败');
        }
      })
    });
  }

</script>
@endsection