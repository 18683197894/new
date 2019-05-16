<?php
$header = App\Model\SysMenu::where('id',$label)->first();
$this->title = '编辑新闻';
$this->params = [
  ['label'=>$header->getmenu->title],
  ['label'=>$header->title,'url'=>url($header->url).base64_decode($getKeys)]
];
?>
@extends('Backend.public')

@section('css')
    <script type="text/javascript" charset="utf-8" src="{{ asset('/UEditor/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('/UEditor/ueditor.all.js') }}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{ asset('/UEditor/lang/zh-cn/zh-cn.js') }}"></script>
<style type="text/css">
#file_name{
background-color: rgb(255, 255, 255);
border-bottom-color: rgb(210, 210, 210);
border-bottom-left-radius: 2px;
border-bottom-right-radius: 2px;
border-bottom-style: solid;
border-bottom-width: 0.883333px;
border-left-color: rgb(210, 210, 210);
border-left-style: solid;
border-left-width: 0.883333px;
border-right-color: rgb(210, 210, 210);
border-right-style: solid;
border-right-width: 0.883333px;
border-top-color: rgb(210, 210, 210);
border-top-left-radius: 2px;
border-top-right-radius: 2px;
border-top-style: solid;
border-top-width: 0.883333px;
box-sizing: border-box;
display: block;
font-family: "Microsoft Yahei", Arial, Helvetica, sans-serif, "宋体";
font-feature-settings: normal;
font-kerning: auto;
font-language-override: normal;
font-optical-sizing: auto;
font-size: 14px;
font-size-adjust: none;
font-stretch: 100%;
font-style: normal;
font-variant: normal;
font-variant-alternates: normal;
font-variant-caps: normal;
font-variant-east-asian: normal;
font-variant-ligatures: normal;
font-variant-numeric: normal;
font-variant-position: normal;
font-variation-settings: normal;
font-weight: 400;
height: 38px;
line-height: 18.2px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
outline-color: rgb(0, 0, 0);
outline-style: none;
outline-width: 0px;
padding-bottom: 0px;
padding-left: 10px;
padding-right: 0px;
padding-top: 0px;
transition-delay: 0s;
transition-duration: 0.3s;
transition-property: all;
transition-timing-function: ease;
width:30%;
min-width: 115.683px;
}
a.input {
	width:70px;
	height:30px;
	line-height:30px;
	background:#3091d1;
	text-align:center;
	display:inline-block;/*具有行内元素的视觉，块级元素的属性 宽高*/
	overflow:hidden;/*去掉的话，输入框也可以点击*/
	position:relative;/*相对定位，为 #file 的绝对定位准备*/
	top:10px;
}
a.input:hover {
	background:#31b0d5;
	color: #ffffff;
}
a{
	text-decoration:none;
	color:#FFF;

}
#file {
	opacity:0;/*设置此控件透明度为零，即完全透明*/
	filter:alpha(opacity=0);/*设置此控件透明度为零，即完全透明针对IE*/
	font-size:100px;
	position:absolute;/*绝对定位，相对于 .input */
	top:0;
	right:0;

	}
</style>
@endsection

@section('content')
<div class="x-body">
	<blockquote class="layui-elem-quote">编辑新闻 - {{ $news->title }}</blockquote>
	<div class="layui-card-body" style="padding: 15px;">
		<form class="layui-form" action="{{ url('/backend/dynamic/news-edit') }}" method="post" enctype='multipart/form-data' lay-filter="component-form-group" autocomplete="off">
			@csrf
      <input type="hidden" name="id" value="{{ $news->id }}">
      <input type="hidden" name="getKeys" value="{{ $getKeys }}">
			<div class="layui-form-item">
				<label class="layui-form-label">新闻标题</label>
				<div class="layui-input-block">
					<input type="text" name="title" lay-verify="title" value="{{ $news->title }}"  autocomplete="off" placeholder="请输入标题" class="layui-input">
				</div>
			</div>
      <div class="layui-form-item">
        <label class="layui-form-label">新闻推荐关键字</label>
        <div class="layui-input-block">
          <input type="text" name="key" lay-verify="key" value="{{ $news->key }}"  autocomplete="off" placeholder="相关新闻推荐关键字如 : 油漆,定制家具... (词汇请简洁 最好一个关键词)" class="layui-input">
        </div>
      </div>
			<div class="layui-form-item">
				<label class="layui-form-label">新闻来源</label>
				<div class="layui-input-block">
					<input type="text" name="source" lay-verify="source" value="{{ $news->source }}" placeholder="请输入来源" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">新闻简介</label>
				<div class="layui-input-block">
					<textarea name="synopsis" lay-verify="synopsis" placeholder="请输入简介" class="layui-textarea">{{ $news->synopsis }}</textarea>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">网页标题</label>
				<div class="layui-input-block">
					<input type="text" name="titles" lay-verify="titles" value="{{ $news->titles }}"  autocomplete="off" placeholder="请输入网页标题" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">新闻关键字</label>
				<div class="layui-input-block">
					<textarea name="keyword" lay-verify="keyword"  placeholder="请输入关键字" class="layui-textarea">{{ $news->keyword }}</textarea>
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">新闻网页描述</label>
				<div class="layui-input-block">
					<textarea name="description" lay-verify="description" placeholder="请输入描述信息" class="layui-textarea">{{ $news->description }}</textarea>
				</div>
			</div>
      <div class="layui-form-item">
        <label class="layui-form-label">新闻类别</label>
        <div class="layui-input-block">
          <select name="classify_id" lay-filter="aihao">
            @foreach($classify as $v)
            <option @if($news->classify_id == $v->id) selected="selected" @endif value="{{ $v->id }}">{{ $v->classify_name }}</option>
            @endforeach
          </select>
        </div>
      </div>

<!--       <div class="layui-form-item">
        <label class="layui-form-label">新闻标签</label>
        <div class="layui-input-block">
          <select name="label_id" lay-filter="aihao">
            <option value=""></option>
            @foreach($labels as $val)
            <option @if($news->label_id == $val->id) selected="selected" @endif value="{{ $val->id }}">{{ $val->name }}</option>
            @endforeach
          </select>
        </div>
      </div> -->
      <div class="layui-form-item">
        <label class="layui-form-label">浏览数</label>
        <div class="layui-input-block">
          <input type="text" name="total_num" lay-verify="total_num" value="{{ $news->total_num }}" placeholder="请输入览数" autocomplete="off" class="layui-input">
        </div>
      </div>
	  <div class="layui-form-item">
         <label class="layui-form-label">创建时间</label>
         <div class="layui-input-block">
           <input type="text" name="created_at" lay-verify="required" value="{{ $news->created_at }}" placeholder="请输入时间" autocomplete="off" class="layui-input">
         </div>
      </div>

			<div class="layui-form-item">
				<label class="layui-form-label">展示图片</label>
				<div class="layui-input-block">
           <img width="150px" height="80px" src="{{ asset($news->exhibition_image) }}">
				</div>
			</div>
            <div class="layui-form-item">
        <label class="layui-form-label">新展示图片</label>
        <div class="layui-input-block">
           <input type="text" id="file_name" name='imageName' readonly="readonly" />

                <a href="javascript:void(0);" class="input">
                  浏览
                  <input type="file" id="file" name="exhibition_image">
                </a>
        </div>
      </div>

                <script id="editor" name="content" style="margin-left:40px;margin-top:40px" type="text/plain">@php echo $news->content @endphp</script>

			<div class="layui-form-item layui-layout-admin">
				<div class="layui-input-block">
					<div class="layui-footer" style="left: 0;z-index:9999">
						<button class="layui-btn" lay-submit="" lay-filter="newsadd">立即提交</button>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor',{initialFrameWidth:1000,initialFrameHeight:500});
</script>

<script type="text/javascript">
      layui.use(['form','layer'],function(){
      form = layui.form;
      layer = layui.layer;
      form.verify({
        title:function(value)
        {
          if(value.length > 50 || value.length < 4 )
          {
            return '格式错误 最大50位 最小4位';
          }
        },
        source:function(value)
        {
          if(value.length > 25 )
          {
            return '格式错误 最大25位';
          }
        },
        synopsis:function(value)
        {
          if(value.length > 300 )
          {
            return '格式错误 最大300位';
          }
        },
        titles:function(value)
        {
          if(value.length > 50 )
          {
            return '格式错误 最大50位';
          }
        },
        keyword:function(value)
        {
          if(value.length > 255 )
          {
            return '格式错误 最大255位';
          }
        },
        description:function(value)
        {
          if(value.length > 255 )
          {
            return '格式错误 最大300位';
          }
        },
        total_num:function(value)
        { 
           if(value)
           {
             var r = /^\+?[1-9][0-9]*$/;
             if(!r.test(value))
             {
                return '请输入整数';
             }
           }
 
        }

    });

    form.on("submit(newsadd)",function(data){
    	if(!data.field.content)
    	{
    		layMsgError('新闻内容不能为空');
	    	return false;
    	}

    });

    });
</script>

<script type="text/javascript">
    $(function(){
        $("#file").change(function(){  // 当 id 为 file 的对象发生变化时
            var fileSize = this.files[0].size;
            if(this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/png')
            {
            	alert("请上传图片!");
                this.value="";
                return false;
            }
            var size = fileSize / 1024 / 1024;
            if (size > 1) {
                alert("图片不能大于1M,请将图片压缩后重新上传！");
                this.value="";
                return false;
            }else{
            	console.log(this.files[0]);
               $("#file_name").val($("#file").val());  //将 #file 的值赋给 #file_name
            }
        })
    });

</script>
@endsection
