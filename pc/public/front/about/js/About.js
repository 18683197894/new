/**
 * Created by Administrator on 2019\4\19 0019.
 */



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
            
            $.ajax('/about-message-send',{
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

$(".Collect .Button").click(function(){
    var reg= /^[\u4e00-\u9fa5\s]+$/; //中文姓名验证
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //电话验证
    var Em = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;//验证邮箱
    var username = $("#Name").val();   //  获取姓名
    var Telephone = $("#Telephone").val();  //  获取电话号码
    var Email1 = $("#Email").val();  //获取邮箱
    var Te = $("#textarea").val().length;
    var Send = $("#Send").val(); //获取输入的验证码
    if(!($('#Name').val()=='')){
        if(reg.test(username)){
            if(RegCellPhone.test(Telephone)){
                if(Email1!== ''){
                    if(Em.test(Email1)){
                        if(Te == 0){
                            $("#textarea").attr('placeholder','请留言');
                        }else{
                            if(Send!== ''){
                              
                                $.ajax('/about-message',{
                                    type : 'post',
                                    data : {send:Send,type:2,name:username,phone:Telephone,email:Email1,content:$("#textarea").val(),_token:$('meta[name="csrf-token"]').attr('content')},
                                    success : function(res)
                                    {
                                        res = $.parseJSON(res);
                                        if(res.code == 200)
                                        {
                                            alert('留言成功');
                                            $("#Name").val('');
                                            $("#Telephone").val('');
                                            $("#Email").val('');
                                            $("#textarea").val('');
                                            $("#Send").val('');
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
                                $("#Send").val("");
                                $("#Send").addClass("avtive");
                                $("#Send").attr('placeholder','请输入验证码');

                            }
                            

                        }
                    }else{
                        $("#Email").val("");
                        $("#Email").attr('placeholder','邮箱格式不正确！请重新输入');
                    }
                }else{
                    $("#Email").attr('placeholder','请输入电子邮箱');
                }

            }else{
                $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
            }
        }else{
            $("#Name").val("");
            $("#Name").attr('placeholder','请输入您的中文姓名');
        }
    }else{
        $("#Name").attr('placeholder','用户名不能为空');
    }
});
$("#Name").click(function(){
    $("#Name").attr('placeholder','');
});
$("#Telephone").click(function(){
    $("#Telephone").attr('placeholder','');
});
$("#Email").click(function(){
    $("#Email").attr('placeholder','');
});
$("#textarea").click(function(){
    $("#textarea").attr('placeholder','');
});
$("#Send").click(function(){
    $("#Send").attr('placeholder','');
});