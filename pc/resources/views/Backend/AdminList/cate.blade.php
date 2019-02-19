<?php
$header = App\Model\SysMenu::where('url','/'.\Request::path())->with('getMenu')->first();
$this->title = $header->title;
$this->params = [
  ['label'=>$header->getmenu->title]
];
?>

@extends('Backend.public')

@section('css')
@endsection('css')

@section('content')
        <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so layui-form-pane" action="{{ url('backend/adminlist/cate-add') }}" method="post">
          <input class="layui-input" lay-verify="required" placeholder="分类名" name="cate_name">
          @csrf
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon"></i>增加</button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $cate->total() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>分类名</th>
            <th>子规则</th>
            <th>操作</th>
        </thead>
        <tbody>
        @foreach($cate as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->cate_name }}</td>
            <td>
            @foreach($v->rules as $val)
              <span>{{$val->rule_name}}</span>
            @endforeach
            </td>
            <td class="td-manage">
              <a title="编辑"  onclick="cate_edit(this,'{{$v->id}}')" href="javascript:;">
                <i class="iconfont">&#xe69e;</i>
              </a>
              <a title="删除" onclick="member_del(this,'{{ $v->id }}')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="page">
        {{ $cate->links() }}
      </div>

    </div>
@endsection('content')

@section('js')

    <script>
    	var $ = layui.jquery;
       
    	function cate_edit(obj,id)
    	{
    		layer.prompt({
			  formType: 2,
			  value: $(obj).parents('tr').find('td').eq(2).html(),
			  title: '分类编辑',
			  area: ['300px', '50px'] //自定义文本域宽高
			}, function(value, index, elem){

				  $.ajax(
				  {
				  	url : "{{ url('/backend/adminlist/cate-edit') }}",
				  	type : 'post',
				  	data : {id:id,cate_name:value,_token:$("meta[name='csrf-token']").attr('content')},
				  	success : function(res)
				  	{

				  		res = $.parseJSON(res);
  						if(res.code == 200)
  						{	
  							$(obj).parents('tr').find('td').eq(2).html(value);
  							layer.close(index);
  							layer.msg(res.info,{icon:6,time:2000});
  						}else if(res.code == 501)
  						{
  							layer.msg(res.info,{icon:5,time:2000});
  						}else
  						{
  							layer.msg('编辑失败',{icon:5,time:1000});
  						}
				  	},
				  	error : function(res)
				  	{
				  		layer.msg('编辑失败',{icon:2,time:2000});
				  	}
			  });
			  
			});
    	}




		
      function member_del(obj,id){
          var ids = new Array();
          ids[0] = id;
          layer.confirm('确定要删除吗？ 删除后将清空子权限',function(index){
              //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/cate-del') }}",
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
        
        var ids = tableCheck.getData();
      
        if(ids.length == 0)
        {
          return false;
        }
        layer.confirm('确认要删除ID为'+ids+'的分类吗？ 删除后将清空子权限',function(index){
            
          //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/cate-del') }}",
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                {                  
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    {
                      $(".layui-form-checked").not('.header').parents('tr').remove();
                      layer.msg(res.info,{icon:6,time:1000});
                    }else if(res.code == 501)
                    {
                      layer.msg(res.info,{icon:5,time:1000});
                    }else
                    {
                      layer.msg('删除失败',{icon:5,time:1000});
                    }
                },
                error : function(res)
                {
                  layer.msg('删除失败',{icon:5,time:1000});
                }
              });

        });

      }
    </script>
@endsection('js')