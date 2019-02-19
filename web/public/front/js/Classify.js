/**
 * Created by Administrator on 2019\1\15 0015.
 */


var Num = 0;
$(".footer_Classify").click(function(){
    Num++;
    if(Num%2==0){
        $(".Classify").removeClass("avtive")
    }else{
        $(".Classify").addClass("avtive")
    }
});
$(".Classify_Bg").click(function(){
    $(".Classify").removeClass("avtive");
    Num = 0;
    return;
});


var New_sx = 0;
$(".New_sx").click(function(){
    New_sx++;
    if(New_sx%2==0){
        $(".New_xz").removeClass("avtive")
    }else{
        $(".New_xz").addClass("avtive")
    }
});
