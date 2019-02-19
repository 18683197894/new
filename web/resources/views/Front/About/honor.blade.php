@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Honor.css') }}"/>

@endsection

@section('content')
<div class="Honor">
    <div class="Honor_Jz">
        <div class="Title">荣誉展示</div>
        <i></i>
    </div>
    <div class="Honor_Show">
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Honor_Show1.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Honor_Show2.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Honor_Show3.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Honor_Show4.png') }}" alt=""/>
        </a>
    </div>
</div>

<div class="Course">
    <div class="Course_Jz">
        <div class="Title">
            <span>发展历程</span>
            <i></i>
        </div>
        <div class="Course_Time">
            <div class="Course_Time_a">
                <div class="Time">2018</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>

                <div class="Text">2018年，与贵州·万都铭城、宜宾·德福公元等多个项目达成战略合作，并助其成为当地标杆</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2017</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川我爱我家装饰工程有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2016</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川建商网络科技有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2015</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川建商房地产营销策划有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2014</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川四仪园林绿化工程有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2013</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川妙缘酒店管理有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2012</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川鲁工建设工程有限公司成立</div>
            </div>
            <div class="Course_Time_a">
                <div class="Time">2011</div>
                <div class="Course_img">
                    <img src="{{ asset('/front/img/Course_yuan.png') }}" alt="" class="Course_yuan"/>
                </div>
                <div class="Text">建商集团子公司四川四仪商贸有限责任公司成立</div>
            </div>
            <!--线-->
            <div class="Course_Xian"></div>
        </div>
    </div>
</div>

<div class="Understand">
    <div class="Understand_Jz">
        <div class="Title">
            <span>了解建商</span>
            <i></i>
        </div>
        <div class="Understand_Show">
            <div class="Understand_Show_a">
        @foreach($news as $v)
        <a href="{{ url($v->Classify->url.'/'.$v->id) }}">
            <img src="{{ str_replace('//m','//www',asset($v->exhibition_image)) }}" alt=""/>
            <span>{{ $v->title }}</span>
        </a>
        @endforeach
            </div>
        </div>
    </div>

</div>

<!--占位置给尾部-->
<div class="Occupy"></div>
@endsection

@section('js')

@endsection