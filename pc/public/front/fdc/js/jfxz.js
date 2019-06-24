/**
 * Created by Administrator on 2019\6\24 0024.
 */



var swiper = new Swiper('.swiper-container',{
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    autoplay : 3000,
    speed:300,
    loop: true,
    autoplayDisableOnInteraction : false
});


var Num = 0;
function timedMsg() {
    $(".fangxiaotu a").click(function(){
        Num =$(this).index();
        var Imgsrc = $(this).find("img").attr("src");    //获取图片地址
        $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        $(".fangxiaotu a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    $(".fangxiaotu a").each(function(){
        Shu =$(this).index();
    });
    $(".xiaotu .fl").click(function(){
        Num = Num-1;
        if( Num<0 ){
            Num = Shu;
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }else{
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }
    });
    $(".xiaotu .fr").click(function(){
        Num = Num+1;
        if( Num>Shu ){
            Num = 0;
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }else{
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }
    });
    $(function(){
        setInterval(dingshi,5000);
    });
    function dingshi(ds){
        Num++;
        if( Num>Shu ){
            Num = 0;
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }else{
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }
        if( Num<0 ){
            Num = 0;
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }else{
            $(".fangxiaotu a").removeClass("avtive");
            $(".fangxiaotu a").eq(Num).addClass("avtive");
            var Imgsrc = $(".fangxiaotu a").eq(Num).find("img").attr("src");    //获取图片地址
            $(".tupian img").attr("src",Imgsrc);   //对应地址替换
        }
    }
}timedMsg();

$(".Yanzhan .Yz").click(function(){
    $(".Yanzhan .Yz").removeClass("avtive");
});

$(".Introduce .yuyue").click(function(){
    $(".shadow").addClass("avtive");
    $(".Collect").addClass("avtive");
});
$(".guanbi").click(function(){
    $(".shadow").removeClass("avtive");
    $(".Collect").removeClass("avtive");
});



$(".Wanke_Xinx .Fs").click(function(){
    var Call = /^(1)([0-9]{10})?$/;  //电话验证
    var Tele = $("#Telephone").val();  //  获取电话号码
    if(Call.test(Tele)){
        //判断是否包含avtive样式
        if($(".Wanke_Xinx .Fs").hasClass("avtive")){
            //不可重复点击
        }else{
            $(".Wanke_Xinx .Fs").addClass("avtive");
            function countime(wait) {
                function time() {
                    if (wait == 0) {
                        //倒计时完成以后进行操作
                    } else {
                        $(".Wanke_Xinx .Fs").show().text("请" + wait + "秒后点击获取");//显示倒计时数字
                        wait--;
                        setTimeout(function () {
                            time();
                        }, 1000)
                    }
                }
                time();
            }
            $.ajax('/project/message-send',{
            'type':'post',
            data : {_token:$('meta[name="csrf-token"]').attr('content'),phone:Tele},
            success : function(res)
            {   
                res = $.parseJSON(res);
                if(res.code == 200)
                {
                    countime(60);
                    setTimeout(function(){
                            $(".Wanke_Xinx .Fs").removeClass("avtive");
                            $(".Wanke_Xinx .Fs").show().text("点击发送短信验证码");
                        },
                    60000);
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
        //在这下面写ajax发送验证码请求

    }else{
        $("#Telephone").val("");
        $("#Telephone").addClass("avtive");
        $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
    }

});

$(".Wanke_Xinx .Tijiao").click(function(){
    var reg= /^[\u4e00-\u9fa5\s]+$/; //中文姓名验证
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //电话验证
    var Der= /^[\u4e00-\u9fa5]{2,12}$/; //验证2-12个汉字
    var username = $("#name").val();   //  获取姓名
    var Telephone = $("#Telephone").val();  //  获取电话号码
    var year = $("#year").val();  //获取年份
    var month = $("#month").val();  //获取月份
    var days = $("#days").val();  //获取日
    var time = $("#time").val();  //获取时间
    var Intention = $("#Intention").val();  //获取时间
    var Riqi = year+'-'+month+'-'+days
    var Send = $("#Send").val(); //获取输入的验证码
    if(!($('#name').val()=='')){
        if(reg.test(username)){
            if(RegCellPhone.test(Telephone)){
                if(!($('#year').val()=='')){
                    if(!($('#month').val()=='')){
                        if(!($('#days').val()=='')){
                            if(!($('#time').val()=='')){
                                if(!($('#Intention').val()=='')){
                                    //在这里面做验证码判断
                                    if(!Send==''){
                                        $.ajax('/project-message',{
                                           type : 'post',
                                           data : {send:Send,name:username,phone:Telephone,time:Riqi,time_re:time,project:'万贯·金府星座',huxing:Intention,_token:$('meta[name="csrf-token"]').attr('content')},
                                           success : function(res)
                                           {
                                               res = $.parseJSON(res);
                                               if(res.code == 200)
                                               {
                                                   alert('留言成功');
                                                   window.location.reload();
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
                                    $("#Intention").addClass("avtive");
                                    $("#Intention option:first").prop("selected", 'selected');
                                }
                            }else{
                                $("#time").addClass("avtive");
                                $("#time option:first").prop("selected", 'selected');
                            }
                        }else{
                            $("#days").addClass("avtive");
                            $("#days option:first").prop("selected", 'selected');
                        }
                    }else{
                        $("#month").addClass("avtive");
                        $("#month option:first").prop("selected", 'selected');
                    }
                }else{
                    $("#year").addClass("avtive");
                    $("#year option:first").prop("selected", 'selected');
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
$(".Wanke_Xinx .WankeInput").click(function(){
    $(".Wanke_Xinx .WankeInput").removeClass("avtive");
});
$(".Data select").click(function(){
    $(".Data select").removeClass("avtive");
});
$(".Wanke_Xinx .Select").click(function(){
    $(".Wanke_Xinx .Select").removeClass("avtive");
});
$(".Yanzhan .Yz").click(function(){
    $(".Yanzhan .Yz").removeClass("avtive");
});
