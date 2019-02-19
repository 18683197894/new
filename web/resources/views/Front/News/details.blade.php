@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/News_Details.css') }}"/>
<style type="text/css">
.Connet img{
    width: 100%;
}
</style>
@endsection

@section('content')

<div class="News_Details">
    <div class="News_Details_Jz">
        <div class="Title">{{ $news->title }}</div>
        <div class="Liulan">
            <span>{{ $news->source }}</span>
            <i></i>
            <span>{{ $news->created_at->format('Y-m-d') }}</span>
            <i></i>
            <span>浏览数：{{ $news->total_num }}</span>
        </div>
    </div>
    <div class="Connet">@php echo $news->content @endphp</div>
</div>

<div class="Recommend">
    <div class="Recommend_Jz">
        <div class="Title">
            <span>热门推荐</span>
            <i></i>
        </div>
        <div class="Recommend_Show">
            <div class="Recommend_a">
                @foreach($remen as $v)
                <a href="{{ url($v->classify->url.'/'.$v->id) }}">
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
<!--尾部-->
@endsection

@section('js')

@endsection