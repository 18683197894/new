<?php
$header = App\Model\SysMenu::where('id',$label)->first();
$this->title = $house->room_number;
$this->params = [
  ['label'=>$header->getmenu->title],
  ['label'=>$header->title,'url'=>url(url($header->url))],
  ['label'=>$house->Project->project_name,'url'=>url('/backend/project/house-index'.base64_decode($getKeys))]
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
  body{
    background-color: #f2f2f2;
}
  .fudong{
    width: 100%;
    background-color: #f2f2f2;
    overflow: hidden;
    padding-left:1%: 
    padding-right:1%;
    padding-bottom: 20px;
    height: 100%;
}
.xunhuan{
    width:23%;
    overflow: hidden;
    margin-right: 1%;
    margin-left: 1%;
    /*border: 1px solid #999;*/
    float: left;
    /*box-sizing: border-box;*/
    margin-top: 20px;
    background-color: #fff;
}
.xunhuan img{
    display: block;
    width: 100%;
    overflow: hidden;
    height: 230px;
}
.time{
    width: 100%;
    line-height: 30px;
    height: 30px;
    text-align: center;
    /*border-top: 1px solid #999;*/
    /*box-sizing: border-box;*/
    font-size: 18px;
}
.time a{
  color: #333;
}
.layui-inline{
  width: 100%;
  margin-top: 50px;
}
.layui-form-label{
  width: 50px;
}
.layui-input{
  height: 30px;
  margin-top: 4px;
}
.layui-form-item{
  margin-top:30px;
}
.layui-form-item input{
  display: block;
  float: left;
  width: 180px;
  margin-top: 6px;
}
.im{
  float: left;
}
.layui-input-block{
  margin-left: 40px;
}
@media screen and (max-width: 980px){
  .xunhuan{
      width: 48%;
  }
}
@media screen and (max-width: 780px){
    .xunhuan{
        width: 48%;
    }
}

@media screen and (max-width: 480px){
    .xunhuan{
        width: 98%;
    }
}

.x-nav{
  background-color: #fff;
}
.add{
  height: 300px;
}
.dingw{
        width:80%;
        height: 35px;
        position: relative;
        border-color: #D2D2D2 !important;
    }
   .jd{
        width: 30%;
        float:left;
        text-align: center;
        color: #666;
        line-height: 35px;
        margin-left: 4%;
     }
    .xialai{
        width: 66%;
        float: left;
        height: 35px;
        border: 1px solid #EFEEF0 ;
        cursor: pointer;
        text-align: center;
        line-height: 35px;
        position: relative;
        box-sizing: border-box;
    }
    .xuanxiang{
        background-color: #ffffff;
        position: absolute;
        top: 35px;
        left: 35%;
        width: 65%;
        height: 80px;
        overflow:scroll;
        border:1px solid #707070;
        display: none;
        box-sizing: border-box;
        z-index: 999;
    }
    .xuanxiang a{
      outline: none;
      border: none;
        text-decoration: none;
        color: #333333;
        border-bottom: 1px solid #EFEEF0 ;
        display: block;
        width: 100%;
        height: 35px;
        line-height: 35px;
        text-align: center;
        overflow: hidden;
        box-sizing: border-box;
        cursor: pointer;
    }
    .xuanxiang a:hover{
        background-color: #7AADE1;
    }
    .xuanxiang.avtive{
        display: block;
    }

</style>
@endsection
@section('open')

@endsection

@section('content')
  <blockquote class="layui-elem-quote" style="margin-bottom: 0px; background-color: #fff; font-size:15px;">相册</blockquote>
    <div class="xunhuan clone" id="" style="display:none">
        <img src="" alt=""/>
        <div class="time"></div>
        <div class="time"></div>
        <div class="time">
          <a title="删除" onclick="house_del(this)" href="javascript:;">
                <i class="iconfont">&#xe69d;</i>
          </a>
        </div>
    </div>
<div class="fudong">
@foreach($album as $k => $v)
    <div class="xunhuan" id="{{ $v->id }}">
        <img src="{{ asset($v->image) }}" alt=""/>
        <div class="time">{{ $v->time }}</div>
        <div class="time">{{ $v->Schedule->stage.' '.$v->Schedule->matter.' '.$v->Schedule->details }}</div>
        <div class="time">
          
          <a title="删除" onclick="house_del(this)" href="javascript:;">
                <i class="iconfont">&#xe69d;</i>
          </a>
        </div>
    </div>
@endforeach

    <div class="xunhuan add">
    
          <input type="hidden" name="house_id" value="{{ $house->id }}">
          <div class="layui-inline">
              <label class="layui-form-label">日期</label>
              <div class="layui-input-inline">
                <input type="text" name="time" id="time"  placeholder="默认当前时间" autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label im">图片</label>
            
                <input type="file" id="image" name="image">
          </div>
          
<div class="dingw">
  <div class="jd">阶段</div>
    <div class="xialai" val="">
        下拉选择
    </div>
    <div class="xuanxiang">
      @foreach($schedule as $v)
        <a href="javascript:;"val="{{ $v->id }}" >{{ $v->stage.' '.$v->matter.' '.$v->details }}</a>
      @endforeach
    </div>
</div>
          <div class="layui-form-item ">
            <div class="layui-input-block">
              <div class="layui-footer">
                <button class="layui-btn" lay-submit="" lay-filter="album_edit">立即提交</button>
              </div>
            </div>
          </div>
     

    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  function house_del(obj){
    var id = $(obj).parents('.xunhuan').attr('id');
    layer.confirm('确定删除吗',{title:'提示'},function(){
      $.ajax({
        url : "{{ url('/backend/project/house-album-del') }}",
        type : 'post',
        data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
        success : function(res)
        {
          res = $.parseJSON(res);
          if(res.code == 200)
          {
             $(obj).parents('.xunhuan').css('display','none');
             layMsgOk(res.info);
          }else
          {
            layMsgError(res.info);
          }
        },error : function()
        {
          layMsgError('操作失败');
        }
      });
    });
  }
  layui.use(['laydate','form'],function(){
      var laydate = layui.laydate;
      var form = layui.form;
      laydate.render({
        elem: '#time' //指定元素
      });
      form.on('submit(album_edit)',function(data){
        datas = new FormData();
        datas.append('image',$('#image').get(0).files[0]);
        datas.append('time',$("input[name='time']").val());
        datas.append('house_id',$("input[name='house_id']").val());
        datas.append('schedule_id',$(".xialai").attr('val'));
        datas.append('_token',$("meta[name='csrf-token']").attr('content'));

        $.ajax({
          url : "{{ url('/backend/project/house-album-add') }}",
          type : 'post',
          contentType : false,
          processData : false,
          async:false,
          data : datas,
          success : function(res)
          {
            var res = $.parseJSON(res);
            if(res.code == 200)
            { 
              var div = $('.clone').clone(true);
              div.removeClass('clone');
              div.attr('id',res.data.id)
              div.css('display','block');
              div.find('img').attr('src',res.data.image);
              div.find('.time').eq(0).html(res.data.time);
              div.find('.time').eq(1).html(res.data.schedule);
              $(".xialai").attr('val','');
              $('.add').before(div);
              $('#image').val('');
              $("input[name='time']").val('');
              layMsgOk(res.info);
            }else
            {
            $('#image').val('');
            $("input[name='time']").val('');
              layMsgError(res.info);
            }
          },
          error : function(error)
          {
            $('#image').val('');
            $("input[name='time']").val('');
            layMsgError('上传失败');
          }
        });
        return false;
      });
  });
$(".xialai").click(function(){
    $(".xuanxiang").addClass("avtive")
})
$(".xuanxiang a").click(function(){
    $(".xuanxiang").removeClass("avtive");
    var a = $(this).text();
    $(".xialai").html(a);
    var b = $(this).attr("val");
    $(".xialai").attr('val',b)
})
</script>
@endsection