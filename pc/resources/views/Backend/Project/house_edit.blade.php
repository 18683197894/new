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
</style>
@endsection

@section('content')
<div class="x-body">
	<blockquote class="layui-elem-quote">工程装修进度</blockquote>

<!--       <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach" style="margin-bottom:4px"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div> -->

      <table class="layui-table">
        <thead>
          <tr>
            <th>序号</th>
            <th>阶段</th>
            <th>事项</th>
            <th>施工细节</th>
            <th>开工时间</th>
            <th>结束时间</th>
            <th>状态</th>
            <th>责任人</th>
            <th>验收人</th>
            <th>操作</th>
        </thead>

        <tbody>
          
          <tr findex="1">
            <td name="serial_number">1</td>
            <td rowspan='22' name="stage">基础阶段</td>
            <td name="matter">开工交底</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" placeholder="开始日" value="{{ isset($house_schedule[0]->start)?$house_schedule[0]->start:'' }}" name="start" id="start1">
            </td>
            <td>
              <input class="layui-input" placeholder="截止日" value="{{ isset($house_schedule[0]->end)? $house_schedule[0]->end :'' }}" name="end" id="end1">
            </td>
            <td>
              @if(isset($house_schedule[0]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[0]->liable)?$house_schedule[0]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[0]->check)?$house_schedule[0]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr fid="1">
            <td name="serial_number">2</td>
            <td name="matter">正式施工</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[1]->start)?$house_schedule[1]->start:'' }}" placeholder="开始日" name="start" id="start2">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[1]->end)? $house_schedule[1]->end :'' }}" placeholder="截止日" name="end" id="end2">
            </td>
            <td>
              @if(isset($house_schedule[1]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[1]->liable)?$house_schedule[1]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[1]->check)?$house_schedule[1]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr index="3" fid="1">
            <td name="serial_number">3</td>
            <td rowspan="3" name="matter">拆除开挖</td>
            <td name="details">拆墙</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[2]->start)?$house_schedule[2]->start:'' }}" placeholder="开始日" name="start" id="start3">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[2]->end)? $house_schedule[2]->end :'' }}" placeholder="截止日" name="end" id="end3">
            </td>
            <td>
              @if(isset($house_schedule[2]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[2]->liable)?$house_schedule[2]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[2]->check)?$house_schedule[2]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="3" fid="1">
            <td name="serial_number">4</td>
            <td name="details">铲铁皮</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[3]->start)?$house_schedule[3]->start:'' }}" placeholder="开始日" name="start" id="start4">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[3]->end)? $house_schedule[3]->end :'' }}" placeholder="截止日" name="end" id="end4">
            </td>
            <td>
              @if(isset($house_schedule[3]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[3]->liable)?$house_schedule[3]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[3]->check)?$house_schedule[3]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="3" fid="1">
            <td name="serial_number">5</td>
            <td name="details">水电开槽</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[4]->start)?$house_schedule[4]->start:'' }}" placeholder="开始日" name="start" id="start5">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[4]->end)? $house_schedule[4]->end :'' }}" placeholder="截止日" name="end" id="end5">
            </td>
            <td>
              @if(isset($house_schedule[4]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[4]->liable)?$house_schedule[4]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[4]->check)?$house_schedule[4]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="6" fid="1">
            <td name="serial_number">6</td>
            <td rowspan="3" name="matter">水电改造</td>
            <td name="details">厨房改造</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[5]->start)?$house_schedule[5]->start:'' }}" placeholder="开始日" name="start" id="start6">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[5]->end)? $house_schedule[5]->end :'' }}" placeholder="截止日" name="end" id="end6">
            </td>
            <td>
              @if(isset($house_schedule[5]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[5]->liable)?$house_schedule[5]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[5]->check)?$house_schedule[5]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="6" fid="1">
            <td name="serial_number">7</td>
            <td name="details">卫生间水路改造</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[6]->start)?$house_schedule[6]->start:'' }}" placeholder="开始日" name="start" id="start7">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[6]->end)? $house_schedule[6]->end :'' }}" placeholder="截止日" name="end" id="end7">
            </td>
            <td>
              @if(isset($house_schedule[6]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[6]->liable)?$house_schedule[6]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[6]->check)?$house_schedule[6]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="6" fid="1">
            <td name="serial_number">8</td>
            <td name="details">生活阳台/分区水路改造</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[7]->start)?$house_schedule[7]->start:'' }}" placeholder="开始日" name="start" id="start8">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[7]->end)? $house_schedule[7]->end :'' }}" placeholder="截止日" name="end" id="end8">
            </td>
            <td>
              @if(isset($house_schedule[7]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[7]->liable)?$house_schedule[7]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[7]->check)?$house_schedule[7]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr index="9" fid="1">
            <td name="serial_number">9</td>
            <td rowspan="3" name="matter">电路改造</td>
            <td name="details">线路改造</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[8]->start)?$house_schedule[8]->start:'' }}" placeholder="开始日" name="start" id="start9">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[8]->end)? $house_schedule[8]->end :'' }}" placeholder="截止日" name="end" id="end9">
            </td>
            <td>
              @if(isset($house_schedule[8]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[8]->liable)?$house_schedule[8]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[8]->check)?$house_schedule[8]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="9" fid="1">
            <td name="serial_number">10</td>
            <td name="details">开关调整</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[9]->start)?$house_schedule[9]->start:'' }}" placeholder="开始日" name="start" id="start10">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[9]->end)? $house_schedule[9]->end :'' }}" placeholder="截止日" name="end" id="end10">
            </td>
            <td>
              @if(isset($house_schedule[9]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[9]->liable)?$house_schedule[9]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[9]->check)?$house_schedule[9]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="9" fid="1">
            <td name="serial_number">11</td>
            <td name="details">插座调整</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[10]->start)?$house_schedule[10]->start:'' }}" placeholder="开始日" name="start" id="start11">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[10]->end)? $house_schedule[10]->end :'' }}" placeholder="截止日" name="end" id="end11">
            </td>
            <td>
              @if(isset($house_schedule[10]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[10]->liable)?$house_schedule[10]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[10]->check)?$house_schedule[10]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="12" fid="1">
            <td name="serial_number">12</td>
            <td rowspan="3" name="matter">造型施工</td>
            <td name="details">吊顶</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[11]->start)?$house_schedule[11]->start:'' }}" placeholder="开始日" name="start" id="start12">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[11]->end)? $house_schedule[11]->end :'' }}" placeholder="截止日" name="end" id="end12">
            </td>
            <td>
              @if(isset($house_schedule[11]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[11]->liable)?$house_schedule[11]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[11]->check)?$house_schedule[11]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="12" fid="1">
            <td name="serial_number">13</td>
            <td name="details">墙面/电视墙</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[12]->start)?$house_schedule[12]->start:'' }}" placeholder="开始日" name="start" id="start13">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[12]->end)? $house_schedule[12]->end :'' }}" placeholder="截止日" name="end" id="end13">
            </td>
            <td>
              @if(isset($house_schedule[12]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[12]->liable)?$house_schedule[12]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[12]->check)?$house_schedule[12]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="12" fid="1">
            <td name="serial_number">14</td>
            <td name="details">其他部分</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[13]->start)?$house_schedule[13]->start:'' }}" placeholder="开始日" name="start" id="start14">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[13]->end)? $house_schedule[13]->end :'' }}" placeholder="截止日" name="end" id="end14">
            </td>
            <td>
              @if(isset($house_schedule[13]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[13]->liable)?$house_schedule[13]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[13]->check)?$house_schedule[13]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>



          <tr index="15" fid="1">
            <td name="serial_number">15</td>
            <td rowspan="3" name="matter">场面施工</td>
            <td name="details">回填</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[14]->start)?$house_schedule[14]->start:'' }}" placeholder="开始日" name="start" id="start15">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[14]->end)? $house_schedule[14]->end :'' }}" placeholder="截止日" name="end" id="end15">
            </td>
            <td>
              @if(isset($house_schedule[14]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[14]->liable)?$house_schedule[14]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[14]->check)?$house_schedule[14]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="15" fid="1">
            <td name="serial_number">16</td>
            <td name="details">防水</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[15]->start)?$house_schedule[15]->start:'' }}" placeholder="开始日" name="start" id="start16">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[15]->end)? $house_schedule[15]->end :'' }}" placeholder="截止日" name="end" id="end16">
            </td>
            <td>
              @if(isset($house_schedule[15]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[15]->liable)?$house_schedule[15]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[15]->check)?$house_schedule[15]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="15" fid="1">
            <td name="serial_number">17</td>
            <td name="details">贴砖</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[16]->start)?$house_schedule[16]->start:'' }}" placeholder="开始日" name="start" id="start17">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[16]->end)? $house_schedule[16]->end :'' }}" placeholder="截止日" name="end" id="end17">
            </td>
            <td>
              @if(isset($house_schedule[16]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[16]->liable)?$house_schedule[16]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[16]->check)?$house_schedule[16]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="18" fid="1">
            <td name="serial_number">18</td>
            <td rowspan="2" name="matter">墙面施工</td>
            <td name="details">墙面处理</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[17]->start)?$house_schedule[17]->start:'' }}" placeholder="开始日" name="start" id="start18">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[17]->end)? $house_schedule[17]->end :'' }}" placeholder="截止日" name="end" id="end18">
            </td>
            <td>
              @if(isset($house_schedule[17]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[17]->liable)?$house_schedule[17]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[17]->check)?$house_schedule[17]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="18" fid="1">
            <td name="serial_number">19</td>
            <td name="details">墙面刷漆/壁纸</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[18]->start)?$house_schedule[18]->start:'' }}" placeholder="开始日" name="start" id="start19">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[18]->end)? $house_schedule[18]->end :'' }}" placeholder="截止日" name="end" id="end19">
            </td>
            <td>
              @if(isset($house_schedule[18]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[18]->liable)?$house_schedule[18]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[18]->check)?$house_schedule[18]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="20" fid="1">
            <td name="serial_number">20</td>
            <td rowspan="3" name="matter">初步检查</td>
            <td name="details">检查水电</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[19]->start)?$house_schedule[19]->start:'' }}" placeholder="开始日" name="start" id="start20">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[19]->end)? $house_schedule[19]->end :'' }}" placeholder="截止日" name="end" id="end20">
            </td>
            <td>
              @if(isset($house_schedule[19]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[19]->liable)?$house_schedule[19]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[19]->check)?$house_schedule[19]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="20" fid="1">
            <td name="serial_number">21</td>
            <td name="details">检查墙面/砖/防水</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[20]->start)?$house_schedule[20]->start:'' }}" placeholder="开始日" name="start" id="start21">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[20]->end)? $house_schedule[20]->end :'' }}" placeholder="截止日" name="end" id="end21">
            </td>
            <td>
              @if(isset($house_schedule[20]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[20]->liable)?$house_schedule[20]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[20]->check)?$house_schedule[20]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="20" fid="1">
            <td name="serial_number">22</td>
            <td name="details">初步卫生打理</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[21]->start)?$house_schedule[21]->start:'' }}" placeholder="开始日" name="start" id="start22">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[21]->end)? $house_schedule[21]->end :'' }}" placeholder="截止日" name="end" id="end22">
            </td>
            <td>
              @if(isset($house_schedule[21]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[21]->liable)?$house_schedule[21]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[21]->check)?$house_schedule[21]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
<!-- **************************************************************** -->
<!-- **************************************************************** -->
<!-- **************************************************************** -->
          <tr index="23" findex="23">
            <td name="serial_number">23</td>
            <td rowspan='14' name="stage">精细阶段</td>
            <td rowspan="3" name="matter">门窗安装</td>
            <td name="details">窗户安装</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[22]->start)?$house_schedule[22]->start:'' }}" placeholder="开始日" name="start" id="start23">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[22]->end)? $house_schedule[22]->end :'' }}" placeholder="截止日" name="end" id="end23">
            </td>
            <td>
              @if(isset($house_schedule[22]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[22]->liable)?$house_schedule[22]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[22]->check)?$house_schedule[22]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="23" fid="23">
            <td name="serial_number">24</td>
            <td name="details">门安装</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[23]->start)?$house_schedule[23]->start:'' }}" placeholder="开始日" name="start" id="start24">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[23]->end)? $house_schedule[23]->end :'' }}" placeholder="截止日" name="end" id="end24">
            </td>
            <td>
              @if(isset($house_schedule[23]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[23]->liable)?$house_schedule[23]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[23]->check)?$house_schedule[23]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="23" fid="23">
            <td name="serial_number">25</td>
            <td name="details">缝隙处理</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[24]->start)?$house_schedule[24]->start:'' }}" placeholder="开始日" name="start" id="start25">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[24]->end)? $house_schedule[24]->end :'' }}" placeholder="截止日" name="end" id="end25">
            </td>
            <td>
              @if(isset($house_schedule[24]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[24]->liable)?$house_schedule[24]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[24]->check)?$house_schedule[24]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="26" fid="23">
            <td name="serial_number">26</td>
            <td rowspan="2" name="matter">厨卫安装</td>
            <td name="details">厨房橱柜等</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[25]->start)?$house_schedule[25]->start:'' }}" placeholder="开始日" name="start" id="start26">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[25]->end)? $house_schedule[25]->end :'' }}" placeholder="截止日" name="end" id="end26">
            </td>
            <td>
              @if(isset($house_schedule[25]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[25]->liable)?$house_schedule[25]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[25]->check)?$house_schedule[25]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="26" fid="23">
            <td name="serial_number">27</td>
            <td name="details">卫生间安装</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[26]->start)?$house_schedule[26]->start:'' }}" placeholder="开始日" name="start" id="start27">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[26]->end)? $house_schedule[26]->end :'' }}" placeholder="截止日" name="end" id="end27">
            </td>
            <td>
              @if(isset($house_schedule[26]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[26]->liable)?$house_schedule[26]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[26]->check)?$house_schedule[26]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>


          <tr index="28" fid="23">
            <td name="serial_number">28</td>
            <td rowspan="3" name="matter">灯具安装</td>
            <td name="details">灯具进场</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[27]->start)?$house_schedule[27]->start:'' }}" placeholder="开始日" name="start" id="start28">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[27]->end)? $house_schedule[27]->end :'' }}" placeholder="截止日" name="end" id="end28">
            </td>
            <td>
              @if(isset($house_schedule[27]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[27]->liable)?$house_schedule[27]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[27]->check)?$house_schedule[27]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="28" fid="23">
            <td name="serial_number">29</td>
            <td name="details">灯具安装</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[28]->start)?$house_schedule[28]->start:'' }}" placeholder="开始日" name="start" id="start29">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[28]->end)? $house_schedule[28]->end :'' }}" placeholder="截止日" name="end" id="end29">
            </td>
            <td>
              @if(isset($house_schedule[28]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[28]->liable)?$house_schedule[28]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[28]->check)?$house_schedule[28]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="28" fid="23">
            <td name="serial_number">30</td>
            <td name="details">灯具调试</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[29]->start)?$house_schedule[29]->start:'' }}" placeholder="开始日" name="start" id="start30">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[29]->end)? $house_schedule[29]->end :'' }}" placeholder="截止日" name="end" id="end30">
            </td>
            <td>
              @if(isset($house_schedule[29]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[29]->liable)?$house_schedule[29]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[29]->check)?$house_schedule[29]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr index="31" fid="23">
            <td name="serial_number">31</td>
            <td rowspan="3" name="matter">电器安装</td>
            <td name="details">电器进场</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[30]->start)?$house_schedule[30]->start:'' }}" placeholder="开始日" name="start" id="start31">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[30]->end)? $house_schedule[30]->end :'' }}" placeholder="截止日" name="end" id="end31">
            </td>
            <td>
              @if(isset($house_schedule[30]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[30]->liable)?$house_schedule[30]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[30]->check)?$house_schedule[30]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="31" fid="23">
            <td name="serial_number">32</td>
            <td name="details">电气安装</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[31]->start)?$house_schedule[31]->start:'' }}" placeholder="开始日" name="start" id="start32">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[31]->end)? $house_schedule[31]->end :'' }}" placeholder="截止日" name="end" id="end32">
            </td>
            <td>
              @if(isset($house_schedule[31]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[31]->liable)?$house_schedule[31]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[31]->check)?$house_schedule[31]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="31" fid="23">
            <td name="serial_number">33</td>
            <td name="details">电气调试</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[32]->start)?$house_schedule[32]->start:'' }}" placeholder="开始日" name="start" id="start33">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[32]->end)? $house_schedule[32]->end :'' }}" placeholder="截止日" name="end" id="end33">
            </td>
            <td>
              @if(isset($house_schedule[32]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[32]->liable)?$house_schedule[32]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[32]->check)?$house_schedule[32]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr index="34" fid="23">
            <td name="serial_number">34</td>
            <td rowspan="3" name="matter">家居安装</td>
            <td name="details">家居进场</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[33]->start)?$house_schedule[33]->start:'' }}" placeholder="开始日" name="start" id="start34">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[33]->end)? $house_schedule[33]->end :'' }}" placeholder="截止日" name="end" id="end34">
            </td>
            <td>
              @if(isset($house_schedule[33]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[33]->liable)?$house_schedule[33]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[33]->check)?$house_schedule[33]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="35" fid="23">
            <td name="serial_number">35</td>
            <td name="details">家具安装与摆放</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[34]->start)?$house_schedule[34]->start:'' }}" placeholder="开始日" name="start" id="start35">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[34]->end)? $house_schedule[34]->end :'' }}" placeholder="截止日" name="end" id="end35">
            </td>
            <td>
              @if(isset($house_schedule[34]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[34]->liable)?$house_schedule[34]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[34]->check)?$house_schedule[34]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr pid="35" fid="23">
            <td name="serial_number">36</td>
            <td name="details">家居检查</td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[35]->start)?$house_schedule[35]->start:'' }}" placeholder="开始日" name="start" id="start36">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[35]->end)? $house_schedule[35]->end :'' }}" placeholder="截止日" name="end" id="end36">
            </td>
            <td>
              @if(isset($house_schedule[35]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[35]->liable)?$house_schedule[35]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[35]->check)?$house_schedule[35]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

<!-- *************************************************************************************
************************************************************************************* -->

          <tr findex="37">
            <td name="serial_number">37</td>
            <td rowspan='4' name="stage">竣工阶段</td>
            <td name="matter">保洁</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[36]->start)?$house_schedule[36]->start:'' }}" placeholder="开始日" name="start" id="start37">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[36]->end)? $house_schedule[36]->end :'' }}" placeholder="截止日" name="end" id="end37">
            </td>
            <td>
              @if(isset($house_schedule[36]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[36]->liable)?$house_schedule[36]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[36]->check)?$house_schedule[36]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

          <tr fid="37">
            <td name="serial_number">38</td>
            <td name="matter">质量检查</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[37]->start)?$house_schedule[37]->start:'' }}" placeholder="开始日" name="start" id="start38">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[37]->end)? $house_schedule[37]->end :'' }}" placeholder="截止日" name="end" id="end38">
            </td>
            <td>
              @if(isset($house_schedule[37]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[37]->liable)?$house_schedule[37]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[37]->check)?$house_schedule[37]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr fid="37">
            <td name="serial_number">39</td>
            <td name="matter">参套检查</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[38]->start)?$house_schedule[38]->start:'' }}" placeholder="开始日" name="start" id="start39">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[38]->end)? $house_schedule[38]->end :'' }}" placeholder="截止日" name="end" id="end39">
            </td>
            <td>
              @if(isset($house_schedule[38]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[38]->liable)?$house_schedule[38]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[38]->check)?$house_schedule[38]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>
          <tr fid="37">
            <td name="serial_number">40</td>
            <td name="matter">确认验收</td>
            <td name="details"></td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[39]->start)?$house_schedule[39]->start:'' }}" placeholder="开始日" name="start" id="start40">
            </td>
            <td>
              <input class="layui-input" value="{{ isset($house_schedule[39]->end)? $house_schedule[39]->end :'' }}" placeholder="截止日" name="end" id="end40">
            </td>
            <td>
              @if(isset($house_schedule[39]))
              <button class="layui-btn layui-btn-sm layui-btn-normal">已完成</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger">未完成</button>
              @endif
            </td>
            <td>
              <input name="liable" value="{{ isset($house_schedule[39]->liable)?$house_schedule[39]->liable :'' }}" lay-verify="required" placeholder="责任人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
              <input name="check" value="{{ isset($house_schedule[39]->check)?$house_schedule[39]->check :'' }}"  lay-verify="required" placeholder="验收人" autocomplete="off" class="layui-input" type="text">
            </td>
            <td>
            <button class="layui-btn layui-btn-sm house_edit" lay-submit="" lay-filter="house_edit">提交</button>
            </td>
          </tr>

        </tbody>


      </table>

 

</div>
@endsection

@section('js')


<script type="text/javascript">
        $('.house_edit').on('click',function(){
          var tr = $(this).parents('tr');
          var serial_number = tr.find("td[name='serial_number']").html();
          var matter = tr.find("td[name='matter']").html();
          if(!matter)
          {
            var index = tr.attr('pid');
            matter = $("tr[index='"+index+"']").find("td[name='matter']").html();
          }
          
          var stage = tr.find("td[name='stage']").html();
          if(!stage)
          {
            var findex = tr.attr('fid');
            stage = $("tr[findex='"+findex+"']").find("td[name='stage']").html();
          }
          var details =  tr.find("td[name='details']").html();
          var start = tr.find("input[name='start']").val();
          var end = tr.find("input[name='end']").val();
          var liable =  tr.find("input[name='liable']").val();
          var check =  tr.find("input[name='check']").val();
          if(!start)
          {            
            layer.tips('不能为空', tr.find("input[name='start']"),{tips:[2,'red'],time:2000});
            return false;
          }

          if(!end)
          {
            layer.tips('不能为空', tr.find("input[name='end']"),{tips:[2,'red'],time:2000});
            return false;
          }
          if(!liable)
          {
            layer.tips('不能为空', tr.find("input[name='liable']"),{tips:[2,'red'],time:2000});
            return false;
          }
          if(!check)
          {
            layer.tips('不能为空', tr.find("input[name='check']"),{tips:[2,'red'],time:2000});
            return false;
          }
          var index = layer.load(2, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
          });
          $.ajax({
            url : "{{url('/backend/project/house-edit')}}",
            type : 'post',
            data : {serial_number:serial_number,matter:matter,stage:stage,details:details,start:start,end:end,liable:liable,check:check,house_id:'{{$house->id}}',_token:$("meta[name='csrf-token']").attr('content')},
            success : function(res)
            {
              res = $.parseJSON(res);
              layer.close(index);
              if(res.code == 200)
              {
                var but = tr.find('.layui-btn-danger');
                but.removeClass('layui-btn-danger');
                but.addClass('layui-btn-normal');
                but.html('已完成');
                layMsgOk(res.info);
              }else
              {
                layMsgError(res.info);
              }

            },
            error : function(error)
            {
              layer.close(index);
              layMsgError('操作失败');
            }
          });
        })

        layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start1' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end1' //指定元素
        });
        laydate.render({
          elem: '#start2' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end2' //指定元素
        });
        laydate.render({
          elem: '#start3' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end3' //指定元素
        });
        laydate.render({
          elem: '#start4' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end4' //指定元素
        });
        laydate.render({
          elem: '#start5' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end5' //指定元素
        });
        laydate.render({
          elem: '#start6' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end6' //指定元素
        });
        laydate.render({
          elem: '#start7' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end7' //指定元素
        });
        laydate.render({
          elem: '#start8' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end8' //指定元素
        });
        laydate.render({
          elem: '#start9' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end9' //指定元素
        });
        laydate.render({
          elem: '#start10' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end10' //指定元素
        });
        laydate.render({
          elem: '#start11' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end11' //指定元素
        });
        laydate.render({
          elem: '#start12' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end12' //指定元素
        });
        laydate.render({
          elem: '#start13' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end13' //指定元素
        });
        laydate.render({
          elem: '#start14' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end14' //指定元素
        });
                //执行一个laydate实例
        laydate.render({
          elem: '#start15' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end15' //指定元素
        });
        laydate.render({
          elem: '#start16' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end16' //指定元素
        });
        laydate.render({
          elem: '#start17' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end17' //指定元素
        });
        laydate.render({
          elem: '#start18' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end18' //指定元素
        });
        laydate.render({
          elem: '#start19' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end19' //指定元素
        });
        laydate.render({
          elem: '#start20' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end20' //指定元素
        });
        laydate.render({
          elem: '#start21' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end21' //指定元素
        });
        laydate.render({
          elem: '#start22' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end22' //指定元素
        });
        laydate.render({
          elem: '#start23' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end23' //指定元素
        });
        laydate.render({
          elem: '#start24' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end24' //指定元素
        });
        laydate.render({
          elem: '#start25' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end25' //指定元素
        });
        laydate.render({
          elem: '#start26' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end26' //指定元素
        });
        laydate.render({
          elem: '#start27' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end27' //指定元素
        });
        laydate.render({
          elem: '#start28' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end28' //指定元素
        });
                laydate.render({
          elem: '#start29' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end29' //指定元素
        });
        laydate.render({
          elem: '#start30' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end30' //指定元素
        });
        laydate.render({
          elem: '#start31' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end31' //指定元素
        });
        laydate.render({
          elem: '#start32' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end32' //指定元素
        });
        laydate.render({
          elem: '#start33' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end33' //指定元素
        });
        laydate.render({
          elem: '#start34' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end34' //指定元素
        });
        laydate.render({
          elem: '#start35' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end35' //指定元素
        });
        laydate.render({
          elem: '#start36' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end36' //指定元素
        });
        laydate.render({
          elem: '#start37' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end37' //指定元素
        });
        laydate.render({
          elem: '#start38' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end38' //指定元素
        });
        laydate.render({
          elem: '#start39' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end39' //指定元素
        });
        laydate.render({
          elem: '#start40' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end40' //指定元素
        });

      });
</script>

@endsection