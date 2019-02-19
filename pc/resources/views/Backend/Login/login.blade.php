<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport"
		  content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
	<meta http-equiv="Cache-Control" content="no-siteapp"/>

	<link rel="shortcut icon" href="{{ asset('/backend/exadmin/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('/backend/exadmin/css/font.css') }}">
	<link rel="stylesheet" href="{{ asset('/backend/exadmin/css/xadmin.css') }}">

</head>

<body class="login-bg">
<script type="text/javascript" src="{{ asset('/backend/exadmin/lib/jquery.min.js') }} "></script>
<script type="text/javascript">
		@if(!empty(session('messageinfo')) && session('messageinfo') == '此账号已在别处登录' || session('messageinfo') == '此账号已被禁用')
		$(function(){
		$('html').css('display','none');
		$('body').css('display','none');
		alert("{{ session('messageinfo') }}");
		parent.reset();
		});

		@else
		$(function(){
		parent.reset();
		});
		@endif

</script>
<div class="login layui-anim layui-anim-up">
	<div class="message">建商-管理登录</div>
	<div id="darkbannerwrap"></div>

	<form method="post" action="{{ url('backend/origin-dologin') }}" class="layui-form" >
			@csrf
            <input name="username" value="{{ old('username') }}" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            @if( isset($verCode) &&$verCode == 'true')
				<div>
				{!! Geetest :: render() !!}
				</div>
				<hr class="hr15">	
			@endif
			@if(session('messageinfo'))
				<div>
					<p style="color: #a94442;">{{ session('messageinfo') }}.</p>		
				</div>
				<hr class="hr15">
			@endif
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
    </form>
</div>

<script src="{{ asset('/backend/exadmin/lib/layui/layui.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('/backend/exadmin/js/xadmin.js') }}"></script>

<script>
	// $(function () {
	// 	layui.use('form', function () {
	// 		var form = layui.form;
	// 		// layer.msg('玩命卖萌中', function(){
	// 		//   //关闭后的操作
	// 		//   });
	// 		//监听提交
	// 		form.on('submit(login)', function (data) {
	// 			// alert(888)
	// 			layer.msg(JSON.stringify(data.field), function () {
	// 				location.href = 'index.html'
	// 			});
	// 			return false;
	// 		});
	// 	});
	// })


</script>

</body>
</html>

