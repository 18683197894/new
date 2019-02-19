@extends('Backend.public')
@section('style')

@endsection

@section('content')
<body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">{{ \session('backend')['username'] }}</span>！&nbsp;&nbsp;&nbsp;
            当前时间 : <span id="time"></span>
            </blockquote>
            
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" onclick="parent.x_tab('{{ url('/backend/adminlist/index') }}')" class="x-admin-backlog-body">
                                                <h3>管理员</h3>
                                                <p>
                                                    <cite>{{App\Model\MemberBackend::count()}}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" onclick="parent.x_tab('{{ url('/backend/project/householders-index') }}')" class="x-admin-backlog-body">
                                                <h3>户主</h3>
                                                <p>
                                                    <cite>{{App\Model\MemberFront::count()}}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" onclick="parent.x_tab('{{ url('/backend/dynamic/news-index') }}')" class="x-admin-backlog-body">
                                                <h3>新闻</h3>
                                                <p>
                                                    <cite>{{ App\Model\DynamicNews::count() }}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" onclick="parent.x_tab('{{ url('/backend/message/leaving-message') }}')" class="x-admin-backlog-body">
                                                <h3>留言</h3>
                                                <p>
                                                    <cite>{{App\Model\LeavingMessage::count()}}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <!-- <tr>
                            <td >
                                <a class="x-a" href="/" target="_blank">新版x-admin 2.0上线了</a>
                            </td>
                        </tr> -->
                       
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>管理员信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>当前管理员</th>
                            <td>{{ $backend['username'] }}</td></tr>
                        <tr>
                            <th>邮箱</th>
                            <td>{{ $backend['email'] }}</td></tr>
                        <tr>
                            <th>电话</th>
                            <td>{{ $backend['phone'] }}</td></tr>
                        <tr>
                            <th>登入IP地址</th>
                            <td>{{ $backend['last_ip'] }}</td></tr>
                        <tr>
                            <th>登入时间</th>
                            <td>{{ date('Y-m-d H:i:s',$backend['updated_at']) }}</td></tr>
                        <tr>
                            <th>登入次数</th>
                            <td>{{ $backend['visit_count'] }}</td></tr>
                        
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>PHP</th>
                            <td>{{ PHP_VERSION }}</td></tr>
                        <tr>
                            <th>Mysql </th>
                            <td><?php 
                            $pass = env('DB_PASSWORD')?env('DB_PASSWORD'):'';
                            $con = mysqli_connect("localhost", "root", $pass);echo "MySQL server info: " .mysqli_get_server_info($con); 
                            ?></td></tr>
                        <tr>
                            <th>Apache</th>
                            <td>Apache2.4</td></tr>
                        <tr>
                            <th>Laravel</th>
                            <td>{{ app()::VERSION }}</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>{{ get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):'不允许' }}</td></tr>
                        <tr>
                            <th>最大执行时间</th>
                            <td>{{ get_cfg_var("max_execution_time")."秒 " }}</td></tr>
                        <tr>
                            <th>最大占用内存</th>
                            <td>{{ get_cfg_var("memory_limit")?get_cfg_var("memory_limit"):"无" }}</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>{{ PHP_OS }}</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>建商网络科技
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>zhenglunsen@ioive.com</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote>
    </div>
</body>
@endsection

@section('js')

     <script>

    var $ = layui.$;

     $(function(){
        //定时器每秒调用一次
         setInterval(function(){
                             var date=new Date();
                             var year=date.getFullYear(); //年
                             var mon=date.getMonth()+1;  //月
                             var day=date.getDate();     //日
                             var hh=date.getHours();     //时
                             var mm=date.getMinutes();   //分
                             var ss=date.getSeconds();   //秒
                             var today=new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
                             var xq=today[date.getDay()];
                             var daytime;
                                
                             var time;
                             if(mm<10 ){
                                     mm="0"+mm;
                             }
                             if(ss<10){
                                     ss="0"+ss;
                                 }
                                 time=year +"年"+mon+"月"+day + '日 '+ hh+":"+ mm + ":" +ss+'   '+xq;
                             $("#time").html(time);
                             });
         },1000);
     </script>
@endsection
