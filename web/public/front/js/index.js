/**
 * Created by Administrator on 2019/1/10.
 */


$(".Make_i .Submit").click(function(){
    var Project= $("#Project").val();
    var Company= $("#Company").val();
    var Name= $("#Name").val();
    var Contact= $("#Contact").val();

    var ChName = /^[\u4e00-\u9fa5\s]+$/; //验证中文姓名
    var RegCellPhone = /^(1)([0-9]{10})?$/;  //验证电话
    if(Project !== ""){
        if(Company !== ""){
            if(Name !==""){
                if(ChName.test(Name)){
                    if(Contact !==""){
                        if(RegCellPhone.test(Contact)){
                            $.ajax('/index-message',{
                                type : 'post',
                                data : {type:1,name:Name,phone:Contact,developers:Company,project:Project,_token:$('meta[name="csrf-token"]').attr('content')},
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