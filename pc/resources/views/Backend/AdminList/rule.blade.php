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

@section('content')
    <div class="x-body">
      <div class="layui-row">
        <form action="{{ url('/backend/adminlist/rule-add') }}" method="post" class="layui-form layui-col-md12 x-so layui-form-pane">
          @csrf
          <div class="layui-input-inline">
            <select name="cate_id" lay-verify="required">
              <option value="">权限分类</option>
              @foreach($cate as  $v)
              <option value="{{ $v['id'] }}">{{ $v['cate_name'] }}</option>
              @endforeach
             
            </select>
          </div>
          <div class="widd layui-input-inline">
            <select name="rules" lay-verify="required">
              <option value="">路由规则</option> 
              @foreach($path as $v)
              <option value="{{$v}}">{{ $v }}</option>
			  @endforeach
            </select>
          </div>
			<div class="layui-input-inline">
          	<input class="layui-input" placeholder="权限名"  required  lay-verify="required" name="rule_name" >

			</div>
          <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1"><i class="layui-icon"></i>增加</button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $rule->total() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>路由规则</th>
            <th>权限名称</th>
            <th>所属分类</th>
            <th>操作</th>
        </thead>
        <tbody>
        @foreach($rule as $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->rules }}</td>
            <td>{{ $v->rule_name }}</td>
            <td>{{ isset($v['cates']->cate_name)?$v['cates']->cate_name:'无分类' }}</td>
            <td class="td-manage">
              <a title="编辑"  onclick="cate_edit(this,'{{ $v->id }}')" href="javascript:;">
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
        	{{ $rule->links() }}
      </div>

    </div>
@endsection

@section('js')
<script>
      function cate_edit(obj,id)
      {
          layer.prompt({
          formType: 2,
          value: $(obj).parents('tr').find('td').eq(3).html(),
          title: '权限名称编辑',
          area: ['300px', '50px'] //自定义文本域宽高
            }, function(value, index, elem){

          $.ajax(
          {
            url : "{{ url('/backend/adminlist/rule-edit') }}",
            type : 'post',
            data : {id:id,rule_name:value,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 200)
              { 
                $(obj).parents('tr').find('td').eq(3).html(value);
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

          layer.confirm('确定要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/rule-del') }}",
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
        layer.confirm('确认要删除ID为'+ids+'的权限吗？',function(index){
            
          //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/rule-del') }}",
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
@endsection