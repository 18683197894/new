@extends('Front.public')

@section('css')

    <link rel="stylesheet" href="{{ asset('/front/index/css/shutter.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/index/css/index.css') }}"/>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=6La1H1Bhdp2LrD5xsBkf1yxkeFjhelYU"></script>
@endsection

@section('content')
<div class="commercial">
    <span class="guanb">广告关闭倒计时<i class="Num"></i></span>
    <img src="{{ asset('/front/index/img/index_commercial.png') }}" alt="" class="index_commercial"/>
</div>
<div class="shutter">
    <div class="shutter-img">
        @foreach($lunbo as $v)
        <a href="{{ $v->url }}" data-shutter-title="Iron Man"><img src="{{ asset($v->image) }}" alt="#"></a>
        @endforeach
<!--         <a href="#" data-shutter-title="Super Man"><img src="{{ asset('/front/index/img/banner2.png') }}" alt="#"></a> -->
    </div>
    <ul class="shutter-btn">
        <li class="prev"></li>
        <li class="next"></li>
    </ul>
</div>
<div class="About">
    <div class="kouh">
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_h"/>
        <div class="Title">
            关于我们
        </div>
        <div class="xiaob">ABOUT US</div>
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_x"/>
        <div class="Text">
            建商集团是一家集规划设计、家居供应、装修实施、代理销售于一体的家居生态平台公司，专业为房地产开发商解决商品房批量精装修、售楼部\样板间设计装修、楼盘销售代理、物业管理等整套开发协同服务。
        </div>
        <a href="{{ url('/about.html') }}" class="More">了解更多</a>
    </div>
</div>
<div class="Pattern">
    <div class="Title">
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_h"/>
        <div class="Name">
            建商模式
        </div>
        <div class="xiaob">JIANSHANG MODE</div>
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_x"/>
    </div>
    <a href="{{ url('/commerce.html') }}" class="Pattern_bj">
        <img src="{{ asset('/front/index/img/Pattern.png') }}" alt="建商集团合作模式" />
    </a>
</div>
<div class="Slogan">
    <div class="Title">
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_h"/>
        <div class="Name">
            六大核心优势
        </div>
        <div class="xiaob">Six Core Advantages</div>
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_x"/>
    </div>
    <div class="pic">
        <ul>
            <li class="pic1">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">免费建筑规划设计咨询</p>
                    </div>
                </a>
            </li>
            <li class="pic2">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">免费提供样板房</p>
                    </div>
                </a>
            </li>
            <li class="pic3">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">免费销售代理</p>
                    </div>
                </a>
            </li>
            <li class="pic4">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">免费设计售楼部</p>
                    </div>
                </a>
            </li>
            <li class="pic5">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">免费物管业务</p>
                    </div>
                </a>
            </li>
            <li class="pic6">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">建筑工程装修项目六折</p>
                    </div>
                </a>
            </li>
            <li class="pic7">
                <a href="javascript:;">
                    <div class="txt">
                        <p class="p1">楼盘批量精装修</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="news" style="display:none">
    @foreach($news as $val)
    <a href="{{ url($val->classify->url.'/'.$val->id) }}" target="_blank" class="link">
        <div class="Title">{{ $val->title }}</div>
        <div class="synopsis">
            {{ $val->synopsis }}
        </div>
    </a>
    @endforeach
</div>
<div class="Contact">
    <div class="Title">
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_h"/>
        <div class="Name">
            联系我们
        </div>
        <div class="xiaob">CONTENT US</div>
        <img src="{{ asset('/front/index/img/About_h.png') }}" alt=""class="About_x"/>
    </div>
    <div class="Contact_wo">
        <!--百度地图容器-->
        <div id="map"></div>
        <div class="Leaving">
            <input type="text" class="Project" name="name" placeholder="姓名:" id="name"/>
            <input type="text" class="Project" name="Project" placeholder="项目名称:" id="Project"/>
            <input type="text" class="Project" name="Developers" placeholder="公司名称:" id="Developers"/>
            <input type="text" class="Project" name="Telephone" placeholder="联系方式:" id="Telephone"/>
            <a href="javascript:;">提交</a>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    setTimeout(function(){
         $(".commercial").css("display","none");
         },
    5000);
    $(".index_commercial").click(function(){
        $(".commercial").css("display","none");
    });
    function count(wait) {
        function time() {
            if (wait == 0) {
                //倒计时完成以后进行操作
            } else {
                $(".Num").show().text(wait + "s");//显示倒计时数字
                wait--;
                setTimeout(function () {
                    time();
                }, 1000)
            }
        }
        time();
    }
    count(5);
</script>
<script src="{{ asset('/front/index/js/velocity.js') }}"></script>
<script src="{{ asset('/front/index/js/shutter.js') }}"></script>
<script src="{{ asset('/front/index/js/index.js') }}"></script>
<script type="text/javascript">
//创建和初始化地图函数：
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(103.96146,30.690248),19);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
      var markers = [
        {content:"成都市青羊区成飞大道青羊总部基地H区7栋201号",title:"建商集团总部基地",imageOffset: {width:-46,height:-21},position:{lat:30.690461,lng:103.96101}}
      ];
      for(var index = 0; index < markers.length; index++ ){
        var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
        var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
          imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
        })});
        var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
        var opts = {
          width: 200,
          title: markers[index].title,
          enableMessage: false
        };
        var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
        marker.setLabel(label);
        addClickHandler(marker,infoWindow);
        map.addOverlay(marker);
      };
    }
    //向地图添加控件
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
      scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
      map.addControl(navControl);
      var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
      map.addControl(overviewControl);
    }
    var map;
    initMap();
</script>
@endsection
