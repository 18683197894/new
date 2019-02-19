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
        .nones{
          display:none;
        }
        table{
           border-collapse:separate;

        }
        table thead tr th{
          border: none!important;
        }
  
        .layui-table tr td,.layui-tablethead{
          border-style:none;
          border-top: 1px solid rgb(230, 230, 230);
        }
        .layui-table tr:last-child,tbody,.layui-table{
            border-top: 1px solid rgb(230, 230, 230);
            border-bottom: 1px solid rgb(230, 230, 230);
        }
        .quan{
          width: 15px;
          height: 15px;
          background-color:#337ab7;
          border-radius: 50%;
          color: #fff;
          margin-left: 15px;
          display: block;
          float: left;
          text-align: center;
          line-height:13px!important;
          font-family:"微软雅黑";
          margin-top: 3px;
          cursor: pointer;

        }
        .kuaiji{
          display: block;
          float: left;
        }
      </style>
@endsection
@section('open')
    <div class="x-body menus_add" style="display:none;position:relative;z-index:20">
        <form action="{{ url('/backend/sys/frontmenu_add') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <input type="hidden" name="level" value="2">
                <input type="hidden" name="pid" value="0">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        标题
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="title" name="title" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="sort" name="sort" required="" lay-verify="sort"
                        autocomplete="off"  class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">状态</label>
                  <div class="layui-input-block" style="border:1px solid rgb(230, 230, 230);">
                    <input type="radio" name="status" value="1" title="启用" checked="">
                    <input type="radio" name="status" value="0" title="禁用">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">路由地址</label>
                  <div class="layui-input-block">
                    <select name="url" lay-verify="required">
                      <option value=""></option>
                      <option value="javascript:;">javascript:;</option>
                      @foreach($path as $val)
                      <option value="{{ $val }}">{{ $val }}</option>
                      @endforeach
                    </select>
                  </div>
                 </div>
                 <br>
                 <br>
                <div class="layui-form-item">

                <button class="layui-btn" lay-submit="" lay-filter="menu_add" >增加</button>
              </div>
        </form>
    </div>
    <div class="x-body menu_edit" style="display:none;position:relative;z-index:20">
        <form action="{{ url('/backend/sys/frontmenu_edit') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <input type="hidden" name="id" value="0">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        标题
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="title" name="title" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="sort" name="sort" required="" lay-verify="sort"
                        autocomplete="off"  class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">状态</label>
                  <div class="layui-input-block" style="border:1px solid rgb(230, 230, 230);">
                    <input type="radio" name="status" value="1" title="启用" checked="">
                    <input type="radio" name="status" value="0" title="禁用">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">路由地址</label>
                  <div class="layui-input-block">
                    <input disabled="disabled" type="text" id="urls" name="urls" required="" lay-verify="urls"
                        autocomplete="off"  class="layui-input">
                  </div>
                 </div>
                 <br>
                 <br>
                <div class="layui-form-item">

                <button class="layui-btn" lay-submit="" lay-filter="menu_edit" >修改</button>
              </div>
        </form>
    </div>
@endsection
@section('content')

    <div class="x-body">
      <xblock>
        <button class="layui-btn" onclick="menus_add(0,1)"><i class="layui-icon"></i>创建菜单</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ count($menu) }} 条</span>
      </xblock>

      <table class="layui-table"  frame="hsides">
        <thead>
          <tr>
            
            <th style="width:8%">折叠</th>
            <th style="width:24%">标题</th>
            <th style="width:24%">路由</th>
            <th style="width:14%">排序</th>
            <th style="width:16%">操作</th>
        </thead>
        <tbody>
          @foreach($menu as $val)
          <tr id="{{ $val['id'] }}" class="0">
            <td>
            <a href="javascript:;" class="cick ok"><i class="iconfont">&#xe6fe;</i></a>
            </td>
            <td><span class="kuaiji">{{ $val['title'] }}</span>  <span class="quan" onClick="menus_add('{{ $val['id'] }}',2,'{{ $val['title'] }}')">+</span></td>
            <td>{{ $val['url'] }}</td>
            <td><input type="text" style="border: 1px solid #0000FF;" autocomplete="off" id="{{ $val['id'] }}" val="{{ $val['sort'] }}" value="{{ $val['sort'] }}" class="layui-input sorts"></td>
            <td class="td-manage">
              <a href="javascript:;" class="layui-btn layui-btn-sm" onClick="menu_edit(this,'{{ $val['id'] }}','{{ $val['title'] }}','')">编辑</a> 
              
              @if($val['status'] == 0)
              <a href="javascript:;" onclick="menu_stop(this,'{{ $val['id'] }}')" class="layui-btn layui-btn-sm  layui-btn-normal">启用</a>
              @else 
              <a href="javascript:;" onclick="menu_stop(this,'{{ $val['id'] }}')" class="layui-btn layui-btn-sm  layui-btn-primary">禁用</a>
              @endif

              <a href="javascript:;" onclick="menu_del(this,'{{ $val['id'] }}','{{ $val['title'] }}','all')" class="layui-btn layui-btn-sm  layui-btn-danger">删除</a>
            </td>
          </tr>
          @foreach($val['get_menus'] as $value)
          <tr class="{{ $value['pid'] }}">
            <td>
            
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@if($loop->last) └── {{ $value['title'] }} @else ├── {{ $value['title'] }}  @endif</td>
            <td>{{ $value['url'] }}</td>
            <td><input type="text" style="border: 1px solid   #00FF00;" autocomplete="off" id="{{ $value['id'] }}" val="{{ $value['sort'] }}"  value="{{ $value['sort'] }}" class="layui-input sorts"></td>
            <td class="td-manage">
              <a href="javascript:;" class="layui-btn layui-btn-sm" onClick="menu_edit(this,'{{ $value['id'] }}','{{ $value['title'] }}','{{ $val['title'] }}')">编辑</a>

              @if($value['status'] == 0)
              <a href="javascript:;" onclick="menu_stop(this,'{{ $value['id'] }}')" class="layui-btn layui-btn-sm  layui-btn-normal">启用</a>
              @else 
              <a href="javascript:;" onclick="menu_stop(this,'{{ $value['id'] }}')" class="layui-btn layui-btn-sm  layui-btn-primary">禁用</a>
              @endif

              <a href="javascript:;" onclick="menu_del(this,'{{ $value['id'] }}','{{ $value['title'] }}','')" class="layui-btn layui-btn-sm  layui-btn-danger">删除</a>
            </td>
          </tr>
          @endforeach
          @endforeach

        </tbody>
      </table>

    </div>
    

@endsection

@section('js')
<script>
        $ = layui.jquery;

        $('.sorts').on('blur',function(){
          var inp = $(this);
          var sort = $(this).val();
          var id = $(this).attr('id');
          var usedSort = $(this).attr('val');
          if(sort.length <= 0 || !sort.match(/^[0-9]*$/))
          {
                $(this).val(usedSort);
                layer.alert('请输入数字排序',{title:'错误',icon:5,btn:['确认']});
                return false;
          }
          if(sort == usedSort)
          {
            return false;
          }
          $.ajax({
            url : "{{ url('/backend/sys/frontmenu_sort') }}",
            type : 'post',
            data : {id:id,sort:sort,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              var res = $.parseJSON(res);
              if(res.code == 200)
              {
                inp.attr('val',sort);
                layMsgOk(res.info);
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
              return false;
            }
          })
        })

        function menu_del(obj,id,name,itps)
        {
          if(itps == 'all')
          {
            newItps = '确定删除 '+name+' 目录并清空子目录吗? ';
          }else
          { 
            newItps = '确定删除 '+name+' 目录吗?';
        }

          layer.confirm(newItps,function(index){
            $.ajax({
              url : '{{ url("/backend/sys/frontmenu_del") }}',
              type : 'post',
              data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
              success : function(res)
              {
                var res = $.parseJSON(res);
                if(res.code == 200)
                {
                  if(itps == 'all')
                  {
                    $(obj).parents('tr').css('display','none');
                    $(obj).parents('tr').nextAll('.'+id).css('display','none');
                  }else
                  {
                    $(obj).parents('tr').css('display','none');

                  }
                  layMsgOk('删除成功');

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
            })
          })
        }

        function menu_stop(obj,id)
        {
          var itps = $(obj).html();
          if(itps == '启用')
          {
            var newItps = '禁用';
            var status = 1;
            var usedClass = 'layui-btn-normal';
            var newClass = 'layui-btn-primary';
          }else
          {
            var newItps = '启用';
            var status = 0;
            var usedClass = 'layui-btn-primary';
            var newClass = 'layui-btn-normal';
          }
          
          layer.confirm('确定要'+itps+'吗?',function(index){
            $.ajax({
              'url':'{{ url("/backend/sys/frontmenu_status") }}',
              data : {id:id,status:status,_token:$("meta[name='csrf-token']").attr('content')},
              type : 'post',
              success : function(res)
              {
                var res = $.parseJSON(res);
                if(res.code == 200)
                {
                  layMsgOk(itps+'成功');
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


        function menus_add(id,level,name)
        { 
          if(!name)
          {
            name = '无';
          }
          $('.menus_add input[name="pid"]').val(id);
          $('.menus_add input[name="level"]').val(level);
          var width = ($(window).width() * 0.35)+'px';
          var height = ($(window).height() * 0.65)+'px';
          layer.open({
            type : 1,
            title : '上级目录：'+name,
            fix: false, //不固定
                maxmin: true,
                shadeClose: true,
                shade: 0.4,
            area : [width,height],
            content : $('.menus_add')
          })
        }      
        function menu_edit(obj,id,title,name)
        {
          if(!name)
          {
            name = '编辑';
          }else
          {
            name = '上级目录：'+name;
          }
          var tr = $(obj).parents('tr');
          $('.menu_edit input[name="id"]').val(id);
          $('.menu_edit input[name="title"]').val(title);
          $('.menu_edit input[name="urls"]').val(tr.find('td').eq(2).html());
          $('.menu_edit input[name="sort"]').val(tr.find('td').eq(3).find('input').val());
          var width = ($(window).width() * 0.35)+'px';
          var height = ($(window).height() * 0.65)+'px';
          layer.open({
            type : 1,
            title : name,
            fix: false, //不固定
                maxmin: true,
                shadeClose: true,
                shade: 0.4,
            area : [width,height],
            content : $('.menu_edit')
          })
        }        
        

        layui.use(['form'],function(){
          form = layui.form;
          form.verify({
            title:function(value)
            {
              if(value.length > 20 || value.length <= 0 )
              {
                return '格式错误';
              }
            },

            sort:function(value)
            {
              if(value.length <= 0 || !value.match(/^[0-9]*$/))
              {
                return '请输入数字排序';
              }
            }
          });
        });

      $(".cick").on('click',function(){
        var tr = $(this).parents('tr');
        index = tr.attr('id');

        if($(this).hasClass('no'))
        {
          $(this).removeClass('no');
          $(this).addClass('ok');
          $(this).find('i').html('&#xe6fe;');
          tr.nextAll('.'+index).addClass('table-row');
          tr.nextAll('.'+index).removeClass('nones');
        }else
        {
          $(this).removeClass('ok');
          $(this).addClass('no');
          $(this).find('i').html('&#xe6b9;');
          tr.nextAll('.'+index).removeClass('table-row');
          tr.nextAll('.'+index).addClass('nones');

        }
      })


    </script>
@endsection