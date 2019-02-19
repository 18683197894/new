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
.layui-form-label{
	width:90px;
}
.layui-input-block{
	margin-left: 120px;
}
.layui-input, .layui-textarea{
	width:50%;
}
.system .layui-input{
	width:100%;
}
</style>
@endsection

@section('open')

@endsection

@section('content')
    <div class="x-body">
      <div class="layui-row">
<div class="layui-tab layui-tab-card">
  <ul class="layui-tab-title">
    <li class="layui-this">网站配置</li>
    <li>短信配置</li>
    <li>系统配置</li>
    <li>系统缓存</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
    	<form class="layui-form" lay-filter="component-form-group" autocomplete="off">
			
			<div class="layui-form-item">
				<label class="layui-form-label">网站标题</label>
				<div class="layui-input-inline">
					<input name="title" lay-verify="web_title" value="{{ $webConfig->title }}" autocomplete="off" placeholder="网站前台显示标题" class="layui-input" type="text" style="width:100%">
				</div>
			</div>			
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">网站手机号</label>
					<div class="layui-input-inline">
						<input name="phone" lay-verify="web_phone" value="{{ $webConfig->phone }}" autocomplete="off" placeholder="网站手机号" class="layui-input" type="tel" style="width:100%">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label">网站QQ号</label>
					<div class="layui-input-inline">
						<input name="qq" lay-verify="web_qq" value="{{ $webConfig->qq }}" autocomplete="off" placeholder="网站QQ号" class="layui-input" type="text" style="width:100%">
					</div>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label" style="">网站LOGO</label>
				<div class="layui-input-block">
				<div class="layui-upload">
					<input class="layui-upload-file" accept="undefined" name="file" type="file"> 
					<div class="layui-upload-list">
						<img id="test-upload-normal-img" src="{{ asset($webConfig->logo) }}" class="img-thumbnail" style="width: 50px; height: 50px;">
					</div> 
					<button type="button" id="test-upload-normal" class="layui-btn" style="">选择 ICO 图片</button>

				</div>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">网站版权</label>
				<div class="layui-input-block">
					<input name="copyright" lay-verify="web_copyright" value="{{ $webConfig->copyright }}" autocomplete="off" placeholder="网站底部显示的版权所有" class="layui-input" type="text">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">网站备案号</label>
				<div class="layui-input-block">
					<input name="record" lay-verify="web_record" value="{{ $webConfig->record }}" autocomplete="off" placeholder="网站底部显示的备案号" class="layui-input" type="text">
				</div>
			</div>	
			
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">网站关键字</label>
				<div class="layui-input-block">
					<textarea  name="keyword" lay-verify="web_keyword" placeholder="SEO网站统一关键字（多个以 , 分割）" class="layui-textarea">{{ $webConfig->keyword }}</textarea>
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">网站描述</label>
				<div class="layui-input-block">
					<textarea name="description" lay-verify="web_description" placeholder="SEO网站统一描述" class="layui-textarea">{{ $webConfig->description }}</textarea>
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">网站统计代码</label>
				<div class="layui-input-block">
					<textarea name="statistical_code" lay-verify="web_statistical_code" placeholder="用于统计网站访问量的第三方代码" class="layui-textarea">{{ $webConfig->statistical_code }}</textarea>
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">百度推送代码</label>
				<div class="layui-input-block">
					<textarea name="baidu_push" lay-verify="web_baidu_push" placeholder="自动推送网站链接给百度收录" class="layui-textarea">{{ $webConfig->baidu_push }}</textarea>
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">360推送代码</label>
				<div class="layui-input-block">
					<textarea name="push_360" lay-verify="web_push_360" placeholder="自动推送网站链接给360收录" class="layui-textarea">{{ $webConfig->push_360 }}</textarea>
				</div>
			</div>

			<div class="layui-form-item layui-layout-admin">
				<div class="layui-input-block">
					<div class="layui-footer" style="left: 0;">
						<button class="layui-btn" lay-submit="" lay-filter="webconfig_edit">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</div>
		</form>
    </div>
    <div class="layui-tab-item">
    	<form class="layui-form" lay-filter="component-form-group" autocomplete="off">
		
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">海岩用户ID</label>
					<div class="layui-input-inline">
						<input name="hy_userid" lay-verify="hy_userid" value="{{ $zendConfig->hy_userid }}" autocomplete="off" placeholder="海岩用户ID" class="layui-input" type="tel" style="width:100%">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label">海岩用户名</label>
					<div class="layui-input-inline">
						<input name="hy_accound" lay-verify="hy_accound" value="{{ $zendConfig->hy_accound }}" autocomplete="off" placeholder="海岩用户名" class="layui-input" type="text" style="width:100%">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label">海岩用户密码</label>
					<div class="layui-input-inline">
						<input name="hy_password" lay-verify="hy_password" value="{{ $zendConfig->hy_password }}" autocomplete="off" placeholder="海岩用户密码" class="layui-input" type="text" style="width:100%">
					</div>
				</div>
			</div>
			<div class="layui-form-item" >
				<label class="layui-form-label">海岩短信接口</label>
				<div class="layui-input-block" >
					<input name="hy_zendcodeurl" lay-verify="hy_zendcodeurl" value="{{ $zendConfig->hy_zendcodeurl }}" autocomplete="off" placeholder="海岩短信接口URL地址" class="layui-input" type="text" style="width:100%">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">短信服务商</label>
				<div class="layui-input-block">
					<input name="type" value="1" title="海岩短信" checked="" type="radio">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">短信发送限制</label>
				<div class="layui-input-block">
					<input name="zend_time" lay-verify="zend_time" value="{{ $zendConfig->zend_time }}" autocomplete="off" placeholder="短信发送时间间隔（秒为单位）" class="layui-input" type="text" style="width:100%">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">IP次数限制</label>
				<div class="layui-input-block">
					<input name="limit_num" lay-verify="limit_num" value="{{ $zendConfig->limit_num }}" autocomplete="off" placeholder="限制相同公网IP一天（24h）内验证码发送次数" class="layui-input" type="text" style="width:100%">
				</div>
			</div>		


			<div class="layui-form-item layui-layout-admin">
				<div class="layui-input-block">
					<div class="layui-footer" style="left: 0;">
						<button class="layui-btn" lay-submit="" lay-filter="zendconfig_edit">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</div>
		</form>
    </div>
    <div class="layui-tab-item  system">
    	<form class="layui-form" lay-filter="component-form-group" autocomplete="off">
		

			<div class="layui-form-item" >
				<label class="layui-form-label">后台分页</label>
				<div class="layui-input-block" >
					<input name="sizepage_backend" lay-verify="sizepage_backend" value="{{ $systemConfig->sizepage_backend }}" autocomplete="off" placeholder="后台分页默认显示数量" class="layui-input" type="text" style="width:100%">
				</div>
			</div>
			<div class="layui-form-item" >
				<label class="layui-form-label">前台分页</label>
				<div class="layui-input-block" >
					<input name="sizepage_front" lay-verify="sizepage_front" value="{{ $systemConfig->sizepage_front }}" autocomplete="off" placeholder="前台分页默认显示数量" class="layui-input" type="text" style="width:100%">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">隐藏无权限后台菜单</label>
				<div class="layui-input-block">
					<input name="rule_menu" value="0" @if($systemConfig->rule_menu == 0) checked="checked"  @endif title="隐藏"  type="radio">
					<input name="rule_menu" value="1" @if($systemConfig->rule_menu == 1) checked="checked" @endif title="显示"  type="radio">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">站点关闭</label>
				<div class="layui-input-block">
				  <select name="site_close" lay-verify="required">
				    <option value="0" @if($systemConfig->site_close == 0) selected = "selected" @endif>关闭</option>
				    <option value="1" @if($systemConfig->site_close == 1) selected = "selected" @endif>开启</option>
				  </select>
				</div>
			</div>
			<div class="layui-form-item layui-layout-admin">
				<div class="layui-input-block">
					<div class="layui-footer" style="left: 0;">
						<button class="layui-btn" lay-submit="" lay-filter="systemconfig_edit">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</div>
		</form>
    </div>
    <div class="layui-tab-item">
			<div class="layui-form-item">
				<label class="layui-form-label" >UEditor文件</label>
				<div class="layui-input-block">
					<input type="text" name="ueditorSize" lay-verify="ueditorSize" value="{{ $sysCache['ueditorSize'] }}"  autocomplete="off" placeholder="UEditor文件大小"  disabled="disabled" class="layui-input" style="float:left">
					<button class="layui-btn" onClick="ueditorSizeclear()" style="float:left;margin-left:15px;">清除缓存</button>
				
				</div>

			</div>


    </div>
  </div>
</div>     
</div>
</div>
@endsection

@section('js')
<script>

		function ueditorSizeclear()
		{
			var index = layer.load(2);
			$.ajax('/backend/sys/ueditor-clear',{
				type : 'post',
				data : {_token:$("meta[name='csrf-token']").attr('content')},
				success : function(res)
				{
					var res = $.parseJSON(res);
					if(res.code == 200)
					{	
						$("input[name='ueditorSize']").val(res.data.size);
						layer.alert(res.info,{title:'成功',icon:6});
						layer.close(index);
					}else if(res.code == 501)
					{
						layer.alert(res.info,{title:'失败',icon:5});
						layer.close(index);
					}
				},
				error : function(res)
				{
					layer.alert('缓存清除失败',{title:'失败',icon:5});
					layer.close(index);
				}
			})
		}

		layui.use(['form','upload'], function () {
		var $ = layui.jquery, 
		upload = layui.upload;
		form = layui.form;

		//普通图片上传
		var uploadInst = upload.render({
			elem: '#test-upload-normal',
			method : 'post',
			field:'ico',
			accept:'file',
			data:{type:'ico',_token:$("meta[name='csrf-token']").attr('content')}, 
			url: '{{ url("/backend/sys/webconfig-edit") }}', 
			before: function (obj) {
				//预读本地文件示例，不支持ie8
				// obj.preview(function(index, file, result){
				// 	$('#test-upload-normal-img').attr('src', result); //图片链接（base64）
				// });
				
			}, 
			done: function (res) {
				//上传成功
				// res = $.parseJSON(res);
				// console.log(res);
				if (res.code == "200") {
					layMsgOk(res.info);
					$('#test-upload-normal-img').attr('src',''); //图片链接（base64）
					$('#test-upload-normal-img').attr('src',res.data.src); //图片链接（base64）
				}else 
				{
					layMsgError(res.info);
				}
			}, 
			error: function () {
				//演示失败状态，并实现重传
				// APP.$data.normalUpload.success = false;
				// APP.$data.normalUpload.message = "请求上传接口出现异常";

				// $('#normal-upload-reload').on('click', function () {
				// 	uploadInst.upload();
				// });
				layMsgError('上传失败');

			}
		});
		form.verify({
			web_title : function(value)
			{
				if(value.length > 25)
				{
					return '最大25位字符';
				}
			},
			web_phone : function(value)
			{	
				// if(value)
				// {
				// 	var r=/^((0\d{2,3}-\d{7,8})|(1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}))$/;
				// 	if(!r.test(value)){
				// 		return '号码格式错误,固话需加区号和符号‘-’';
				// 	};
				// }

			},
			web_qq : function(value)
			{
				if(value)
				{
					var r=/\d{6,11}/;
					if(!r.test(value)){
						return 'QQ号格式错误';
					};
				}
			},
			web_copyright : function(value)
			{
				if(value.length > 50)
				{
					return '最大50位字符';
				}
			},
			web_record : function(value)
			{
				if(value.length > 50)
				{
					return '最大50位字符';
				}				
			},
			web_keyword : function(value)
			{
				if(value.length > 255)
				{
					return '最大255位字符';
				}				
			},
			web_description : function(value)
			{
				if(value.length > 255)
				{
					return '最大255位字符';
				}				
			},
			web_statistical_code : function(value)
			{
				if(value.length > 500)
				{
					return '最大255位字符';
				}				
			},
			web_baidu_push : function(value)
			{
				if(value.length > 500)
				{
					return '最大255位字符';
				}				
			},
		    web_push_360 : function(value)
			{
				if(value.length > 500)
				{
					return '最大255位字符';
				}				
			},
			hy_userid : function(value)
			{	
				if(value)
				{
					var r=/^\d{4,10}$/;
					if(!r.test(value)){
						return '账号格式错误 4-10位数字';
					};					
				}

			},
			hy_accound : function(value)
			{
				if(value.length > 25)
				{
					return '最大25位字符';
				}				
			},
			hy_password : function(value)
			{
				if(value.length > 25)
				{
					return '最大25位字符';
				}				
			},
			hy_zendcodeurl : function(value)
			{
				if(value.length > 255)
				{
					return '最大255位字符';
				}				
			},
			zend_time : function(value)
			{
				if(value)
				{
					var r=/^\d{1,4}$/;
					if(!r.test(value)){
						return '格式错误';
					};					
				}			
			},
			limit_num : function(value)
			{
				if(value)
				{
					var r=/^\d{1,4}$/;
					if(!r.test(value)){
						return '格式错误';
					};					
				}			
			},
			sizepage_backend : function(value)
			{	
				if(value)
				{
					var r=/^\d{1,3}$/;
					if(!r.test(value)){
						return '格式错误';
					};					
				}	
			},
			sizepage_front : function(value)
			{
				if(value)
				{
					var r=/^\d{1,3}$/;
					if(!r.test(value)){
						return '格式错误';
					};					
				}
			}

		})
		form.on('submit(webconfig_edit)',function(data){
			$.ajax({
				url : "{{ url('backend/sys/webconfig-edit') }}",
				type : 'post',
				data : {data:data.field,_token:$("meta[name='csrf-token']").attr('content')},
				success : function(res)
				{
					res = $.parseJSON(res);
					if(res.code == 200)
					{
						layMsgOk(res.info);
					}else if(res.code == 501)
					{
						layMsgError(res.info);
					}else
					{
						layMsgError('修改失败');
					}
				},
				error : function(res)
				{
					layMsgError('修改失败');
				}
			})
			return false;
		});

		form.on('submit(zendconfig_edit)',function(data){
			$.ajax({
				url : "{{ url('backend/sys/zendconfig-edit') }}",
				type : 'post',
				data : {data:data.field,_token:$("meta[name='csrf-token']").attr('content')},
				success : function(res)
				{
					res = $.parseJSON(res);
					if(res.code == 200)
					{
						layMsgOk(res.info);
					}else if(res.code == 501)
					{
						layMsgError(res.info);
					}else
					{
						layMsgError('修改失败');
					}
				},
				error : function(res)
				{
					layMsgError('修改失败');
				}
			})
			return false;
		});

		form.on('submit(systemconfig_edit)',function(data){
			$.ajax({
				url : "{{ url('backend/sys/systemconfig-edit') }}",
				type : 'post',
				data : {data:data.field,_token:$("meta[name='csrf-token']").attr('content')},
				success : function(res)
				{
					res = $.parseJSON(res);
					if(res.code == 200)
					{
						layMsgOk(res.info);
					}else if(res.code == 501)
					{
						layMsgError(res.info);
					}else
					{
						layMsgError('修改失败');
					}
				},
				error : function(res)
				{
					layMsgError('修改失败');
				}
			});
			return false;
		})
	});
</script>
@endsection

