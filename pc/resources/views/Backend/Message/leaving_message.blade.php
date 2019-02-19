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

@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
      
          <input class="layui-input" placeholder="开始日" value="@if(isset($request['start'])) {{$request['start']}} @endif" name="start" id="start">
          <input class="layui-input" placeholder="截止日" value="@if(isset($request['end'])) {{$request['end']}} @endif" name="end" id="end">

          <div class="layui-input-inline" style="margin-bottom:4px">
            <select name="status">
              <option value="">搜索类型</option>
              <option @if(isset($request['status']) && $request['status'] == 2) selected @endif value="2">全部</option>
              <option @if(isset($request['status']) && $request['status'] == 0) selected @endif value="0">未处理</option>
              <option @if(isset($request['status']) && $request['status'] == 1) selected @endif value="1">已处理</option>
            </select>
          </div>

          <input type="text" name="name"  value="@if(isset($request['name'])) {{$request['name']}} @endif" placeholder="请输入姓名" autocomplete="off" class="layui-input">
          
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ count($message) }}条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>姓名</th>
            <th>电话</th>
            <th>项目名称</th>
            <th>开发商名称</th>
            <th>留言时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($message as $val)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $val->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $val->id }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->phone }}</td>
            <td>{{ $val->project }}</td>
            <td>{{ $val->developers }}</td>
            <td>{{ $val->created_at }}</td>
            <td class="td-status">
              @if($val->status == 0)
              <a href="javascript:;" onclick="message_stop(this,'{{ $val['id'] }}')" class="layui-btn   layui-btn-danger">未处理</a>
              @else 
              <a href="javascript:;" onclick="message_stop(this,'{{ $val['id'] }}')" class="layui-btn  layui-btn-normal">已处理</a>
              @endif
            </td>
            <td class="td-manage">
              <a href="javascript:;" onclick="message_code(this,'{{ $val['id'] }}')" title="发送短信"><i class="iconfont">&#xe69b;</i></a>&nbsp;&nbsp;
              <a href="javascript:;" onclick="message_del(this,'{{ $val['id'] }}')" title="删除"><i class="iconfont">&#xe69d;</i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
          {{ $message->appends($request)->links() }}
      </div>

    </div>
    

@endsection

@section('js')
<script>
    var $ = layui.jquery;
      



      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      function message_code(obj,id)
      {
          layer.prompt({
          formType: 2,
          title: '短信回复',
          area: ['300px', '100px'] //自定义文本域宽高
            }, function(value, index, elem){

                $.ajax(
                {
                  url : '{{ url("/backend/message/leaving-message_code") }}',
                  type : 'post',
                  data : {id:id,content:value,_token:$("meta[name='csrf-token']").attr('content')},
                  success : function(res)
                  {
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    { 
                      layer.close(index);
                      $(obj).parents('tr').find('td').eq(7).find('a').html('已处理');
                      $(obj).parents('tr').find('td').eq(7).find('a').removeClass('layui-btn-danger');
                      $(obj).parents('tr').find('td').eq(7).find('a').addClass('layui-btn-normal');
                      layer.alert(res.info,{lcon:6,btn:['关闭']});
                      // layMsgOk(res.info);
                    }else if(res.code == 501)
                    {
                      layMsgError(res.info);
                    }else
                    {
                      layMsgError('发送失败');
                    }
                  },
                  error : function(res)
                  {
                    layMsgError('发送失败');
                  }
              });
        
      });
      }

        function message_stop(obj,id)
        {
          var itps = $(obj).html();
          if(itps == '已处理')
          {
            itps = '确定要更改状态为 未处理 吗？';
            var newItps = '未处理';
            var status = 0;
            var usedClass = 'layui-btn-normal';
            var newClass = 'layui-btn-danger';
          }else
          {
            itps = '确定要更改状态为 已处理 吗？';
            var newItps = '已处理';
            var status = 1;
            var usedClass = 'layui-btn-danger';
            var newClass = 'layui-btn-normal';
          }
          
          layer.confirm(itps,function(index){
            $.ajax({
              'url':'{{ url("/backend/message/leaving-message_status") }}',
              data : {id:id,status:status,_token:$("meta[name='csrf-token']").attr('content')},
              type : 'post',
              success : function(res)
              {
                var res = $.parseJSON(res);
                if(res.code == 200)
                {
                  layMsgOk(res.info);
                  $(obj).html(newItps);
                  $(obj).removeClass(usedClass)
                  $(obj).addClass(newClass);
                }else if(res.code == 501)
                {
                  layMsgError(res.info);
                }
                else
                {
                  layMsgError('操作失败');
                }
              },
              error : function(error)
              {
                layMsgError('操作失败');
              }
              });
          });
        }
       /*用户-停用*/
      function member_stop(obj,id){

          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function message_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              
              $.ajax({
                url : '{{ url("/backend/message/leaving-message_del") }}',
                type : 'post',
                data : {ids:id,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                {
                  var res = $.parseJSON(res);
                  if(res.code == 200)
                  {
                    $(obj).parents("tr").remove();
                    layMsgOk(res.info);

                  }else if(res.code == 501)
                  {
                    layMsgError(res.info);
                  }else
                  {
                    layMsgError('删除失败');
                  }
                },
                error : function(error)
                {
                  layMsgError('删除失败');
                }
            
            });
          })
      }

      function delAll(){
        
        var ids = tableCheck.getData();
      
        if(ids.length == 0)
        {
          return false;
        }
        layer.confirm('确认要删除ID为 '+ids+' 的留言吗？',function(index){
            
          //发异步删除数据
              $.ajax({
                url : '{{ url("/backend/message/leaving-message_del") }}',
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    {
                      $(".layui-form-checked").not('.header').parents('tr').remove();
                      layMsgOk(res.info);
                    }else if(res.code == 501)
                    {
                      layMsgError(res.info);
                    }else
                    {
                      layMsgError('删除失败');
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