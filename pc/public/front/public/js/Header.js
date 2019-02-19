/**
 * Created by Administrator on 2018\12\13 0013.
 */

$(".Header .Nav a").mouseover(function(){
    $(".Header .Nav a").removeClass("avtive").eq($(this).index()).addClass("avtive");
});