<?php
$header = App\Model\SysMenu::where('url','/'.\Request::path())->with('getMenu')->first();
$this->title = $header->title;
$this->params = [
  ['label'=>$header->getmenu->title]
];
?>
@extends('Backend.public')

@section('css')
<style>
.widd input.layui-input{
	width:280px;
}
</style>
@endsection

@section('open')
<div class="layui-card dwg_upload" style="display:none">
      <div class="layui-card-body">
        <div class="layui-upload-drag" id="dwg_upload" lay-data="">
          <i class="layui-icon"></i>
          <p>点击上传，或将文件拖拽到此处</p>
        </div>
      </div>
</div>
    <div class="x-body key_add" style="display:none;position:relative;z-index:20">
        <form action="{{ url('/backend/fdc/sys-keyword-add') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        网页名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="name"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

				<div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        网页标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
		      <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        路由地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="urls" name="urls" required="required" lay-verify="urls"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
				
				<div class="layui-form-item layui-form-text">
            <label for="keyword" class="layui-form-label">
                网页关键字
            </label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" id="keyword" name="keyword" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label for="description" class="layui-form-label">
                网页描述
            </label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" id="description" name="description" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
          <button class="layui-btn" lay-submit="" lay-filter="key_add">增加</button>
        </div>
      </form>
    </div>
        <div class="x-body key_edit" style="display:none;position:relative;z-index:20">
        <form  class="layui-form layui-form-pane">
                <input type="hidden" name="id" value="">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        网页名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="name"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

				<div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        网页标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        路由地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="url" name="url" disabled="disabled" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
<!-- 				  <div class="layui-form-item">
				    <label class="layui-form-label">路由地址</label>
				    <div class="layui-input-inline">
				      <select name="url" lay-verify="required">
				        <option value=""></option>
				        @foreach($path as $val)
				        <option value="{{ $val }}">{{ $val }}</option>
				        @endforeach
				      </select>
				    </div>
				   </div> -->
				
				<div class="layui-form-item layui-form-text">
                    <label for="keyword" class="layui-form-label">
                        网页关键字
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="keyword" name="keyword" class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label for="description" class="layui-form-label">
                        网页描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="description" name="description" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="key_edit">修改</button>
              </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input type="text" name="url" value="@if(isset($request['url'])) {{ $request['url'] }} @endif"  placeholder="路由搜索" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
 
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="key_add('添加')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $keyword->total() }} 条</span>
      </xblock>
      </div>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th style="width:5%">ID</th>
            <th style="width:16%">名称</th>
            <th style="width:17%">路由</th>
            <th style="width:15%">网页标题</th>
            <th style="width:18%">网页关键字</th>
            <th style="width:18%">网页描述</th>
            <th style="width:5%">操作</th>
        </thead>
        <tbody>
        @foreach($keyword as $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->url }}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->keyword }}</td>
            <td>{{ $v->description }}</td>
            <td class="td-manage">
              <a title="编辑"  onclick="key_edit(this,'{{ $v->id }}')" href="javascript:;">
                <i class="iconfont">&#xe69e;</i>
              </a>
              <a title="删除" onclick="key_del(this,'{{ $v->id }}')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="page">
        	{{ $keyword->appends($request)->links() }}
      </div>

    </div>
@endsection

@section('js')
<script>

	function key_add(title)
	{	

		var width = ($(window).width() * 0.7)+'px';
		var height = ($(window).height() * 0.85)+'px';
		layer.open({
			type : 1,
			title : title,
			fix: false, //不固定
      		maxmin: true,
      		shadeClose: true,
      		shade: 0.4,
			area : [width,height],
			content : $('.key_add')
		})
	} 
	
	function key_edit(obj,id)
	{	
		var tr = $(obj).parents('tr');
		$('.key_edit input[name="id"]').val(id);
		$('.key_edit input[name="name"]').val(tr.find('td').eq(2).html());
		$('.key_edit input[name="title"]').val(tr.find('td').eq(4).html());
		$('.key_edit textarea[name="keyword"]').val(tr.find('td').eq(5).html());
		$('.key_edit textarea[name="description"]').val(tr.find('td').eq(6).html());
		var url = tr.find('td').eq(3).html();
		$('.key_edit input[name="url"]').val(url);

		// $('.key_edit dd[lay-value="'+url+'"]').click();
		var width = ($(window).width() * 0.7)+'px';
		var height = ($(window).height() * 0.85)+'px';
		layer.open({
			type : 1,
			title : '编辑',
			fix: false, //不固定
      		maxmin: true,
      		shadeClose: true,
      		shade: 0.4,
			area : [width,height],
			content : $('.key_edit')
		})
	}
		layui.use(['form','jquery'],function(){
          layer = layui.layer;
          form = layui.form;
          form.verify({
            name:function(value)
            {
              if(value.length > 25 || value.length <= 0 )
              {
                return '格式错误';
              }
            },
            title:function(value)
            {
              if(value.length > 120 || value.length <= 0 )
              {
                return '格式错误';
              }
            }
            
          });
          form.on('submit(key_edit)',function(data){
          		$.ajax({
          			url : "{{ url('/backend/fdc/sys-keyword-edit') }}",
          			type : 'post',
          			data :　{data:data.field,_token:$("meta[name='csrf-token']").attr('content')},
          			success : function(res)
          			{	
                     	var res = $.parseJSON(res);

          				if(res.code == 200)
          				{	
          					var tr = $("div[data-id='"+data.field.id+"']").parents('tr');
          					tr.find('td').eq(2).html(data.field.name);
          					tr.find('td').eq(3).html(data.field.url);
          					tr.find('td').eq(4).html(data.field.title);
          					tr.find('td').eq(5).html(data.field.keyword);
          					tr.find('td').eq(6).html(data.field.description);
          					layMsgOk(res.info);
          				}else if(res.code == 501)
          				{
          					layMsgError(res.info);
          				}else
          				{
          					layMsgError('修改失败');
          				}
          			},
          			error : function(error)
          			{
          				layMsgError('修改失败');
          			}
          		})
          		return false;
          })

      })
      function key_del(obj,id){

          layer.confirm('确定要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/fdc/sys-keyword-del') }}",
                type : 'post',
                data : {ids:id,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    {
                      $(obj).parents("tr").remove();
                      layer.msg(res.info,{icon:6,time:2000});
                    }else if(res.code == 501)
                    {
                      layer.msg(res.info,{icon:5,time:2000});
                    }else
                    {
                      layer.msg('删除失败',{icon:5,time:2000});
                    }                  
                  
                },
                error : function(res)
                {
                  layer.msg('删除失败',{icon:5,time:2000});
                }
              })
              
          });
      }
      function delAll(){
        
        var ids = tableCheck.getData();
      
        if(ids.length == 0)
        {
          return false;
        }
        layer.confirm('确认要删除ID为'+ids+'的数据吗？',function(index){
            
          //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/fdc/sys-keyword-del') }}",
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    {
                      $(".layui-form-checked").not('.header').parents('tr').remove();
                      layer.msg(res.info,{icon:6,time:2000});
                    }else if(res.code == 501)
                    {
                      layer.msg(res.info,{icon:5,time:2000});
                    }else
                    {
                      layer.msg('删除失败',{icon:5,time:2000});
                    }
                },
                error : function(res)
                {
                  layer.msg('删除失败',{icon:5,time:2000});
                }
              });

        });

      }
</script>
@endsection