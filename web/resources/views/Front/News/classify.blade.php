@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/News.css') }}"/>

@endsection

@section('content')
<div class="News">
    <div class="News_Jz">
        @foreach($news as $v)
        <a href="{{ url($v->classify->url.'/'.$v->id) }}">
            @if($v->exhibition_image)

            <img src="{{ str_replace('//m','//www',asset($v->exhibition_image)) }}" alt=""/>
            @else

            <img src="{{ asset(env('UPLOAD_NEWS_HEAD_DEFAULT')) }}" alt=""/>
            @endif
            <div class="Text">
                <div class="Title">{{ $v->title }}</div>
                <div class="Browse">
                    <span>{{ $v->created_at->format('Y-m-d') }}</span>
                    <i></i>
                    <span>浏览数：{{ $v->total_num }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @php echo $links @endphp
</div>

<!--占位置给尾部-->
<div class="Occupy"></div>
<!--尾部-->
@endsection

@section('js')

@endsection