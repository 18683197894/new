<?php
$header = App\Model\SysMenu::where('id',$label)->first();
$this->title = $team->name;
$this->params = [
  ['label'=>$header->getmenu->title],
  ['label'=>$header->title,'url'=>url(url($header->url))]
];
?>
@extends('Backend.public')
@section('style')

@endsection
@section('open')
<div class="x-body house_add" style="display:none;position:relative;z-index:20">
    <form class="layui-form" id="myform" action="{{ url('/backend/about/team/member-add') }}" method="post" enctype="multipart/form-data" lay-filter="component-form-group" autocomplete="off">
      	@csrf

      	<input type="hidden" name="team_id" value="{{ $team->id }}">
  		<div class="layui-form-item">
			<label class="layui-form-label">姓名</label>
			<div class="layui-input-block">
				<input type="text" name="name" lay-verify="name|required" value="{{ old('name') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">职务</label>
			<div class="layui-input-block">
				<input type="text" name="post" lay-verify="post|required" value="{{ old('post') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">设计理念</label>
			<div class="layui-input-block">
				<input type="text" name="design_concept" lay-verify="design_concept" value="{{ old('design_concept') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">设计风格</label>
			<div class="layui-input-block">
				<input type="text" name="design_manifesto" lay-verify="design_manifesto" value="{{ old('design_manifesto') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item layui-form-text">
      <label class="layui-form-label">简介</label>
      <div class="layui-input-block">
        <textarea name="synopsis" lay-verify="synopsis" placeholder="请输入" class="layui-textarea"></textarea>
      </div>
    </div>
          <div class="layui-form-item">
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-body">
                <div class="layui-upload">
                  <button type="button" class="layui-btn layui-btn-normal" id="test-upload-change">选择文件</button>
                </div>
              </div>
            </div>
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
<div class="x-body member_edit" style="display:none;position:relative;z-index:20">
    <form class="layui-form" id="edit" action="{{ url('/backend/about/team/member-edit') }}" method="post" enctype="multipart/form-data" lay-filter="component-form-group" autocomplete="off">
        @csrf

        <input type="hidden" name="id" value="">
      <div class="layui-form-item">
      <label class="layui-form-label">姓名</label>
      <div class="layui-input-block">
        <input type="text" name="name" lay-verify="name|required" value=""  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">职务</label>
      <div class="layui-input-block">
        <input type="text" name="post" lay-verify="post|required" value=""  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">设计理念</label>
      <div class="layui-input-block">
        <input type="text" name="design_concept" lay-verify="design_concept" value=""  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">设计风格</label>
      <div class="layui-input-block">
        <input type="text" name="design_manifesto" lay-verify="design_manifesto" value=""  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item layui-form-text">
      <label class="layui-form-label">简介</label>
      <div class="layui-input-block">
        <textarea name="synopsis" lay-verify="synopsis" placeholder="请输入" class="layui-textarea"></textarea>
      </div>
    </div>
          <div class="layui-form-item">
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-body">
                <div class="layui-upload">
                  <button type="button" class="layui-btn layui-btn-normal" id="test-upload-change2">选择文件</button>
                </div>
              </div>
            </div>
          </div>
          </div>
      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="member_edit">立即提交</button>
          </div>
        </div>
      </div>
      
    </form>
</div>
@endsection
@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" method="get"> 
          <input type="hidden" name="id" value="{{ $request['id'] }}">
          <input type="hidden" name="label" value="{{ $request['label'] }}">
          <input type="text" name="name"  placeholder="请输入姓名" value="@if(isset($request['name'])) {{ $request['name'] }} @endif" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="houseDelAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="house_add('添加成员')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $member->count() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th style="width:5%">ID</th>
            <th style="width:8%">姓名</th>
            <th style="width:8%">职务</th>
            <th style="width:20%">简介</th>
            <th style="width:15%">设计理念</th>
            <th style="width:15%">设计宣言</th>
            <th style="width:8%">头像</th>
            <th style="width:8%">排序</th>
            <th style="width:15%">操作</th>
        </thead>
        <tbody>
          @foreach($member as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->post }}</td>
            <td>{{ $v->synopsis }}</td>
            <td>{{ $v->design_concept }}</td>
            <td>{{ $v->design_manifesto }}</td>
            <td>
              @if($v->image)
              <a href="{{ asset($v->image) }}" target="_blank" class="layui-btn layui-btn-sm layui-btn-normal">查看</a>
              @endif
            </td>
            <td>{{ $v->stort }}</td>
            <td>
              <a title="编辑" class="layui-btn layui-btn-sm "  onclick="member_edit(this,'团队编辑','{{json_encode($v)}}')" href="javascript:;">
                编辑
              </a>
              <a title="删除" class="layui-btn layui-btn-sm  layui-btn-danger" onclick="house_del(this,'{{$v->id}}','{{ $v->name }}')" href="javascript:;">删除</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        {{  $member->appends($request)->links() }}
      </div>

    </div>
    

@endsection

@section('js')
<script type="text/javascript">

  layui.use(['form','upload'],function(){
    form = layui.form;
    upload = layui.upload;
        //选完文件后不自动上传
    upload.render({
      elem: '#test-upload-change'
      ,url: '/upload/'
      ,auto: false
    });
    upload.render({
      elem: '#test-upload-change2'
      ,url: '/upload/'
      ,auto: false
    });
    form.on('submit(project_add)',function(data){
      if(data.field.file == "")
      {
        layMsgError('请上传头像');
      return false;

      }
    });
  })
    function houseDelAll()
    {
      var ids = tableCheck.getData();
      if(ids.length == 0)
      {
        return false;
      }
      layer.confirm('确定要删除ID为 '+ids+' 的成员吗?',function(index){
        $.ajax({
          'url' : "{{ url('/backend/about/team/member-del') }}",
          'type' : 'post',
          'data' : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
          success : function(res)
          {
            res = $.parseJSON(res);
            if(res.code == 200)
            {
                $.each(ids,function(index,value){    
                  $("div[data-id='"+value+"']").parents('tr').remove();
                })
              layMsgOk(res.info);
            }
          },
          error : function(error)
          {
            layMsgError('操作失败');
          }
        });
       
      });
    }
    function house_del(obj,id,name)
    {
      layer.confirm('确定删除成员 '+name+ ' 吗?',function(index){
        $.ajax({
          url : "{{ url('/backend/about/team/member-del') }}",
          type : 'post',
          data : {ids:id,_token:$("meta[name='csrf-token']").attr('content')},
          success : function(res)
          {
              res = $.parseJSON(res);
              if(res.code == 200)
              {
                $(obj).parents('tr').remove();
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
        });
      });
    }

  function member_edit(obj,title,data)
  { 
    data = $.parseJSON(data);

    document.getElementById("edit").reset();
    $('.member_edit').find('input[type="file"]').val('');
    $('.member_edit').find('.layui-upload-choose').html('');
    $('.member_edit').find('input[name="id"]').val(data.id);
    $('.member_edit').find('input[name="name"]').val(data.name);
    $('.member_edit').find('input[name="post"]').val(data.post);
    $('.member_edit').find('input[name="design_concept"]').val(data.design_concept);
    $('.member_edit').find('input[name="design_manifesto"]').val(data.design_manifesto);
    $('.member_edit').find('input[name="design_manifesto"]').val(data.design_manifesto);
    $('.member_edit').find('input[name="stort"]').val(data.stort);
    $('.member_edit').find('textarea[name="synopsis"]').html(data.synopsis);

    var width = ($(document).width() * 0.6)+'px';
    var height = ($(document).height() * 0.8)+'px';
    layer.open({
      type : 1,
      title : title,
      fix: false, //不固定
      maxmin: true,
      shadeClose: true,
      shade: 0.4,
      area : [width,height],
      content : $('.member_edit')
    })
  }

	function house_add(title)
	{  
    $('.house_add').find('input[type="file"]').val('');
    $('.house_add').find('.layui-upload-choose').html('');
    document.getElementById("myform").reset();
		var width = ($(document).width() * 0.6)+'px';
    var height = ($(document).height() * 0.8)+'px';
    layer.open({
      type : 1,
      title : title,
      fix: false, //不固定
      maxmin: true,
      shadeClose: true,
      shade: 0.4,
      area : [width,height],
      content : $('.house_add')
    })
	}

</script>
@endsection