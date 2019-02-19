<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ getenv('APP_NAME') }}</title>
	<link rel="shortcut icon" href="{{ asset('/backend/exadmin/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('/backend/exadmin/css/font.css') }}">
	<link rel="stylesheet" href="{{ asset('/backend/exadmin/css/xadmin.css') }}">
</head>

<body>
<!-- 顶部开始 -->
<div class="container">
	<div class="logo">
		<img class="layui-nav-img" style="float: left; width:35px;height:35px;margin:6px 0px 0px 25px " src="{{ asset('/backend/image/logo.png') }}">
		<a href="{{ url('/backend/origin-index') }}" style="width:145px;padding-left:15px">建商网</a>
	</div>
	<div class="left_open">
		<i title="展开左侧栏" class="iconfont">&#xe699;</i>
	</div>
	<ul class="layui-nav left fast-add" lay-filter="">
		<li class="layui-nav-item">
			<a href="javascript:;" title="刷新工具" id="frame-reload">
				<i class="layui-icon" title="刷新页面">&#xe9aa;</i>
			</a>
		</li>
		<li class="layui-nav-item">
			<a href="javascript:;">+新增</a>
			<dl class="layui-nav-child">
				<!-- 二级菜单 -->
				<dd>
					<a onclick="x_admin_open('资讯','http://www.baidu.com')">
						<i class="iconfont">&#xe6a2;</i>资讯</a>
				</dd>
				<dd>
					<a onclick="x_admin_open('图片','http://www.baidu.com')">
						<i class="iconfont">&#xe6a8;</i>图片</a>
				</dd>
				<dd>
					<a onclick="x_admin_open('用户','http://www.baidu.com')">
						<i class="iconfont">&#xe6b8;</i>用户</a>
				</dd>
			</dl>
		</li>
	</ul>
	<ul class="layui-nav right" lay-filter="">
		<li class="layui-nav-item">
			<a href="javascript:;">{{ \session('backend')['username'] }}</a>
			<dl class="layui-nav-child">
				<!-- 二级菜单 -->
				<dd>
					<a onclick="x_admin_open('个人信息','{{ url('/backend/member/personal') }}')">个人信息</a>
				</dd>
				
				<dd>
					<a href="{{ url('/backend/origin-exit') }}">退出</a>
				</dd>
			</dl>
		</li>
		<li class="layui-nav-item to-index">
			<a target="_blank" href="{{ url('/') }}">前台首页</a>
		</li>
	</ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
	<div id="side-nav">
		<ul id="nav">
			@foreach($menu as $val)
            <li>
                <a href="javascript:;">
                    <i class="iconfont">@php echo $val['lcon'] @endphp</i>
                    <cite>{{ $val['title'] }}</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                	@foreach($val['get_menus'] as $value)
                    <li>
                        <a _href="{{ url($value['url']) }}">
                            <i class="iconfont">@php echo $value['lcon'] @endphp</i>
                            <cite>{{ $value['title'] }}</cite>
                        </a>
                    </li >
                    @endforeach
                </ul>
            </li>
            @endforeach
 
		</ul>
	</div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
	<div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
		<ul class="layui-tab-title">
			<li class="home" lay-id="0">
				<i class="layui-icon">&#xe68e;</i>我的桌面
			</li>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show">
				<iframe src="{{ url('/backend/member/welcome') }}" frameborder="0" id="iframe_0" crolling="yes" class="x-iframe"></iframe>
			</div>
		</div>
	</div>
</div>
<div class="page-content-bg"></div>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
<!-- 底部开始 -->
<div class="footer">
	<div class="copyright">Copyright ©2018 EX-admin All Rights Reserved</div>
</div>
<!-- 底部结束 -->
</body>

<script type="text/javascript" src="{{ asset('/backend/exadmin/lib/jquery.min.js') }} "></script>
<script src="{{ asset('/backend/exadmin/lib/layui/layui.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('/backend/exadmin/js/xadmin.js') }}"></script>
<script type="text/javascript">
	function reset()
	{
		location.reload();
	}
	function x_tab(url)
    {   
        url = ".sub-menu li a[_href='"+url+"']";
        if($(url).length <= 0)
        {
        	layMsgError('无权限');
        }else
        {
        	$(url).click();
        }

    }
</script>
</html>