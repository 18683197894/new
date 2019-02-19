<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class=" js mobile no-desktop no-ie chrome chrome68 root-section gradient rgba opacity textshadow multiplebgs boxshadow borderimage borderradius cssreflections csstransforms csstransitions no-touch retina fontface domloaded w-1025 gt-240 gt-320 gt-480 gt-640 gt-768 gt-800 gt-1024 lt-1280 lt-1440 lt-1680 lt-1920 portrait no-landscape" id="index-page">
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{ asset('/front/404/css/found.css') }}"/>
    <title>404</title>
    <meta charset="UTF-8">
</head>
<body>
<div class="LOGO">
    <a href="">
        <img src="{{ asset('/front/404/img/Found_LOGO.png') }}" alt=""/>
    </a>
</div>
<div class="found">
    <img src="{{ asset('/front/404/img/found_wuzi.png') }}" alt="" class="found_wuzi"/>
    <div class="found_Text">
        <div class="Silongsi">404</div>
        <div class="Baoqian">抱歉，您访问的页面不存在！</div>
        <div class="zidong">
            <div class="lf"><span class="NUM"></span>秒自动返回首页</div>
            <a href="#" onClick="javascript:history.go(-1);" class="fanhui">返回上一页</a>
        </div>
        <div class="Fangwen">
            <div class="biaoti">您还可以访问其它页面：</div>
            <div class="haikey">
                <a href="{{ url('/') }}" class="avtive">首页</a>
                <a href="{{ url('/commerce.html') }}">批量精装修</a>
                <a href="{{ url('/case.html') }}">精彩案例</a>
                <a href="{{ url('/about.html') }}">集团介绍</a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/front/404/js/jquery-1.8.3.js') }}"></script>
<script>
    function count(wait) {
        function time() {
            if (wait <= -1) {
                //倒计时完成以后进行操作
                window.location.href= '{{ url("/") }}';
            } else {
                $(".NUM").show().text(wait);//显示倒计时数字
                wait--;
                setTimeout(function () {
                    time();
                }, 1000)
            }
        }
        time();
    }
    count(10);
</script>
</body>
</html>