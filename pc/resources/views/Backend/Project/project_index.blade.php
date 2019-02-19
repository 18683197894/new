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
<div class="x-body project_add" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('/backend/project/project-add') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      @csrf


  		<div class="layui-form-item">
			<label class="layui-form-label">项目名称</label>
			<div class="layui-input-block">
				<input type="text" name="project_name" lay-verify="project_name|required" value="{{ old('project_name') }}"  autocomplete="off" placeholder="请输入项目名称" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">项目地址</label>
			<div class="layui-input-block">
				<input type="text" name="address" lay-verify="address|required" value="{{ old('address') }}"  autocomplete="off" placeholder="请输入项目地址" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">入场时间</label>
			<div class="layui-input-block">
          <input class="layui-input" placeholder="入场时间" value="{{ old('admission_time') }}" name="admission_time" id="start">
				
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">预计完成时间</label>
			<div class="layui-input-block">
          <input class="layui-input" placeholder="预计完成时间" value="{{ old('estimate_time') }}" name="estimate_time" id="end">
				
			</div>
		</div>

      <hr>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="project_add">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </div>
      
    </form>
</div>
@endsection()

@section('content')

    <div class="x-body">

      <xblock>
        <button class="layui-btn" onclick="project_add('添加项目')"><i class="layui-icon"></i>添加项目</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>

            <th>ID</th>
            <th>项目名称</th>
            <th>地址</th>
            <th>房数</th>
            <th>总面积</th>
            <th>入场时间</th>
            <th>预计完成时间</th>
            <th>完成度</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($project as $k => $v)
          <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->project_name }}</td>
            <td>{{ $v->address }}</td>
            <td>{{ $v->roomNumbers }}</td>
            <td>{{ $v->acreages }}</td>
            <td>{{ $v->admission_time }}</td>
            <td>{{ $v->estimate_time }}</td>
            <td>{{ $v->schedule }}</td>
            <td>
            	<a href="{{ url('/backend/project/house-index') }}?id={{ $v->id }}&label={{$header->id}}" class="layui-btn layui-btn-sm">项目进度</a>
              <a href="javascript:;" onclick="project_del(this,'{{ $v->id }}','{{ $v->project_name }}')" class="layui-btn layui-btn-sm  layui-btn-danger">删除</a>
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
	function project_add(title)
	{
		var width = ($(document).width() * 0.6)+'px';
            var height = ($(document).height() * 0.7)+'px';
            layer.open({
              type : 1,
              title : title,
              fix: false, //不固定
              maxmin: true,
              shadeClose: true,
              shade: 0.4,
              area : [width,height],
              content : $('.project_add')
            })
	}

  function project_del(obj,id,name)
  {
    layer.confirm('确定删除项目:'+name+' 吗?',function(index){
      layer.close(index);
      var index_load = layer.load(2, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
      });
      $.ajax({
        url : "{{ url('/backend/project/project-del') }}",
        data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
        type : 'post',
        success : function(res)
        {
          res = $.parseJSON(res);
          if(res.code == 200)
          {
            $(obj).parents('tr').css('display','none');
            layMsgOk(res.info);
            layer.close(index_load);
          }else
          {
            layMsgError(res.info);
            layer.close(index_load);
          }
        },
        error : function(error)
        {
          layMsgError('操作失败');
            layer.close(index_load);
        }
      })
    });
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
</script>
@endsection