<?php
$header = App\Model\SysMenu::where('url','/'.\Request::path())->with('getMenu')->first();
$this->title = $header->title;
$this->params = [
  ['label'=>$header->getmenu->title]
];
?>

@extends('Backend.public')

@section('css')

@endsection

@section('open')

    	<div class="x-body role_add" style="display:none;position:relative;z-index:20">
        <form action="{{ url('backend/adminlist/role-add') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <input type="hidden" name="rule_ids" value="">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="role_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table id="inputs" class="layui-table layui-input-block">
                        <tbody>
                        @foreach($cate as $val)
                            <tr>
                              <td>
                                <div class="layui-unselect cate layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i><span>{{$val->cate_name}}</span>
                                </div>
                              </td>
                                <td>
                                    <div class="layui-input-block">
                                    @foreach($val->rules as $value)
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $value->id }}'>
                                    <i class="layui-icon">&#xe605;</i><span>{{ $value->rule_name }}</span>
                                    </div>
                                        
                                    @endforeach
                                    </div>
                                </td>
                            </tr>
						@endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="describe" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="role_add">增加</button>
              </div>
            </form>
    </div>
    <div class="x-body role_edit" style="display:none;position:relative;z-index:20">
        <form action="{{ url('backend/adminlist/role-edit') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <input type="hidden" name="id" value="">
                <input type="hidden" name="rule_ids" value="">
                <input type="hidden" name="page" value="">
                <input type="hidden" name="keyword" value="">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="role_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table id="inputs" class="layui-table layui-input-block">
                        <tbody>
                        @foreach($cate as $val)
                            <tr>
                              <td>
                                <div class="layui-unselect cate layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i><span>{{$val->cate_name}}</span>
                                </div>
                              </td>
                                <td>
                                    <div class="layui-input-block">
                                    @foreach($val->rules as $value)
                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $value->id }}'>
                                    <i class="layui-icon">&#xe605;</i><span>{{ $value->rule_name }}</span>
                                    </div>
                                        
                                    @endforeach
                                    </div>
                                </td>
                            </tr>
            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="describe" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="role_edit">修改</button>
              </div>
            </form>
    </div>
@endsection

@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input type="text" name="role_name" value="@if(isset($request['role_name'])) {{ $request['role_name'] }} @endif" placeholder="请输入角色名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  style="margin-bottom: 4px;" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
      <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="role_add('添加角色')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{$role->total()}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th style="width:5%"><div class="layui-unselect role layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div></th>
            <th>ID</th>
            <th style="width:15%">角色名</th>
            <th style="width:45%">拥有权限规则</th>
            <th style="width:18%">描述</th>
            <th style="width:8%">操作</th>
        </thead>
        <tbody class="getData">
        @foreach($role as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect roles layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->role_name }}</td>
            <td>
              @foreach($v->rules as $key => $val)
              <span data-id="{{ $val->rule_id }}">{{ $val->rule_name }}</span>&nbsp
              @endforeach
            </td>
            <td>{{ $v->describe }}</td>
            <td class="td-manage">
              <a title="编辑"  onclick="role_edit(this,'角色编辑','{{ $v->id }}','{{$role->currentPage()}}','{{ isset($request['role_name'])?$request['role_name']:'' }}')" href="javascript:;">
                <i class="iconfont">&#xe69e;</i>
              </a>
              <a title="删除" onclick="role_del(this,'{{ $v->id }}')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="page">
      <div>
		{{ $role->appends($request)->links() }}	
      </div>

    </div>
@endsection

@section('js')
<script>
  layui.use(['form'],function(){
      form = layui.form;
      form.on('submit(role_add)',function(data){
        var ids = getData($(".role_add"));
        $('.role_add').find("input[name='rule_ids']").val(ids);
        
      });
      form.on('submit(role_edit)',function(data){
        var ids = getData($(".role_edit"));
        $('.role_edit').find("input[name='rule_ids']").val(ids);
        
      })
  })

	function role_add(title)
	{	

		var width = ($(document).width() * 0.9)+'px';
		var height = ($(document).height() - 50)+'px';
		layer.open({
			type : 1,
			title : title,
			fix: false, //不固定
      maxmin: true,
      shadeClose: true,
      shade: 0.4,
			area : [width,height],
			content : $('.role_add')
		})
	} 
  function role_edit(obj,title,id,page,keyword)
  { 
    var role_name = $(obj).parents('tr').find('td').eq(2).html();
    var describe = $(obj).parents('tr').find('td').eq(4).html();
    $('.role_edit').find("input[name='role_name']").val(role_name);
    $('.role_edit').find("textarea[name='describe']").val(describe);
    $('.role_edit').find("input[name='id']").val(id);
    $('.role_edit').find("input[name='page']").val(page);
    $('.role_edit').find("input[name='keyword']").val(keyword);
    $(".role_edit").find(".layui-form-checkbox").removeClass('layui-form-checked');
    $(obj).parents('tr').find('td').eq(3).find('span').each(function(index,el){
        var id = $(obj).parents('tr').find('td').eq(3).find('span').eq(index).attr('data-id');
        $(".role_edit").find("div[data-id='"+id+"']").addClass('layui-form-checked');
    })

    var width = ($(document).width() * 0.9)+'px';
    var height = ($(document).height() - 50)+'px';
    layer.open({
      type : 1,
      title : title,
      fix: false, //不固定
          maxmin: true,
          shadeClose: true,
          shade: 0.4,
      area : [width,height],
      content : $('.role_edit')
    })
  }   
      function role_del(obj,id)
      { 
          var ids = new Array();
          ids[0] = id;
          layer.confirm('确定要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/role-del') }}",
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
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
                    layer.msg('删除失败',{icon:5,time:1000});
                  }
                },
                error : function(res)
                {
                  layer.msg('删除失败',{icon:5,time:1000});
                }
              })
              
          });
      }

      function delAll(){
        
        var ids = getData($('.getData'));

        if(ids.length == 0)
        {
          return false;
        }
        layer.confirm('确认要删除ID为'+ids+'的角色吗？',function(index){
            
          //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/role-del') }}",
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    { 
                      
                      $('.getData').find(".layui-form-checked").parents('tr').remove();
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
      // 获取当前页选中ID
      function getData(obj)
      {
          var obj = $(obj).find(".layui-form-checked").not('.header');
          var arr=[];
          obj.each(function(index, el) {
              if(obj.eq(index).attr('data-id'))
              {
                  arr.push(obj.eq(index).attr('data-id'));
              }
          });
          return arr;
      }
</script>
@endsection