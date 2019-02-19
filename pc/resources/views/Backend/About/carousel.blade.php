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
    <form class="layui-form" id="myform" action="{{ url('/backend/carousel-add') }}" enctype="multipart/form-data" method="post"lay-filter="component-form-group" au'tocomplete="off">'
      	@csrf
        <input type="hidden" name="type" value="0">
		<div class="layui-form-item">
			<label class="layui-form-label">路由地址</label>
			<div class="layui-input-block">
				<input type="text" name="url" lay-verify="required" value="{{ old('url') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
			</div>
		</div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-body">
            <div class="layui-upload">
              <button type="button" class="layui-btn layui-btn-normal" id="test-upload-change">选择文件</button>
            </div>
          </div>
        </div>
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
    <form class="layui-form" id="edit" action="{{ url('/backend/carousel-edit') }}" enctype="multipart/form-data" method="post"lay-filter="edit" au'tocomplete="off">'
        @csrf
        <input type="hidden" name="id">
        <div class="layui-form-item">
          <label class="layui-form-label">路由地址</label>
          <div class="layui-input-block">
            <input type="text" name="url" lay-verify="required" value="{{ old('url') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">排序</label>
          <div class="layui-input-block">
            <input type="text" name="stort" lay-verify="stort|required" value="{{ old('stort') }}"  autocomplete="off" placeholder="请输入" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-body">
                <div class="layui-upload">
                  <button type="button" class="layui-btn layui-btn-normal" id="test-upload-change2">选择文件</button>
                </div>
              </div>
            </div>
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
          <input type="text" name="url"  placeholder="请输入路由" value="@if(isset($request['url'])) {{ $request['url'] }} @endif" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="houseDelAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="house_add('添加轮播图')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{ $carousel->count() }} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th style="width:8%">
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>路由地址</th>
            <th style="width:15%">图片</th>
            <th style="width:10%">排序</th>
            <th style="width:15%">操作</th>
        </thead>
        <tbody>
          @foreach($carousel as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->url }}</td>
            <td style="padding:8px 8px"><a target="_blank" href="@if(!empty($v->image)) {{ url($v->image) }} @endif"><img style="width:100%;height:100%;max-width:150px" src="@if(!empty($v->image)) {{ asset($v->image) }} @endif"></a></td>
            <td>{{ $v->stort }}</td>
            <td>
              <a title="编辑" class="layui-btn layui-btn-sm "  onclick="link_edit(this,'链接编辑','{{json_encode($v)}}')" href="javascript:;">
                编辑
              </a>
              <a title="删除" class="layui-btn layui-btn-sm  layui-btn-danger" onclick="house_del(this,'{{$v->id}}','{{ $v->url }}')" href="javascript:;">删除</a>
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
  layui.use(['form','upload'],function(){
    form = layui.form;
    upload = layui.upload;
        //选完文件后不自动上传
    upload.render({
      elem: '#test-upload-change'
      ,url: '/upload/'
      ,auto: false
    });
    upload.render({
      elem: '#test-upload-change2'
      ,url: '/upload/'
      ,auto: false
    });
    form.on('submit(project_add)',function(data){
      if(data.field.file == "")
      {
        layMsgError('请上传轮播图');
      return false;

      }
    });
  })
    function houseDelAll()
    {
      var ids = tableCheck.getData();
      if(ids.length == 0)
      {
        return false;
      }
      layer.confirm('确定要删除ID为 '+ids+' 的轮播图吗?',function(index){
        $.ajax({
          'url' : "{{ url('/backend/carousel-del') }}",
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
      layer.confirm('确定删除轮播图吗?',function(index){
        $.ajax({
          url : "{{ url('/backend/carousel-del') }}",
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
    $('.link_edit').find('input[type="file"]').val('');
    $('.link_edit').find('.layui-upload-choose').html('');
    var form = layui.form;
    form.val("edit", {
      "url": data.url,
      "stort": data.stort,
      "id": data.id,
    })
    var width = ($(document).width() * 0.4)+'px';
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
    $('.house_add').find('input[type="file"]').val('');
    $('.house_add').find('.layui-upload-choose').html('');
		var width = ($(document).width() * 0.4)+'px';
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