@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/baidu.css') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/front/css/reset.css') }}"/>
@endsection('css')

@section('content')
<div class="liukong"></div>
<div class="BigBox">
    <div class="ON">
        <img src="{{ asset('/front/img/ON_bj.png') }}" alt="" class="ON_bj"/>
        <img src="{{ asset('/front/img/Logo.png') }}" alt="" class="Logo"/>
        <div class="Name">四川建商家居集团</div>
        <div class="Slogan">中国房地产<span>精装修产业</span>价值构建者</div>
        <div class="buzou">
            <div class="Left">
                <span>1</span> <ol>规划设计咨询</ol>
            </div>
            <div class="Left red">
                <span>2</span> <ol>售楼部设计</ol>
            </div>
            <div class="Left">
                <span>3</span> <ol>实景样板间展示</ol>
            </div>
            <div class="Left">
                <span>4</span> <ol>批量精装修合作</ol>
            </div>
        </div>
        <div class="Tubiao">
            <div class="Auto">
                <img src="{{ asset('/front/img/Tubiao1.png') }}" alt=""/>
            </div>
            <div class="Auto">
                <img src="{{ asset('/front/img/Tubiao2.png') }}" alt=""/>
            </div>
            <div class="Auto">
                <img src="{{ asset('/front/img/Tubiao3.png') }}" alt=""/>
            </div>
        </div>
        <img src="{{ asset('/front/img/shouloubu.png') }}" alt="" class="shouloubu"/>
    </div>
    <div class="Two">
        <div class="Name">
            免费申请售楼部设计方案
        </div>
        <i class="hengxian"></i>
        <div class="yanz">
            <div class="bt">姓名<span>*</span></div>
            <input type="text" class="input_b" placeholder="请输入：" id="Name"/>
            <div class="bt">联系方式<span>*</span></div>
            <input type="text" class="input_b" placeholder="请输入：" id="Tep"/>
            <div class="bt">验证码<span>*</span></div>
            <div class="yanzm">
                <input type="text" class="yanzmIn" placeholder="请输入：" id="Send"/>
                <a href="javascript:;" class="Click_a">点击获取验证码</a>
            </div>
            <a href="javascript:;" class="Submit">提交</a>
        </div>
    </div>
    <div class="Three">
        <div class="Biaoti">
            <div class="sanjiao"></div>
            <div class="Title">建商售楼部设计方案适用于</div>
            <ol class="chenggang"></ol>
        </div>
        <div class="Con_i">
            <div class="left">
                 <span>住宅</span>
            </div>
            <img src="{{ asset('/front/img/Three_img1.png') }}" alt="" class="Three_img"/>
        </div>
        <div class="Con_i">
            <img src="{{ asset('/front/img/Three_img2.png') }}" alt="" class="Three_img"/>
            <div class="left">
                <span>公寓</span>
            </div>
        </div>
    </div>
    <div class="Four">
        <div class="FourOn">
            <div class="Biaoti">
                <div class="sanjiao"></div>
                <div class="Title">住宅</div>
            </div>
            <div class="xiaobao">北欧风格售楼部</div>
            <img src="{{ asset('/front/img/beiou.png') }}" alt="" class="beiou"/>
            <div class="Show">
                <div class="Shuli">
                    <img src="{{ asset('/front/img/Four_s1.png') }}" alt=""/>
                </div>
                <div class="Hengtu">
                    <img src="{{ asset('/front/img/Four_s2.png') }}" alt=""/>
                    <img src="{{ asset('/front/img/Four_s3.png') }}" alt=""/>
                </div>
            </div>
        </div>
        <div class="FourTwo">
            <div class="xiaobao">中式风格售楼部</div>
            <img src="{{ asset('/front/img/zhongshi.png') }}" alt="" class="beiou"/>
            <div class="Show">
                <div class="Shuli">
                    <img src="{{ asset('/front/img/Four_s4.png') }}" alt=""/>
                </div>
                <div class="Hengtu">
                    <img src="{{ asset('/front/img/Four_s5.png') }}" alt=""/>
                    <img src="{{ asset('/front/img/Four_s6.png') }}" alt=""/>
                </div>
            </div>
        </div>
        <div class="FourOn">
            <div class="Biaoti">
                <div class="sanjiao"></div>
                <div class="Title">公寓</div>
            </div>
            <div class="xiaobao">新中式风格售楼部</div>
            <img src="{{ asset('/front/img/beiou.png') }}" alt="" class="beiou"/>
            <div class="Show">
                <div class="Shuli">
                    <img src="{{ asset('/front/img/Four_s7.png') }}" alt=""/>
                </div>
                <div class="Hengtu">
                    <img src="{{ asset('/front/img/Four_s8.png') }}" alt=""/>
                    <img src="{{ asset('/front/img/Four_s9.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="Five">
        <div class="TeSe">
            <div class="sanjiao"></div>
            <div class="Title">建商装修特色</div>
            <div class="hengxian"></div>
            <div class="Liucheng">
                <div class="Liucheng_fl">
                    <span class="zuosanj"></span>
                    <span class="yousanj"></span>
                    <div class="Text">标准化</div>
                </div>
                <div class="Liucheng_fl">
                    <span class="zuosanj"></span>
                    <span class="yousanj"></span>
                    <div class="Text">规范化</div>
                </div>
                <div class="Liucheng_fl">
                    <span class="zuosanj"></span>
                    <span class="yousanj"></span>
                    <div class="Text">科学化</div>
                </div>
            </div>
        </div>
        <div class="Fuwu">
            <div class="sanjiao">
            </div>
            <div class="Title">
                为开发商提供一站式开发服务
            </div>
            <img src="{{ asset('/front/img/Fuwu_bx.png') }}" alt="" class="Fuwu_bx"/>
            <span class="Shichang">
                <ol>市场调</ol>
                <ol>研分析</ol>
            </span>
            <span class="Hezuo">
                <ol>楼盘</ol>
                <ol>批量精</ol>
                <ol>装修合作</ol>
            </span>
            <span class="Yanjiu">
                <ol>项目可</ol>
                <ol>行性研究</ol>
            </span>
            <span class="Zhenghe">
                <ol>整合营</ol>
                <ol>销策划</ol>
            </span>
            <span class="Zixun">
                <ol>整合营</ol>
                <ol>销策划</ol>
            </span>
            <span class="TiGong">
                <ol>提供</ol>
                <ol>样板间</ol>
            </span>
            <span class="SheJi">
                <ol>设计</ol>
                <ol>售楼部</ol>
            </span>
        </div>
    </div>
    <div class="Six">
        <div class="Title">
            <div class="sanjiao"></div>
            <div class="biaoti">建商热门活动</div>
            <div class="hengxian"></div>
        </div>
        <div class="Show">
            <div class="Xunhuan">
            	<a href="javascript:;">
	                <img src="{{ asset('/front/img/Six_s1.png') }}" alt=""/>
	                <div class="Youhui">
	                    <span>免费</span>
	                </div>
	                <div class="Name">实景样板间展示</div>
	            </a>
            </div>
            <div class="Xunhuan">
            	<a href="javascript:;">
	                <img src="{{ asset('/front/img/Six_s2.png') }}" alt=""/>
	                <div class="Youhui">
	                    <span>六折</span>
	                </div>
	                <div class="Name">土建装饰项目</div>
            	</a>
            </div>
            <div class="Xunhuan">
            	<a href="{{ url('/hardcover.html') }}">
	                <img src="{{ asset('/front/img/Six_s3.png') }}" alt=""/>
	                <div class="Name">批量精装修合作</div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection('content')

@section('js')
<script src="{{ asset('/front/js/baidu.js') }}"></script>
@endsection('js')

