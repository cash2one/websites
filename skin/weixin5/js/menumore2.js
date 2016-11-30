$(function(){
       var filter_box = $(".ind_con_list_box");
        $("body").delegate("._j_filter_more","click",function(event){
            event.preventDefault();
            var target = $(this);
            if (target.hasClass("up_")){
                filter_box.animate({
                'height' : '79px'
                },'slow',function(){
                    target.removeClass("up_").addClass("up").html("收起&nbsp;<i><img src='images/1_14_2.gif' width='13' height='13' /></i>");
                });
            }
            else{
                filter_box.animate({
                    'height' : '39px'
                },'slow',function(){
                    target.removeClass("up").addClass("up_").html("更多&nbsp;<i><img src='images/1_14.gif' width='13' height='13' /></i>");
                });
            }
        });
    });