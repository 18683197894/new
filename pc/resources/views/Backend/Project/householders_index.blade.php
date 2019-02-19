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
<div class="x-body front_add" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('/backend/project/householders-add') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      @csrf

      <div class="layui-form-item" >
        <label class="layui-form-label">真实姓名</label>
        <div class="layui-input-inline">
          <input name="nickname" value="" lay-verify="required|nicknames" placeholder="请输入" autocomplete="off" class="layui-input" type="text">
        </div>
        <div class="layui-form-mid layui-word-aux">2到16位</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
          <input name="sex" value="1" title="男"  type="radio"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
          <input name="sex" value="2" title="女"   type="radio"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
        </div>
      </div>
      
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">手机(登录名)</label>
          <div class="layui-input-inline">
            <input name="phone" value="" lay-verify="phone" autocomplete="off" class="layui-input" type="tel">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">邮箱</label>
          <div class="layui-input-inline">
            <input name="emails" value="" lay-verify="emails" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
          <input name="password" lay-verify="passwords" placeholder="请输入密码" autocomplete="off" class="layui-input" type="text">
        </div>
        <div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">重复密码</label>
        <div class="layui-input-inline">
          <input name="password_s" lay-verify="passwords_s" placeholder="请输入密码" autocomplete="off" class="layui-input" type="text">
        </div>
        <div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
      </div>
        <div class="layui-input-block">
          <input type="checkbox" name="close" lay-skin="switch" lay-text="开启|关闭">
        </div>
      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="front_add">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
          <input type="text" name="nickname" value="@if(isset($request['nickname'])) {{$request['nickname'] }} @endif"  placeholder="请输入姓名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="frontDelAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="front_add('添加户主')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ count($front) }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>姓名</th>
            <th>手机</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>房号</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($front as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->nickname }}</td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->sex == 1?'男':'女' }}</td>
            <td>{{ $v->email }}</td>
            <td >
              @if($v->Houses->count()>0)
              @foreach($v->Houses as $key => $val)
               <a href="javascript:;" >{{ $val->project->project_name.' '.$val->room_number }} </a> </br>
              @endforeach
              @else
              无
              @endif

            </td>
            <td>{{ $v->created_at }}</td>
            <td>
              @if($v->status == 1)
              <button class="layui-btn layui-btn-sm layui-btn-normal" onclick="householders_status(this,'{{$v->id}}')">开启</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger"  onclick="householders_status(this,'{{$v->id}}')">禁用</button>
              @endif
            </td>
            <td>
              <a title="删除" onclick="front_del(this,'{{$v->id}}','{{ $v->nickname }}')" href="javascript:;">
                <i class="iconfont">&#xe69d;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        {{ $front->appends($request)->links() }}
      </div>

    </div>
    

@endsection

@section('js')
<script type="text/javascript">

      function householders_status(obj,id)
      {
        if($(obj).html() == '开启')
        {
          var status = 0;
          var tips = '禁用';
          var class_jiu = 'layui-btn-normal';
          var class_new = 'layui-btn-danger';
        }else
        {
          var status = 1;
          var tips = '开启';
          var class_jiu = 'layui-btn-danger';
          var class_new = 'layui-btn-normal';
        }
        layer.confirm('确定要'+tips+'吗?',function(index){
          $.ajax({
            url : "{{ url('/backend/project/householders-status') }}",
            type : 'post',
            data : {id:id,status,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 200)
              {
                $(obj).html(tips);
                $(obj).removeClass(class_jiu);
                $(obj).addClass(class_new);
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

      function frontDelAll()
      { 
        var ids = tableCheck.getData();
        if(ids.length == 0)
        {
          return false;
        }
        layer.confirm('确定要删除ID为 '+ids+' 的户主吗?',function(index){

          $.ajax({
            'url' : "{{ url('/backend/project/householders-del') }}",
            'type' : 'post',
            'data' : {id:ids,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              if(res.code == 200)
              {
                  $.each(ids,function(index,value){    
                    $("div[data-id='"+value+"']").parents('tr').css('display','none');
                  })
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
      function front_del(obj,id,nickname)
      {
        layer.confirm('确定要删除 '+nickname+' 户主吗?',function(index){
          $.ajax({
            'url' : "{{ url('/backend/project/householders-del') }}",
            'type' : 'post',
            'data' : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
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
          });
        });
      }
      function front_add(title)
      {     
            var width = ($(window).width() * 0.6)+'px';
            var height = ($(window).height() * 0.8)+'px';
            layer.open({
              type : 1,
              title : title,
              fix: false, //不固定
              maxmin: true,
              shadeClose: true,
              shade: 0.4,
              area : [width,height],
              content : $('.front_add')
            })
      }

      layui.use(['form','jquery','layer'],function(){
        form = layui.form;
        form.verify({
            nicknames : function(value){
              if(value.length < 2 || value.length >16)
              {
                return '姓名格式错误';
              }
            },
            emails : function(value)
            {
              if(value)
              {
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;                

                if (!myreg.test(value))
                {               
                  return '邮箱格式错误';
                }
              }
            },
            passwords: function(value)
            {
                if(value == false)
                {
                  return '密码不能为空';
                }
                if(!value.match(/[A-Za-z0-9_\-.]{6,16}$/))
                {
                  return '密码格式错误';
                }
            },
            passwords_s: function(value)
            {

                if(value != $('.front_add').find("input[name='password']").val())
                {
                  return '密码不一致';
                }
            }
            
          });
      });
</script>
@endsection