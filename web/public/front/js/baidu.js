/**
 * Created by Administrator on 2019\5\20 0020.
 */
$(".yanz .Click_a").click(function(){
    var Call = /^(1)([0-9]{10})?$/;  //电话验证
    var Tele = $("#Tep").val();  //  获取电话号码
    if(Call.test(Tele)){
        //判断是否包含avtive样式
        if($(".yanz .Click_a").hasClass("avtive")){
            //不可重复点击
        }else{
            function countime(wait) {
                function time() {
                    if (wait == 0) {
                        //倒计时完成以后进行操作
                    } else {
                        $(".yanz .Click_a").show().text("剩余" + wait + "秒");//显示倒计时数字
                        wait--;
                        setTimeout(function () {
                            time();
                        }, 1000)
                    }
                }
            time();
            }
            $.ajax({
                url: '/design-message-send',
                type:'post',
                data : {_token:$('meta[name="csrf-token"]').attr('content'),phone:Tele},
                success : function(res)
                {   
                    res = $.parseJSON(res);
                    if(res.code == 200)
                    {
                        $(".yanz .Click_a").addClass("avtive");
                        countime(60);
                        setTimeout(function(){
                            $(".yanz .Click_a").removeClass("avtive");
                            $(".yanz .Click_a").show().text("点击获取验证码");
                        },60000);
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
        $("#Tep").val("");
        $("#Tep").addClass("avtive");
        $("#Tep").attr("placeholder","请输入您的11位有效电话号码");
    }

});

$(".yanz .Submit").click(function(){
    var ChName = /^[\u4e00-\u9fa5\s]+$/; //验证中文姓名
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //验证电话
    var Name= $("#Name").val();
    var Tep= $("#Tep").val();
    var Send = $("#Send").val(); //获取输入的验证码
    if(Name !==""){
        if(ChName.test(Name)){
            if(Tep !==""){
                if(RegCellPhone.test(Tep)){
                    if(Send !==""){
                        $.ajax({
                            url : '/design-message',
                            type : 'post',
                            data : {type:3,send:Send,name:Name,phone:Tep,_token:$('meta[name="csrf-token"]').attr('content')},
                            success : function(res)
                            {
                                res = $.parseJSON(res);
                                if(res.code == 200)
                                {
                                    alert('留言成功');
                                    $("#Name").val('');
                                    $("#Send").val('');
                                    $("#Tep").val('');
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
                                alert('留言失败');
                            }
                         });
                    }else{
                        //请输入验证码
                        $("#Send").val("");
                        $("#Send").addClass("avtive");
                        $("#Send").attr('placeholder','请输入验证码');
                    }
                }else{
                    $("#Tep").val("");
                    $("#Tep").addClass("avtive");
                    $("#Tep").attr("placeholder","请输入您的11位有效电话号码");
                }
            }else{
                $("#Tep").addClass("avtive");
                $("#Tep").attr("placeholder","请输入您的电话号码");
            }
        }else{
            $("#Name").val("");
            $("#Name").addClass("avtive");
            $("#Name").attr("placeholder","请输入您的中文姓名");
        }
    }else{
        $("#Name").addClass("avtive");
        $("#Name").attr("placeholder","请输入您的姓名");
    }
})