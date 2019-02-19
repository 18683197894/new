/**
 * Created by Administrator on 2018\12\13 0013.
 */


$(document).ready(function(){
    $("#map .BMap_cpyCtrl").on(
        $("#map .BMap_cpyCtrl").css("display","none")
    )
});
$(function () {
    $('.shutter').shutter({
        isAutoPlay: true, // 是否自动播放
        playInterval: 2000, // 自动播放时间
        curDisplay: 3, // 当前显示页
        fullPage: false // 是否全屏展示
    });
});

$(".pic ul li").mouseover(function(){
    $(this).stop(true).animate({width:"600px"},1000).siblings().stop(true).animate({width:"100px"},500);
});
$(".pic ul li").click(function(){
    $(this).stop(true).animate({width:"600px"},1000).siblings().stop(true).animate({width:"100px"},500);
});
//$(function () {
//    if ((screen.width <= 982)) {
//        $(".pic ul li").mouseover(function(){
//            $(this).stop(true).animate({width:"300px"},1000).siblings().stop(true).animate({width:"100px"},500);
//        });
//    }else{
//
//    }
//});


$(".Leaving a").click(function(){
    var reg= /^[\u4e00-\u9fa5\s]+$/; //中文姓名验证
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //电话验证
    var username = $("#name").val();   //  获取姓名
    var Telephone = $("#Telephone").val();  //  获取电话号码
    var Developers = $("#Developers");  //获取开发商
    var Project =$("#Project");  //获取项目
    if(!($('#name').val()=='')){
        if(reg.test(username)){
            if(RegCellPhone.test(Telephone)){
                if(!(Project.val()=='')){
                    if(!(Developers.val()=='')){
                        $.ajax('/index-message',{
                            type : 'post',
                            data : {type:1,name:username,phone:Telephone,developers:Developers.val(),project:Project.val(),_token:$('meta[name="csrf-token"]').attr('content')},
                            success : function(res)
                            {
                                res = $.parseJSON(res);
                                if(res.code == 200)
                                {
                                    alert('留言成功');
                                    $("#name").val('');
                                    $("#Telephone").val('');
                                    $("#Developers").val('');
                                    $("#Project").val('');
                                }else
                                {
                                    alert('留言失败');
                                }
                            },
                            error : function(error)
                            {
                                alert('留言失败');
                            }
                        })
                        //提交
                    }else{
                        $("#Developers").addClass("avtive");
                        $("#Developers").attr('placeholder','请输入公司名称');
                    }
                }else{
                    $("#Project").addClass("avtive");
                    $("#Project").attr('placeholder','请输入项目名称');
                }
            }else{
                $("#Telephone").addClass("avtive");
                $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
            }
        }else{
            $(" #name").val("");
            $("#name").addClass("avtive");
            $("#name").attr('placeholder','请输入您的中文姓名');
        }
    }else{
        $("#name").addClass("avtive");
        $("#name").attr('placeholder','姓名不能为空');
    }
});
$(".Leaving .Project").click(function(){
    $(".Leaving .Project").eq($(this).index()).removeClass("avtive");
});