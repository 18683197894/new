@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/case/css/CaseDetails.css') }}"/>
@endsection

@section('content')

<div class="Crumbs">
    <span>当前位置</span><o>></o><a href="{{ url('/case.html') }}">精彩案列</a><o>></o><a href="javascript:;">案列详情</a>
</div>

<div class="CaseDetails">
    <div class="CaseDetails_list">
        <img src="{{ asset('/front/case/img/yangguang.jpg') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">重庆阳光100国际新城</div>
            <div class="xijie">
                <div class="time">楼盘地址:重庆</div>
            </div>
            <div class="neir">阳光100国际新城总建筑面积210平方公里，地处CBD核心，沿长江绵延1.2公里，与朝天门、江北嘴三足鼎立，浑然一体。我司受托负责该项目住宅批量装饰工程，通过精心设计、施工，为项目注入了新的价值内涵。</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/yangguang-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">素雅的原木色与活泼的朦胧橙在空间中相互融合，一半静谧，一半绚烂，动静自如。大厅以棕色和素白色为主色调，柔和的阳光透过窗纱散落在屋内，每一处都呈现出闲适自如的生活气息。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">深挖当代人的时代趣味与生活需求，以现代简约、自然人文的个性设计，使空间尽情地挥洒源远流长的神韵，闲适自如</div>
                </div>
                <img src="{{ asset('/front/case/img/yangguang-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/yangguang-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">个性别致的吊灯，原木色的餐桌随处安放的花束，在阳光的映射下曼妙起舞，墙上的挂画呼应了这一画面，为就餐区营造出一种活泼素雅的氛围。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">深灰色床头与素白色的丝光床品，极富质感的搭配，使空间多了一份理性的冷静，墙上的挂画为空间增添了趣味，没有多余的花样与纹饰，纯粹的、极富现代感的气息扑面而来。</div>
                </div>
                <img src="{{ asset('/front/case/img/yangguang-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/xintiandi.html') }}" class="shang">上一条：浙商临港新天地</a>
            <a href="{{ url('/case/mando.html') }}" class="xia">下一条：贵州万都铭城</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection