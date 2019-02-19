<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ getenv('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('/backend/exadmin/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/backend/exadmin/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/exadmin/css/xadmin.css') }}">
</head>
<style>
.page{
    width:100%;
    margin:0 auto;
    height:30px;
    margin-bottom: 30px;
}
.page ul{
    width: 340px;
    margin:auto;

}
.page li{
    height: 30px;
    float: left;
    list-style-type:none;
    width: 35px;
    text-align: center;
    border: 1px solid #F1F1F1;
    font-size: 12px;
    line-height: 30px;
    cursor:pointer;
}
.page .pagers{
    width: 65px;
}
.page .disabled > a,
.page .disabled > a:hover,
.page .disabled > a:focus,
.page .disabled > span {
    color: #777;
    cursor: not-allowed;
    background-color: #fff;
}
.page li a{
    display: block;
    width: 100%;
    text-decoration: none;
    color: #666;
    height: 100%;
}
.page li.active{
    background-color: #E12E32;
    color: #ffffff;
}
.page li.active span{
    color: #ffffff;
}
.page li:first-child{
    width: 75px;
}
.page li:last-child{
    width: 75px;
}
</style>
@yield('css')
@yield('open')
<body>
    @if(isset($this->params) || isset($this->title))
    <div class="x-nav">
      <span class="layui-breadcrumb">
        @if(isset($this->params))
        @foreach($this->params as $v)
        <a href="{{ isset($v['url'])?$v['url']:'#' }}">{{ isset($v['label'])?$v['label']:'上级' }}</a>
        @endforeach
        @endif
        <a><cite>{{ isset($this->title)?$this->title:'' }}</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style=" width:40px;height:86%;line-height:2em;margin-top:6px;float:right;padding-left:11px;padding-top:3px;" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" title="刷新页面" >&#xe9aa;</i>
        </a>
    </div>
    @endif
    @yield('content')
</body>

<script type="text/javascript" src="{{ asset('/backend/exadmin/lib/jquery.min.js') }} "></script>
<script src="{{ asset('/backend/exadmin/lib/layui/layui.js') }}" charset="utf-8"></script>
<script type="text/javascript" src="{{ asset('/backend/exadmin/js/xadmin.js') }}"></script>


<script>
@if(\session('success_message') != null)
    layui.use('layer',function(){
            var layer = layui.layer;
            layer.ready(function(){
                layer.msg('{{ \session('success_message') }}',{icon:1,time:2000});
            })
        });
@endif
@if(\session('error_message') != null)
    layui.use('layer',function(){
            var layer = layui.layer;
            layer.ready(function(){
                layer.msg('{{ \session('error_message') }}',{icon:2,time:2000});
            })
        });
@endif
      function IsJsonString(str) {
          try {
              JSON.parse(str);
          } catch (e) {
              return false;
          }
          return true;
      }
</script>

@yield('js')
</html>