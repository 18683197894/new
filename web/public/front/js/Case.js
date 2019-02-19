/**
 * Created by Administrator on 2019/1/10.
 */
$(".City_a a").click(function(){
    $(".City_a a").removeClass('avtive').eq($(this).index()).addClass('avtive');
    $(".City_Show .City_ShowT").removeClass('avtive').eq($(this).index()).addClass('avtive');
    $(".Centered .City_M").removeClass("avtive");
    var index = $(".City_a a").index(this);
    if(index==0){
        $(".City_Show .More").removeClass("avtive");
    }else{
        $(".City_Show .More").addClass("avtive")
    }
});
$(".City_Show .More").click(function(){
    $(".Centered .City_M").addClass("avtive");
    $(".City_Show .More").addClass("avtive");
});
$(".City_M .City_Mgb").click(function(){
    $(".Centered .City_M").removeClass("avtive");
    $(".City_Show .More").removeClass("avtive");
});