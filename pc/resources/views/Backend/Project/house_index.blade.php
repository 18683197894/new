<?php
$header = App\Model\SysMenu::where('id',$label)->first();
$this->title = $project->project_name;
$this->params = [
  ['label'=>$header->getmenu->title],
  ['label'=>$header->title,'url'=>url(url($header->url))]
];
?>
@extends('Backend.public')
@section('style')

@endsection
@section('open')
<div class="x-body backendIdEdit" style="display:none;position:relative;z-index:20">
<form class="layui-form">
      <input type="hidden" name="id" value="">
      <div class="layui-form-item">
        <label class="layui-form-label">绑定操作员</label>
        <div class="layui-input-inline">
          <select name="backend_id">
            <option value=""></option>
            @foreach($backend as $val)
            <option value="{{ $val->id }}">{{ !empty($val->nickname)?$val->nickname:$val->username }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="backendIdEdit">立即提交</button>
          </div>
        </div>
      </div>
</form>
</div>
<div class="x-body frontIdEdit" style="display:none;position:relative;z-index:20">
<form class="layui-form">
      <input type="hidden" name="id" value="">
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">绑定户主</label>
          <div class="layui-input-inline">
            <select name="front_id" lay-verify="" lay-search="">
              <option value=""></option>
              @foreach($front as $k => $v)
              <option value="{{ $v->id }}">{{ $v->nickname }}</option>
              @endforeach              
            </select>
            <div class="layui-form-select">
              <div class="layui-select-title">
                <input type="text" placeholder="直接选择或搜索选择" value="" class="layui-input">
                <i class="layui-edge"></i>
              </div>
              <dl class="layui-anim layui-anim-upbit" style="">
                <dd lay-value="" class="layui-select-tips layui-this">直接选择或搜索选择</dd>
                @foreach($front as $key => $val)
                <dd lay-value="{{ $val->id }}" class="">{{ $val->nickname }}</dd>
                @endforeach
              </dl>
            </div>
          </div>
        </div>
      </div>
      <div class="layui-form-item ">
        <div class="layui-input-block">
        <br>
        <br>
          <div class="layui-footer">
            <button class="layui-btn" lay-submit="" lay-filter="frontIdEdit">立即提交</button>
          </div>
        </div>
      </div>
</form>
</div>
<div class="x-body house_add" style="display:none;position:relative;z-index:20">
        <form class="layui-form" action="{{ url('/backend/project/house-add') }}" method="post" lay-filter="component-form-group" autocomplete="off">
      	@csrf

      	<input type="hidden" name="project_id" value="{{ $project->id }}">
  		<div class="layui-form-item">
			<label class="layui-form-label">房号</label>
			<div class="layui-input-block">
				<input type="text" name="room_number" lay-verify="room_number|required" value="{{ old('room_number') }}"  autocomplete="off" placeholder="请输入房号" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">楼层</label>
			<div class="layui-input-block">
				<input type="text" name="floor" lay-verify="floor|required" value="{{ old('floor') }}"  autocomplete="off" placeholder="请输入楼层" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">户型</label>
			<div class="layui-input-block">
				<input type="text" name="huxing" lay-verify="huxing|required" value="{{ old('huxing') }}"  autocomplete="off" placeholder="请输入户型" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">面积</label>
			<div class="layui-input-block">
				<input type="text" name="acreage" lay-verify="acreage|required" value="{{ old('acreage') }}"  autocomplete="off" placeholder="请输入面积(m2)" class="layui-input">
			</div>
		</div>
<!-- 		<div class="layui-form-item" >
		<label class="layui-form-label">绑定户主</label>
		<div class="layui-input-block">
		  <select name="front_id">
		    <option data-id ="" value=""></option>
		  </select>
		</div>
		</div>
		<div class="layui-form-item" >
		<label class="layui-form-label">绑定操作员</label>
		<div class="layui-input-block">
		  <select name="backend_id">
		    <option data-id ="" value=""></option>
		  </select>
		</div>
		</div> -->


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
@endsection
@section('content')

    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="{{ url('/backend/project/house-index') }}" method="get"> 
          <input type="hidden" name="id" value="{{ $request['id'] }}">
          <input type="hidden" name="label" value="{{ $request['label'] }}">
          <input type="text" name="room_number"  placeholder="请输入房号" value="@if(isset($request['room_number'])) {{ $request['room_number'] }} @endif" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="houseDelAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="house_add('添加房号')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>房号</th>
            <th>楼层</th>
            <th>户型</th>
            <th>面积</th>
            <th>户主</th>
            <th>操作员</th>
            <th>完成度</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($house as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $v->id }}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $v->id }}</td>
            <td>{{ $v->room_number }}</td>
            <td>{{ $v->floor }}</td>
            <td>{{ $v->huxing }}</td>
            <td>{{ $v->acreage }}</td>
            <td><span front_id="{{ $v->front_id }}">@if(!empty($v->Front)) {{ $v->Front->nickname }} @else 无 @endif</span><a onclick="frontIdEdit(this,'{{ $v->id }}','{{ $v->room_number }}')" title="绑定户主" href="javascript:;" style="float:right"><i class="icon iconfont">&#xe6ae;</i></a></td>
            
            <td><span backend_id="{{ $v->backend_id }}">@if(!empty($v->Backend)) {{ $v->Backend->nickname }} @else 无 @endif</span><a onclick="backendIdEdit(this,'{{ $v->id }}','{{ $v->room_number }}')" title="绑定操作员" href="javascript:;" style="float:right;"><i class="icon iconfont">&#xe6ae;</i></a></td>
            <td>
              {{  intval($v->HouseSchedules->count() * 2.5 ).'%' }}
            </td>
            <td>
              <a href="{{ url('/backend/project/house-edit') }}?getKeys={{ $getKeys }}&label={{$label}}&id={{$v->id}}" title="进度更新"><i class="iconfont">&#xe69e;</i></a>&nbsp;&nbsp;
              <a href="{{ url('/backend/project/house-album') }}?getKeys={{ $getKeys }}&label={{$label}}&id={{$v->id}}" title="相册"><i class="iconfont">&#xe6ab;&nbsp;</i></a>
              <a title="删除" onclick="house_del(this,'{{$v->id}}','{{ $v->room_number }}')" href="javascript:;">
                <i class="iconfont">&#xe69d;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        {{  $house->appends($request)->links() }}
      </div>

    </div>
    

@endsection

@section('js')
<script type="text/javascript">
    function houseDelAll()
    {
      var ids = tableCheck.getData();
      if(ids.length == 0)
      {
        return false;
      }
      layer.confirm('确定要删除ID为 '+ids+' 的数据吗?',function(index){
        $.ajax({
          'url' : "{{ url('/backend/project/house-del') }}",
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
      layer.confirm('确定删除房号 '+name+ ' 的数据吗?',function(index){
        $.ajax({
          url : "{{ url('/backend/project/house-del') }}",
          type : 'post',
          data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
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

    function frontIdEdit(obj,id,room_number)
    {   
        var title = '房号: '+room_number;
        var front_id = $(obj).prev('span').attr('front_id');
        var width = ($(document).width() * 0.4)+'px';
        var height = ($(document).height() * 0.7)+'px';
        $('.frontIdEdit').find("input[name='id']").val(id);
        $('.frontIdEdit').find("dd").eq(0).click();
        $('.frontIdEdit').find('dd[lay-value="'+front_id+'"]').click();
        front = layer.open({
          type : 1,
          title : title,
          fix: false, //不固定
          maxmin: true,
          shadeClose: true,
          shade: 0.4,
          area : [width,height],
          content : $('.frontIdEdit')
        })
    }

    function backendIdEdit(obj,id,room_number)
    {   
        var title = '房号: '+room_number;
        var backend_id = $(obj).prev('span').attr('backend_id');
        var width = ($(document).width() * 0.4)+'px';
        var height = ($(document).height() * 0.6)+'px';
        $('.backendIdEdit').find("input[name='id']").val(id);
        $('.backendIdEdit').find("dd").eq(0).click();
        $('.backendIdEdit').find('dd[lay-value="'+backend_id+'"]').click();
        backend = layer.open({
          type : 1,
          title : title,
          fix: false, //不固定
          maxmin: true,
          shadeClose: true,
          shade: 0.4,
          area : [width,height],
          content : $('.backendIdEdit')
        })
    }


	layui.use(['form','jquery','layer'],function(){
		form = layui.form;
    form.on('submit(frontIdEdit)',function(data){
      $.ajax({
        'url' : "{{ url('/backend/project/house-front-id') }}",
        type : 'post',
        data : {id:data.field.id,front_id:data.field.front_id,_token:$("meta[name='csrf-token']").attr('content')},
        success : function(res)
        { 
          res = $.parseJSON(res);
          if(res.code == 200)
          { 
            $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(6).find('span').html(res.data.front_name);
            $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(6).find('span').attr('front_id',data.field.front_id);
            layer.close(front);
            layMsgOk(res.info);

          }else if(res.code == 501)
          {
            layMsgError(res.info);
          }
        },
        error : function(error)
        {
          layMsgError('修改失败');
        }
      });
      return false;
    });
    form.on('submit(backendIdEdit)',function(data){
      $.ajax({
        'url' : "{{ url('/backend/project/house-backend-id') }}",
        type : 'post',
        data : {id:data.field.id,backend_id:data.field.backend_id,_token:$("meta[name='csrf-token']").attr('content')},
        success : function(res)
        { 
          res = $.parseJSON(res);
          if(res.code == 200)
          { 
            $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(7).find('span').html(res.data.backend_name);
            $("div[data-id='"+data.field.id+"']").parents('tr').find('td').eq(7).find('span').attr('backend_id',data.field.backend_id);
            layer.close(backend);
            layMsgOk(res.info);

          }else if(res.code == 501)
          {
            layMsgError(res.info);
          }
        },
        error : function(error)
        {
          layMsgError('修改失败');
        }
      });
      return false;
    });
		form.verify({
			'room_number' : function(value)
			{
				if(value.length >= 10)
				{
					return '字数超出限制 (MAX:10)';
				}
			},
			'floor' : function(value)
			{
				s = /^[0-9]{1,3}$/;
				if(!s.test(value))
				{

				return '请输入整数 (MAX:3)';
				}
				
			},
			'huxing' : function(value)
			{
				if(value.length >= 10)
				{
					return '字数超出限制 (MAX:10)';
				}
			},
			'acreage' : function(value)
			{
				s = /^\d{1,3}\.\d{1,2}$/;
				sS = /^\d{1,3}$/;
				if(!s.test(value) && !sS.test(value))
				{
					return '请输入整数 (MAX:3 保留小数点2位)';
				}
				
			}
		});
	});
	function house_add(title)
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
              content : $('.house_add')
            })
	}

</script>
@endsection