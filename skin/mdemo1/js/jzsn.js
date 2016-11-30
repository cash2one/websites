$.fn.smartFloat = function() {
    var position = function(element) {
        var top = element.position().top,
            pos = element.css("position");
        var bottom = element.position().bottom;
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > top) {
                if (window.XMLHttpRequest) {
                    element.css({
                        position: "fixed",
                        top: 0,
                        opacity: 0.95
                    })
                } else {
                    element.css({
                        top: scrolls
                    })
                }
            } else {
                element.css({
                    position: pos,
                    top: top
                })
            }
        })
    };
    return $(this).each(function() {
        position($(this))
    })
};

$(function() {
    $("#tf-nav-bar").smartFloat();
    $("#nav-bar")[0].addEventListener("click", function() {
        if (!$("#tf-warpper").is(".tf-warpper-active")) {
        	$('#tf-jznav').show(300);
            $("#tf-warpper").addClass("tf-warpper-active");
            $("#nav-bar").children(".fa").removeClass("fa-bars").addClass("fa-exchange");
        } else {
        	$('#tf-jznav').hide(300);
            $("#tf-warpper").removeClass("tf-warpper-active");
            $("#nav-bar").children(".fa").removeClass("fa-exchange").addClass("fa-bars");
        }
        event.stopPropagation();
    });
    $("#tf-warpper")[0].addEventListener("click", function(even) {
        if ($("#tf-warpper").is(".tf-warpper-active")) {
        	even.preventDefault();
        	$('#tf-jznav').hide(300);
            $("#tf-warpper").removeClass("tf-warpper-active");
            $("#nav-bar").children(".fa").removeClass("fa-exchange").addClass("fa-bars");
            event.stopPropagation();
        }

    });
    $("#m-seach")[0].addEventListener("click",function(){
    	if ($("#tf-mnavbg").is(":hidden")) {
            $("#tf-mnavbg").slideDown(100)
        }
    });

    $("#more-clos,#tf-mnavbg")[0].addEventListener("click",function(){
    	 $("#tf-mnavbg").slideUp(100);
         event.stopPropagation()
    });
       $("#click-all-show a").click(function() {
        $(".tf-content").css("max-height", "100%");
        $(this).children("span").text("此文结束了哦 关注其他更精彩内容").prev().removeClass("fa-angle-double-down").addClass("fa-hand-o-down");
    });
    $('.tf-ar-main img').css("width", "100%");

})