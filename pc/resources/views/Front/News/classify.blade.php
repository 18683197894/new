@extends('Front.public')

@section('css')

    <link rel="stylesheet" href="{{ asset('/front/news/css/News.css') }}"/>
@endsection('css')

@section('content')
<div class="News">
    <div class="Tab">
    	@foreach($classifys as $v)

        <a href="{{ url($v->url) }}" class=" @if($loop->index == 0) Tab_l @endif @if(strpos(\Request::path(),$v->url) !== false ) avtive @endif">
            <span>{{ $v->classify_name }}</span>
        </a>
        @endforeach
    </div>
    <div class="Con">
        <!--切换的内容-->
        <div class="Switch">
            <div class="Switch_T">
            	@foreach($news as $val)
                <a href="{{ url($classify->url.'/'.$val->id) }}" target="_blank" class="link">
                    <img src="{{ !empty($val->exhibition_image)?$val->exhibition_image:env('UPLOAD_NEWS_HEAD_DEFAULT') }}" alt=""/>
                    <div class="Title">{{ $val->title }}</div>
                    <div class="Num">
                        <div class="Num_l">
                            <span class="Bul">{{ $val->source }}</span><span>|</span><span>浏览</span><span class="Bul">{{ $val->total_num }}</span>
                        </div>
                        <div class="time">{{ $val->created_at->format('Y-m-d') }}</div>
                    </div>
                    <!--分割线-->
                    <i class="Dividing"></i>
                    <div class="Present">
                        {{ $val->synopsis }}
                    </div>
                </a>
                @endforeach
            </div>
            <!--分页-->
           
				@php echo $links @endphp
            
        </div>
    </div>
    <div class="Con_r">
        <div class="Recommend">
            <div class="Title">
                热门推荐
            </div>
            <i class="Dividing"></i>
            @foreach($remen as $value)
            <a href="{{ url($classify->url.'/'.$value->id) }}" target="_blank">
                <img src="{{ !empty($value->exhibition_image)?$value->exhibition_image:env('UPLOAD_NEWS_HEAD_DEFAULT') }}" alt=""/>
                <div class="neir">
                    <div class="Time">{{ $value->created_at->format('Y-m-d') }}</div>
                    <div class="Text">
                        {{ $value->title }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</div>
@endsection

@section('js')

@endsection