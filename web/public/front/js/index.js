/**
 * Created by Administrator on 2019/1/10.
 */



$(".YanZ .Send").click(function(){
    var Call = /^(1)([0-9]{10})?$/;  //电话验证
    var Tele = $("#Contact").val();  //  获取电话号码
    if(Call.test(Tele)){
        //判断是否包含avtive样式
        if($(".YanZ .Send").hasClass("avtive")){
            //不可重复点击
        }else{
            function countime(wait) {
                function time() {
                    if (wait == 0) {
                        //倒计时完成以后进行操作
                    } else {
                        $(".YanZ .Send").show().text("请" + wait + "秒后点击获取");//显示倒计时数字
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
                        $(".YanZ .Send").addClass("avtive");
                            countime(60);
                            setTimeout(function(){
                            $(".YanZ .Send").removeClass("avtive");
                            $(".YanZ .Send").show().text("点击发送短信验证码");
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
        $("#Contact").val("");
        $("#Contact").addClass("avtive");
        $("#Contact").attr('placeholder','请输入正确的11位数电话号码');
    }

});

$(".Make_i .Submit").click(function(){
    var Project= $("#Project").val();
    var Company= $("#Company").val();
    var Name= $("#Name").val();
    var Contact= $("#Contact").val();
    var ChName = /^[\u4e00-\u9fa5\s]+$/; //验证中文姓名
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //验证电话
    var Send = $("#Send").val(); //获取输入的验证码
    if(Project !== ""){
        if(Company !== ""){
            if(Name !==""){
                if(ChName.test(Name)){
                    if(Contact !==""){
                        if(RegCellPhone.test(Contact)){
                            if(Send !==""){
                                $.ajax('/index-message',{
                                    type : 'post',
                                    data : {type:1,send:Send,name:Name,phone:Contact,developers:Company,project:Project,_token:$('meta[name="csrf-token"]').attr('content')},
                                    success : function(res)
                                    {
                                        res = $.parseJSON(res);
                                        if(res.code == 200)
                                        {
                                            alert('留言成功');
                                            $("#Name").val('');
                                            $("#Project").val('');
                                            $("#Company").val('');
                                            $("#Contact").val('');
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
                                        alert('留言失败');
                                    }
                                 })
                           
                            }else{
                                //请输入验证码
                                $("#Send").val("");
                                $("#Send").addClass("avtive");
                                $("#Send").attr('placeholder','请输入验证码');
                            }

                        }else{
                            $("#Contact").val("");
                            $("#Contact").addClass("avtive");
                            $("#Contact").attr("placeholder","请输入您的11位有效电话号码");
                        }
                }else{
                        $("#Contact").addClass("avtive");
                        $("#Contact").attr("placeholder","请输入您的联系方式");
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
        }else{
            $("#Company").addClass("avtive");
            $("#Company").attr("placeholder","请输入公司名称");
        }
    }else{
        $("#Project").addClass("avtive");
        $("#Project").attr("placeholder","请输入项目名称");
    }
});
$(".Make_i input").click(function(){
    $(this).removeClass("avtive");
});