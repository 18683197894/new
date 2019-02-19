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
<div class="x-body role_edit" style="display:none;position:relative;z-index:20">
<form class="layui-form">
      <input type="hidden" name="id" value="">
      <div class="layui-form-item">
        <label class="layui-form-label">用户角色</label>
        <div class="layui-input-inline">
          <select name="role_id">
            <option value=""></option>
            @foreach($role as $val)
            <option value="{{ $val->id }}">{{ $val->role_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="role_edit">立即提交</button>
          </div>
        </div>
      </div>
</form>
</div>
<div class="x-body index_add" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('backend/adminlist/index-add') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      @csrf

      <div class="layui-form-item">
        <label class="layui-form-label">登入账号</label>
        <div class="layui-input-inline">
          <input name="username" value="" lay-verify="required|usernames" placeholder="请输入" autocomplete="off" class="layui-input" type="text">
        </div>
        <div class="layui-form-mid layui-word-aux">6到16位</div>
      </div>
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
          <input name="sex" value="1" title="男" checked="ckecked"  type="radio"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
          <input name="sex" value="2" title="女"   type="radio"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
        </div>
      </div>

<!--       <div class="layui-form-item" >
        <label class="layui-form-label">用户角色</label>
        <div class="layui-input-inline">
          <select name="role_id">
            <option data-id ="" value=""></option>
            @foreach($role as $val)
            <option data-id="{{ $val->id }}"value="{{ $val->id }}">{{ $val->role_name }}</option>
            @endforeach
          </select>
        </div>
      </div> -->
      
      
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">手机</label>
          <div class="layui-input-inline">
            <input name="phone" value="" lay-verify="phone" autocomplete="off" class="layui-input" type="tel">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">邮箱</label>
          <div class="layui-input-inline">
            <input name="email" value="" lay-verify="email" autocomplete="off" class="layui-input" type="text">
          </div>
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
          <input name="password" lay-verify="passwords" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
        </div>
        <div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">重复密码</label>
        <div class="layui-input-inline">
          <input name="password_s" lay-verify="passwords_s" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
        </div>
        <div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
      </div>
      

      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="index_add">立即提交</button>
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
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" value="@if(isset($request['start'])) {{ $request['start'] }} @endif" name="start" id="start">
          <input class="layui-input" placeholder="截止日" value="@if(isset($request['end'])) {{ $request['end'] }} @endif" name="end" id="end">
          <input type="text" name="username" value="@if(isset($request['username'])) {{ $request['username'] }} @endif"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll('{{\session('backend')['id']}}')"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="index_add('添加用户')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $member->total() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>用户名</th>
            <th>姓名</th>
            <th>性别</th>
            <th>头像</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>角色</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($member as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->username }}</td>
            <td>{{ $v->nickname }}</td>
            <td>{{ $v->sex == 1?'男':'女' }}</td>
            <td ><img style="max-width: 100px;height: 100px;border-radius: 99px;" src="@if(!empty($v->head_portrait)) {{ asset($v->head_portrait) }} @else {{ asset(env('UPLOAD_BACKEND_HEAD_DEFAULT')) }} @endif" alt=""></td>
            <td>{{ $v->phone }}</td>
            <td>{{ $v->email }}</td>
            <td><span roleid="{{ isset($v['roles']->id)?$v['roles']->id:'' }}" >@if($v->type == 10) 超级管理员 @else {{ !empty($v['roles'])?$v['roles']->role_name:'无' }} @endif</span> <a onclick="role_edit(this,'{{ $v->id }}','角色修改')" title="修改角色" href="javascript:;" style="float:right"><i class="icon iconfont">&#xe6ae;</i></a></td>
            <td>{{ $v->created_at }}</td>
            <td class="td-status">
              <span class="layui-btn {{ $v->status?'':'layui-btn-primary' }}" itps="{{ $v->status?'停用':'启用' }}" onclick="member_stop(this,'{{ $v->id }}','{{ \session('backend')['id'] }}')">
                {{ $v->status?'已启用':'已停用' }}
              </span>
            </td>
            <td class="td-manage">
              <a title="编辑" onclick="x_admin_open('个人信息','@if($v->id == \session('backend')['id']) {{ url('/backend/member/personal') }}  @else {{ url('/backend/adminlist/index-edit?id=').$v->id }} @endif')" href="javascript:;">
                <i class="iconfont">&#xe69e;</i>
              </a>
              <!-- <a onclick="x_admin_open('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                <i class="layui-icon"></i>
              </a> -->
              <a title="删除" onclick="member_del(this,'{{$v->id}}','{{ \session('backend')['id'] }}')" href="javascript:;">
                <i class="layui-icon"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        {{ $member->appends($request)->links() }}

    </div>
    

@endsection

@section('js')
<script>
      var $ = layui.jquery;
      function role_edit(obj,id,title)
      {
          var role_id = $(obj).prev('span').attr('roleid');
          var width = ($(document).width() * 0.3)+'px';
          var height = ($(document).height() * 0.5)+'px';
          $('.role_edit').find("input[name='id']").val(id);
          $('.role_edit').find("dd").eq(0).click();
          $('.role_edit').find('dd[lay-value="'+role_id+'"]').click();
          role = layer.open({
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
      layui.use(['form','jquery'],function(){
          layer = layui.layer;
          form = layui.form;
          form.verify({
            usernames:function(value)
            {
              if(value != '' && !value.match(/[A-Za-z0-9_\-.]{6,16}$/))
              {
                return '账号格式错误';
              }
            },
            nicknames : function(value){
              if(value.length < 2 || value.length >16)
              {
                return '姓名格式错误';
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

                if(value != $('.index_add').find("input[name='password']").val())
                {
                  return '密码不一致';
                }
            }
            
          });
        form.on('submit(role_edit)',function(data){
          $.ajax({
            url : '{{ url("backend/adminlist/index-role") }}',
            type : 'post',
            data : {id:data.field.id,role_id:data.field.role_id,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {

                res = $.parseJSON(res);
                if(res.code == 200)
                { 
                  $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(8).find('span').html(res.data.role_name);
                  $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(8).find('span').attr('roleid',data.field.role_id);
                  layer.msg(res.info,{icon:6,time:2000});
                  layer.close(role);
                }else if(res.code == 501)
                {
                  layer.msg(res.info,{icon:5,time:2000});
                }else
                {
                  layer.msg('修改失败',{icon:5,time:2000});
                }
            },
            error : function(res)
            {
                layer.msg('修改失败',{icon:5,time:2000});
            }
          })
          return false;
        });
        
        form.on('submit(sreach)',function(data){
            // if(!data.field.start && !data.field.end && !data.field.username)
            // {
            //     layer.alert('至少选择一个条件',{title:'用户搜索',btn:['关闭']});
            //     return false;
            // }
            window.location.href ='{{ url()->current() }}?start='+data.field.start+'&end='+data.field.end+'&username='+data.field.username;
            return false;
        })
      })

      function index_add(title)
      {
            var width = ($(document).width() * 0.6)+'px';
            var height = ($(document).height() - 80)+'px';
            layer.open({
              type : 1,
              title : title,
              fix: false, //不固定
              maxmin: true,
              shadeClose: true,
              shade: 0.4,
              area : [width,height],
              content : $('.index_add')
            })
      }
      //资料修改成功回调
      function adminListEdit(data)
      {
        tr = $("div[data-id='"+data.id+"']").parents('tr');
        tr.find('td').eq(3).html(data.nickname);
        if(data.sex == 1)
        {
          var sex ='男';
        }else
        {
          var sex = '女';
        }
        tr.find('td').eq(4).html(sex);
        tr.find('td').eq(6).html(data.phone);
        tr.find('td').eq(7).html(data.email);
      }
      //头像上传成功回调函数
      function headPortraitEdit(id,src)
      {
        tr = $("div[data-id='"+id+"']").parents('tr').find('td').eq(5).find('img').attr('src',src);
      }

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

       /*用户-停用*/
      function member_stop(obj,id,current_id){
          var itps = $(obj).attr('itps');
          if(itps == '启用')
          {
            newIpts = '停用';
            var status = 1
          }else
          {
            if(id == current_id)
            {
              itps = '停用自己';
            }
            newIpts = '启用';
            var status = 0
          }
          layer.confirm('确认要'+itps+'吗？',function(index){
              $.ajax({
                url : "{{ url('/backend/adminlist/index-status') }}",
                data :　{id:id,status:status,_token:$("meta[name='csrf-token']").attr('content')},
                type : 'post',
                success : function(res)
                {
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    { 
                      
                      if(itps == '启用')
                      {
                        $(obj).removeClass('layui-btn-primary');
                      }else
                      {
                        $(obj).addClass('layui-btn-primary');
                      }
                      $(obj).attr('itps',newIpts);
                      $(obj).html('已'+itps);
                      layer.msg(itps+res.info,{icon:6,time:2000})
                    }else
                    {
                      layer.msg(itps+res.info,{icon:5,time:2000});
                    }
                },
                error : function(res)
                {
                  layer.msg(itps+'失败',{icon:5,time:2000});
                }
              })

             
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id,current_id){
          if(id == current_id)
          {
            var ids = id; 
            var url  =  "{{ url('/backend/member/destroy') }}";
            var info = '确定删除自己？ 删除后将退出本系统';
          }else
          {
            var ids = new Array();
            ids[0] = id;
            var url = "{{ url('/backend/adminlist/index-del') }}";
            var info = '确认要删除吗？';
          }
          layer.confirm(info,function(index){
              //发异步删除数据
              $.ajax({
                url : url,
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                  res = $.parseJSON(res);
                  if(res.code == 200)
                  {
                    $(obj).parents("tr").remove();
                    layer.msg(res.info,{icon:6,time:2000});
                  }else if(res.code == 304)
                  {
                    parent.window.location.href = res.data.url;
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


      /*用户-多选删除*/
      function delAll(current_id){
        
        var ids = tableCheck.getData();

        if(ids.length == 0)
        {
          return false;
        }
        if($.inArray(current_id,ids) != -1)
        {
            layer.alert('删除失败 请先取消勾选自己',{icon:5,btn:['关闭']});
            return false;
        }

        layer.confirm('确认要删除ID为'+ids+'的用户吗？',function(index){
            
          //发异步删除数据
              $.ajax({
                url : "{{ url('/backend/adminlist/index-del') }}",
                type : 'post',
                data : {ids:ids,_token:$("meta[name='csrf-token']").attr('content')},
                success : function(res)
                { 
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    { 
                      $.each(res.data,function(index,value){
                        
                        $("div[data-id='"+value+"']").parents('tr').remove();
                      })
                      // $(".layui-form-checked").not('.header').parents('tr').remove();
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