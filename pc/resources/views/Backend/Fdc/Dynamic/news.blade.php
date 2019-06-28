<?php
$header = App\Model\SysMenu::where('url','/'.\Request::path())->first();
$this->title = $header->title;
$this->params = [
  ['label'=>$header->getmenu->title]
];
?>
@extends('Backend.public')

@section('style')

@endsection

@section('open')

@endsection

@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url($header->url) }}" method="get" >
          <input type="text" name="title" value="@if(isset($request['title'])) {{$request['title']}} @endif" placeholder="请输入新闻标题" autocomplete="off" class="layui-input">
        <div class="layui-input-inline" style="margin-bottom:4px">
          <select name="key" lay-filter="aihao">
            <option value="">全部</option>
            @foreach($project as $k => $v)
            <option value="{{ $k }}" @if(isset($request['key']) && $request['key'] == $k) selected="selected" @endif>{{ $v }}</option>
            @endforeach
          </select>
        </div>
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="news_delAll()"><i class="layui-icon"></i>批量删除</button>
        <a href="{{ url('/backend/fdc/dynamic/news-add') }}?label={{$header->id}}" class="layui-btn" ><i class="layui-icon"></i>添加新闻</a>
        <span class="x-right" style="line-height:40px">共有数据：{{ $news->count() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th style='width:4%'>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th style='width:6%'>ID</th>
            <th style='width:20%'>新闻标题</th>
            <th style='width:15%'>新闻来源</th>
            <th style='width:15%'>类别</th>
            <th style='width:15%'>展示图片</th>
            <th style='width:15%'>创建时间</th>
            <th style='width:15%'>操作</th>
        </thead>
        <tbody>
          <tr>
          @foreach($news as $key => $val)
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $val->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $val->id }}</td>
            <td>{{ $val->title }}</td>
            <td>{{ $val->source }}</td>
            <td>{{ isset($project[$val->key])?$project[$val->key]:'' }}</td>
            <td style="padding:8px 8px"><img style="width:100%;height:100%;max-width:150px;max-height:70px" src="@if(!empty($val->exhibition_image)) {{ asset($val->exhibition_image) }} @else {{ asset(env('UPLOAD_NEWS_HEAD_DEFAULT')) }} @endif"></td>
            <td>{{ $val->created_at->format('Y-m-d') }}</td>

            <td class="td-manage">
              <a href="{{ url('/backend/fdc/dynamic/news-edit') }}?id={{ $val->id }}&label={{$header->id}}&getKeys={{ $getKeys }}" class="layui-btn layui-btn-sm">编辑</a>

              <a href="javascript:;" onclick="news_del(this,'{{ $val->id  }}','{{ $val->title }}')" class="layui-btn layui-btn-sm  layui-btn-danger">删除</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
          {{ $news->appends($request)->links() }}
      </div>

    </div>
    

@endsection

@section('js')
<script type="text/javascript">
        function copynews(tips)
        {          
          var width = ($(window).width() * 0.5)+'px';
          var height = ($(window).height() * 0.8)+'px';
          if(tips == 'tx')
          {
                role = layer.open({
                type : 1,
                title : '爬取腾讯家居',
                fix: false, //不固定
                maxmin: true,
                shadeClose: true,
                shade: 0.4,
                area : [width,height],
                content : $('.tx')
              })
          }
        }
        layui.use(['laydate','form','jquery','layer'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
        form.on('submit(copynews)',function(data){
          var index = layer.load(2, {
              shade: [0.1,'#fff'] //0.1透明度的白色背景
          });
          data = data.field;
          $.ajax({
            url : "{{ url('/backend/dynamic/news-copy') }}",
            type : 'post',
            data : {tips:data.tips,url:data.url,key:data.key,pid:data.pid,page:data.page,start:data.start,cid:data.cid,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 501)
              { 
                layer.close(index);
                layMsgError(res.info);
              }else if(res.code == 200)
              {
                layer.close(index);
                layer.alert(res.info,{btn:['确定'],yes:function(){
                  window.location.reload();
                }});
              }
            },error:function(error)
            {
                layer.close(index);
              layMsgError('爬取失败');

            }
          })
          return false;
        });

      });
      function news_delAll()
      {
        var id = tableCheck.getData();
        if(id.length <= 0)
        {
          return false;
        }
        layer.confirm('确定删除ID为 '+id+' 的新闻吗?',{'title':'批量删除新闻'},function(index){
            $.ajax({
            url : "{{url('/backend/fdc/dynamic/news-del')}}",
            data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
            type : 'post',
            success : function(res)
            {
              res = $.parseJSON(res)
              if(res.code == 200)
              {
                layer.close(index);
                $.each(id,function(index,value){      
                  $("div[data-id='"+value+"']").parents('tr').remove();
                });
                layMsgOk(res.info);
              }else if(res.code == 501)
              {
                layer.close(index);
                layMsgError(res.info);
              }
            },
            error : function(error)
            {
              layer.close(index);
              layMsgError('删除失败');
            }
          });
        });
      }
      function news_del(obj,id,title)
      { 
      
        layer.confirm('确定删除 '+title+' 新闻吗?',{'title':'删除新闻'},function(index){
          $.ajax({
            url : "{{url('/backend/fdc/dynamic/news-del')}}",
            data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
            type : 'post',
            success : function(res)
            {
              res = $.parseJSON(res)
              if(res.code == 200)
              {
                layer.close(index);
                $(obj).parents('tr').css('display','none');
                layMsgOk(res.info);
              }else if(res.code == 501)
              {
                layer.close(index);
                layMsgError(res.info);
              }
            },
            error : function(error)
            {
              layer.close(index);
              layMsgError('删除失败');
            }
          });

        });
      }
      function menu_stop(obj,id)
      { 
        var tips = $(obj).html();
        if(tips == '禁用')
        {
          var status = 1;
          var tipsNew = '启用';
        }else if(tips == '启用')
        {
          var status = 0;
          var tipsNew = '禁用';
        }
        layer.confirm('确定要'+tipsNew+'此新闻吗?',{title:'提示'},function(index){
          $.ajax({
            url : "{{url('/backend/dynamic/news-status')}}",
            type : 'post',
            data : {id:id,status:status,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 200)
              {
                layer.close(index);
                $(obj).html(tipsNew);
                if(status == 1)
                {
                  $(obj).removeClass('layui-btn-primary');
                  $(obj).addClass('layui-btn-normal');
                }else
                {
                  $(obj).removeClass('layui-btn-normal');
                  $(obj).addClass('layui-btn-primary');  

                }
                layMsgOk(tipsNew+'成功');

              }else if(res.code == 501)
              {
                layer.close(index);
                layMsgError(res.info);
              }else
              {
                layer.close(index);
                layMsgError('操作失败');
              }
            },
            error : function(res)
            {
              layer.close(index);
              layMsgError('操作失败');
            }
          })
        })
      }
      function menu_top(obj,id)
      { 
        var tips = $(obj).html();
        if(tips == '已置顶')
        { 
          var top = 0;
          var tipsNew = '取消置顶';
        }else if(tips == '置顶')
        {
          var top = 1;
          var tipsNew = '置顶';
        }
        layer.confirm('确定要 '+tipsNew+' 此新闻吗?',{title:'提示'},function(index){
          $.ajax({
            url : "{{url('/backend/dynamic/news-top')}}",
            type : 'post',
            data : {id:id,top:top,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 200)
              {
                layer.close(index);
                if(top == 1)
                {
                  $(obj).html('已置顶');
                  $(obj).removeClass('layui-btn-primary');
                  $(obj).addClass('layui-btn-normal');
                }else
                {
                  $(obj).html('置顶');
                  $(obj).removeClass('layui-btn-normal');
                  $(obj).addClass('layui-btn-primary'); 
                }
                layMsgOk(tipsNew+'成功');

              }else if(res.code == 501)
              {
                layer.close(index);
                layMsgError(res.info);
              }else
              {
                layer.close(index);
                layMsgError('操作失败');
              }
            },
            error : function(res)
            {
              layer.close(index);
              layMsgError('操作失败');
            }
          })
        })
      }
</script>
@endsection