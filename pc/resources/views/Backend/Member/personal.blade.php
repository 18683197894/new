@extends('Backend.public')
@section('style')
<style>
.ibox-content {
    clear: both;
}
.ibox-content {
    background-color: #ffffff;
    border-color: #e7eaec;
    border-image: none;
    border-style: solid solid none;
    border-width: 1px 0;
    color: inherit;
    padding: 15px 20px 20px;
    overflow: auto;
}
.text-center {
    text-align: center;
}
img.circle-border {
    border: 6px solid #FFF;
    border-radius: 50%;
}
#info p{
	line-height: 22px;
}
</style>
@endsection

@section('content')
<body class="layui-layout-body layui-bg-gray">


  <div class="layui-row " style="height:100%">
    <div class="layui-col-md3" style="padding:30px;">
	    <blockquote class="layui-elem-quote">
			个人信息
		</blockquote>
		<div class="x-body" style="border:1px solid #ccc;background-color: white;padding:0 20px 20px 20px;" >
	   		
            <div class="ibox-content text-center">
		    	
					<div class="layui-field-box">
						<div class="layui-upload">
							<div class="layui-upload-list">
								<img class="img-thumbnail" id="test-upload-normal-img" style="width: 120px; height: 120px;border-radius:120px"
									 src="@if(!empty($member['head_portrait'])) {{ asset($member['head_portrait']) }} @else {{ asset(env('UPLOAD_BACKEND_HEAD_DEFAULT')) }} @endif">
							</div>

							<button type="button" class="layui-btn"  id="test-upload-normal">选择图片</button>
						
						</div>
					</div>     
            </div>
            <div class="ibox-content" id="info">
                <p>最后登陆IP： {{ $member['last_ip'] }}</p>
                <p>最后登陆时间： {{ date('Y-m-d H:i:s',$member['last_time']) }}</p>
                <p>登录次数： {{ $member['visit_count'] }}</p>
                <p>用户角色：@if($member['type'] == 10) 超级管理员 @elseif($member['roles']) {{ $member['roles']['role_name'] }} @else 无 @endif</p>
            	@if($member['type'] == 10)
						<p>拥有权限：完全控制 </p>
				@else
            	<div>
            		<p>拥有权限： </p>
            		@if(!empty($rule))
            		@foreach($rule as $val)
            			<span>{{ $val['rule_name'] }}</span>
            		@endforeach
            		@endif     		
            	</div>
            	@endif
            </div>
            <!-- <div class="ibox-content">
                <h5>详细地址</h5>
                <p>旧宫</p>
            </div> -->

		</div>
    </div>
    <div class="layui-col-md9 " style="padding:30px;">
    <blockquote class="layui-elem-quote">
		资料编辑
	</blockquote>
      <form class="layui-form" action="" lay-filter="component-form-group" autocomplete="off" style="border:1px solid #ccc;background-color: white;padding:20px;">
			@csrf
			<input type="hidden" name="id" value="{{ $member['id'] }}">
			<div class="layui-form-item">
				<label class="layui-form-label">真实姓名</label>
				<div class="layui-input-block">
					<input name="nickname" value="{{ $member['nickname'] }}" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" type="text">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">性别</label>
				<div class="layui-input-block">
					<input name="sex" value="1" title="男" @if($member['sex'] ==1 ) checked="checked" @endif type="radio"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
					<input name="sex" value="2" title="女" @if($member['sex'] ==2 ) checked="checked" @endif type="radio"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
				</div>
			</div>
			
			
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">手机</label>
					<div class="layui-input-inline">
						<input name="phone" value="{{ $member['phone'] }}" lay-verify="phone" autocomplete="off" class="layui-input" type="tel">
					</div>
				</div>
				<div class="layui-inline">
					<label class="layui-form-label">邮箱</label>
					<div class="layui-input-inline">
						<input name="email" value="{{ $member['email'] }}" lay-verify="email" autocomplete="off" class="layui-input" type="text">
					</div>
				</div>
			</div>
			

			

			<div class="layui-form-item">
				<label class="layui-form-label">原密码</label>
				<div class="layui-input-inline">
					<input name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
				</div>
				<div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">新密码</label>
				<div class="layui-input-inline">
					<input name="password_new" lay-verify="newpass" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
				</div>
				<div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">重复新密码</label>
				<div class="layui-input-inline">
					<input name="password_news" lay-verify="newpass_s" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
				</div>
				<div class="layui-form-mid layui-word-aux">请填写6到16位密码</div>
			</div>
			

			<hr>
			<div class="layui-form-item ">
				<div class="layui-input-block">
				<br>
					<div class="layui-footer">
						<button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</div>
			
		</form>
    </div>
  </div>
   

</body>
@endsection

@section('js')
<script>
	layui.use([
		'form', 'laydate'
	], function () {
		var $ = layui.$,
			admin = layui.admin,
			element = layui.element,
			layer = layui.layer,
			laydate = layui.laydate,
			form = layui.form;
			pass = $("input[lay-verify='pass']");
			newpass = $("input[lay-verify='newpass']");
			newpass_s = $("input[lay-verify='newpass_s']");
		form.render(null, 'component-form-group');

		laydate.render({elem: '#LAY-component-form-group-date'});

		/* 自定义验证规则 */
		form.verify({
			pass:function(value)
			{
				if(value != '' && !value.match(/[A-Za-z0-9_\-.]{6,16}$/))
				{
					return '原密码格式错误';
				}
			},
			newpass: function(value)
			{
				if( pass.val() != '' )
				{	
					if(value == false)
					{
						return '新密码不能为空';
					}
					if(!value.match(/[A-Za-z0-9_\-.]{6,16}$/))
					{
						return '新密码格式错误';
					}
				}

			},
			newpass_s: function(value)
			{
				if(pass.val() != '')
				{
					if(value != newpass.val())
					{
						return '新密码不一致';
					}
					if(value == pass.val())
					{
						return '新密码和原密码相同';
					}		
				}

			}
			
		});

		/* 监听提交 */
		form.on('submit(component-form-demo1)', function (data) {
			//loading层
			var load = layer.load(2, {
			  shade: [0.2,'#f0f0f0'] //0.1透明度的白色背景
			});
			
			$.ajax({
				url : "{{ url('/backend/member/personal-edit') }}",
				type : 'post',
				data : data.field,
				dadaType : 'json',
				success : function(res)
				{	
					layer.close(load);

					res = $.parseJSON(res);
					if(res.code == 200)
					{	
						layer.alert(res.info,{title:'资料修改',icon:6,closeBtn:1,btn:['关闭']});
						parent.adminListEdit(data.field);

					}else if(res.code == 501)
					{
						layer.alert(res.info,{title:'资料修改',icon:5,closeBtn:1,btn:['关闭']});
					}else
					{
						layer.alert('数据异常',{title:'资料修改',icon:5,closeBtn:1,btn:['关闭']});
					}
				},
				error : function(res)
				{
					layer.alert('404',{title:'资料修改',icon:5,closeBtn:1,btn:['关闭']});
					layer.close(layer.index);
					
				}

			})
			pass.val('');
			newpass.val('');
			newpass_s.val('');
			return false;
		});

	});


	layui.use(['upload'], function () {
		var $ = layui.jquery, 
		upload = layui.upload;
		
		//普通图片上传
		var uploadInst = upload.render({
			elem: '#test-upload-normal',
			method : 'post',
			field:'photo',
			data:{id:{{ $member['id'] }},_token:$("meta[name='csrf-token']").attr('content')}, 
			url: '{{ url("/backend/member/personal-head_portrait") }}', 
			before: function (obj) {
				//预读本地文件示例，不支持ie8
				// obj.preview(function(index, file, result){
				// 	$('#test-upload-normal-img').attr('src', result); //图片链接（base64）
				// });
				
			}, 
			done: function (res) {
				//上传成功
				// res = $.parseJSON(res);
				
				if (res.code == "200") {
					layMsgOk("头像上传成功.");
					$('#test-upload-normal-img').attr('src', res.data.src); //图片链接（base64）
					parent.headPortraitEdit({{ $member['id'] }},res.data.src);
				}else 
				{
					layMsgError("头像上传失败.");

				}
			}, 
			error: function () {
				//演示失败状态，并实现重传
				// APP.$data.normalUpload.success = false;
				// APP.$data.normalUpload.message = "请求上传接口出现异常";

				// $('#normal-upload-reload').on('click', function () {
				// 	uploadInst.upload();
				// });
				layer.alert('上传失败',{title:'头像修改',icon:5,closeBtn:1,btn:['关闭']});

			}
		});


	});
</script>
@endsection
