/**
 * Created by Administrator on 2019\6\24 0024.
 */
$(".Daohang a").click(function(){
    $(".Daohang a").removeClass("avtive").eq($(this).index()).addClass("avtive")
});