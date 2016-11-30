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
    $("#fns-header").smartFloat();
    $("#fns-mn")[0].addEventListener("click", function() {
        if (!$("#fns-warpper").is(".fns-warpper-active")) {
            $('#fns-jznav').show(300);
            $("#fns-warpper").addClass("fns-warpper-active");
            $("#fns-mn").children(".fa").removeClass("fa-bars").addClass("fa-exchange");
        } else {
            $('#fns-jznav').hide(300);
            $("#fns-warpper").removeClass("fns-warpper-active");
            $("#fns-mn").children(".fa").removeClass("fa-exchange").addClass("fa-bars");
        }
        event.stopPropagation();
    });
    $("#fns-warpper")[0].addEventListener("click", function(even) {
        if ($("#fns-warpper").is(".fns-warpper-active")) {
            even.preventDefault();
            $('#fns-jznav').hide(300);
            $("#fns-warpper").removeClass("fns-warpper-active");
            $("#fns-mn").children(".fa").removeClass("fa-exchange").addClass("fa-bars");
            event.stopPropagation();
        }

    });


    $("#click-all-show a").click(function() {
        $(".tf-content").css("max-height", "100%");
        $(this).children("span").text("此文结束了哦 关注其他更精彩内容").prev().removeClass("fa-angle-double-down").addClass("fa-hand-o-down");
    });
    $('.tf-ar-main img').css("width", "100%");

})
