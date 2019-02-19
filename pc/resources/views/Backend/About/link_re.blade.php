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
<div class="x-body house_add" style="display:none;position:relative;z-index:20">
    <form class="layui-form" id="myform" action="{{ url('/backend/link-add') }}" method="post"lay-filter="component-form-group" au'tocomplete="off">'
      	@csrf
        <input type="hidden" name="status" value="2">
  		<div class="layui-form-item">
			<label class="layui-form-label">链接名称</label>
			<div class="layui-input-block">
				<input type="text" name="name" lay-verify="name|required" value="{{ old('name') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">链接地址</label>
			<div class="layui-input-block">
				<input type="text" name="url" lay-verify="required" value="{{ old('url') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
     <div class="layui-form-item">
        <label class="layui-form-label">链接类型</label>
        <div class="layui-input-block">
          <select name="type" lay-filter="aihao">
            <option value=""></option>
            <option value="0">站内</option>
            <option value="1">站外</option>
          </select>
        </div>
      </div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
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
<div class="x-body link_edit" style="display:none;position:relative;z-index:20">
    <form class="layui-form" id="edit" action="{{ url('/backend/link-edit') }}" method="post"lay-filter="edit" au'tocomplete="off">'
        @csrf
        <input type="hidden" name="id">
      <div class="layui-form-item">
      <label class="layui-form-label">链接名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" lay-verify="name|required" value="{{ old('name') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">链接地址</label>
      <div class="layui-input-block">
        <input type="text" name="url" lay-verify="required" value="{{ old('url') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
     <div class="layui-form-item">
        <label class="layui-form-label">链接类型</label>
        <div class="layui-input-block">
          <select name="type" lay-filter="aihao">
            <option value=""></option>
            <option value="0">站内</option>
            <option value="1">站外</option>
          </select>
        </div>
      </div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="edit">立即提交</button>
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
          <input type="text" name="name"  placeholder="请输入名称" value="@if(isset($request['name'])) {{ $request['name'] }} @endif" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="houseDelAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="house_add('添加链接')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $link->count() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th style="width:8%">
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>名称</th>
            <th>路由地址</th>
            <th style="width:10%">链接类型</th>
            <th style="width:10%">排序</th>
            <th style="width:15%">操作</th>
        </thead>
        <tbody>
          @foreach($link as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->url }}</td>
            <td>{{ empty($v->type)?'站内':'站外' }}</td>
            <td>{{ $v->stort }}</td>
            <td>
              <a title="编辑" class="layui-btn layui-btn-sm "  onclick="link_edit(this,'链接编辑','{{json_encode($v)}}')" href="javascript:;">
                编辑
              </a>
              <a title="删除" class="layui-btn layui-btn-sm  layui-btn-danger" onclick="house_del(this,'{{$v->id}}','{{ $v->name }}')" href="javascript:;">删除</a>
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
    function houseDelAll()
    {
      var ids = tableCheck.getData();
      if(ids.length == 0)
      {
        return false;
      }
      layer.confirm('确定要删除ID为 '+ids+' 的链接吗?',function(index){
        $.ajax({
          'url' : "{{ url('/backend/link-del') }}",
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
      layer.confirm('确定删除链接 '+name+ ' 吗?',function(index){
        $.ajax({
          url : "{{ url('/backend/link-del') }}",
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

  function link_edit(obj,title,data)
  { 
    data = JSON.parse(data);
    document.getElementById("edit").reset();
    var form = layui.form;
    form.val("edit", {
      "name": data.name, // "name": "value"
      "url": data.url,
      "type": data.type,
      "stort": data.stort,
      "id": data.id,
    })
    var width = ($(document).width() * 0.5)+'px';
    var height = ($(document).height() * 0.6)+'px';
    layer.open({
      type : 1,
      title : title,
      fix: false, //不固定
      maxmin: true,
      shadeClose: true,
      shade: 0.4,
      area : [width,height],
      content : $('.link_edit')
    })
  }

	function house_add(title)
	{  
    document.getElementById("myform").reset();
		var width = ($(document).width() * 0.5)+'px';
    var height = ($(document).height() * 0.6)+'px';
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