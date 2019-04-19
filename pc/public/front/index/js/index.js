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


$(".TeYz .Send").click(function(){
    var Call = /^(1)([0-9]{10})?$/;  //电话验证
    var Tele = $("#Telephone").val();  //  获取电话号码
    if(Call.test(Tele)){
        //判断是否包含avtive样式
        if($(".TeYz .Send").hasClass("avtive")){
            //不可重复点击
        }else{
            function countime(wait) {
                function time() {
                    if (wait == 0) {
                        //倒计时完成以后进行操作
                    } else {
                        $(".TeYz .Send").show().text("请" + wait + "秒后点击获取");//显示倒计时数字
                        wait--;
                        setTimeout(function () {
                            time();
                        }, 1000)
                    }
                }
                time();
            }
           $.ajax('/index-message-send',{
            'type':'post',
            data : {_token:$('meta[name="csrf-token"]').attr('content'),phone:Tele},
            success : function(res)
            {   
                res = $.parseJSON(res);
                if(res.code == 200)
                {
                    $(".TeYz .Send").addClass("avtive");
                    countime(60);
                    setTimeout(function(){
                    $(".TeYz .Send").removeClass("avtive");
                    $(".TeYz .Send").show().text("点击发送短信验证码");
                    },100000);
                }else if(res.code == 401)
                {  
                    alert(res.info)
                }else
                {
                    alert('发送失败!');
                }
            },
            error : function(res)
            {
                alert('发送失败');
            }
           });
        }
        

    }else{
        $("#Telephone").val("");
        $("#Telephone").addClass("avtive");
        $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
    }

});

$(".Leaving .Submission").click(function(){
    var reg= /^[\u4e00-\u9fa5\s]+$/; //中文姓名验证
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //电话验证
    var Der= /^[\u4e00-\u9fa5]{2,12}$/; //验证2-12个汉字
    var username = $("#name").val();   //  获取姓名
    var Telephone = $("#Telephone").val();  //  获取电话号码
    var Developers = $("#Developers").val();  //获取开发商
    var Project = $("#Project").val(); //获取项目
    var Send = $("#Send").val(); //获取输入的验证码
    if(!($('#name').val()=='')){
        if(reg.test(username)){
            if(RegCellPhone.test(Telephone)){
                if(!(Project=='')){
                    if(Der.test(Project)){
                        if(!(Developers=='')){
                            if(Der.test(Developers)){
                              //在这里面做验证码判断
                             
                                if(!Send==''){
                                        
                                    $.ajax('/index-message',{
                                       type : 'post',
                                       data : {type:1,send:Send,name:username,phone:Telephone,developers:Developers,project:Project,_token:$('meta[name="csrf-token"]').attr('content')},
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
                                               $("#Send").val('');
                                           }else if(res.code == 401)
                                           {  
                                                $("#Send").val("");
                                                $("#Send").addClass("avtive");
                                                $("#Send").attr('placeholder',res.info);
                                           }else
                                           {
                                                alert('留言失败!');
                                           }
                                       },
                                       error : function(error)
                                       {
                                           alert('留言失败!');
                                       }
                                    })       
                                     
                                }else{
                                    //验证码判断是否为空
                                    $("#Send").val("");
                                    $("#Send").addClass("avtive");
                                    $("#Send").attr('placeholder','请输入验证码');
                                }
                               
                            }else{
                                $("#Developers").val("");
                                $("#Developers").addClass("avtive");
                                $("#Developers").attr('placeholder','请输入2-12位汉字名称');
                            }
                        }else{
                            $("#Developers").val("");
                            $("#Developers").addClass("avtive");
                            $("#Developers").attr('placeholder','请输入开发商名称');
                        }
                    }else{
                        $("#Project").val("");
                        $("#Project").addClass("avtive");
                        $("#Project").attr('placeholder','请输入2-12位汉字项目名称');
                }
                }else{
                    $("#Project").val("");
                    $("#Project").addClass("avtive");
                    $("#Project").attr('placeholder','请输入项目名称');
                }
            }else{
                $("#Telephone").val("");
                $("#Telephone").addClass("avtive");
                $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
            }
        }else{
            $("#name").val("");
            $("#name").addClass("avtive");
            $("#name").attr('placeholder','请输入您的中文姓名');
        }
    }else{
        $("#name").addClass("avtive");
        $("#name").attr('placeholder','用户名不能为空');
    }
});
$(".Leaving .Project").click(function(){
    $(".Leaving .Project").eq($(this).index()).removeClass("avtive");
});
$(".Leaving .TeYzSr").click(function(){
    $(".Leaving .TeYzSr").removeClass("avtive");
});