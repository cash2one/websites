$(function () {
        $('.weixin').hover(function () {
                $('.interest_bg').show();
        }, function () {
                $('.interest_bg').hide();
        });
        $('#loadMore').click(function () {
                if ($('#loadMore').html() == "再显示20条新闻↓") {
                        $('#loadMore').text("查看更多新闻");
                        $('#more_news').show(400);
                } else if ($('#loadMore').html() == "查看更多新闻") {
                        location.href = "/cat-1.html";
                }
        });
        $('#sbtn').click(function () {
                $('.search_box').toggle();
        })
        $("#fix").smartFloat();

        var tags_a = $("#tags a");
        tags_a.each(function () {
                var x = 9;
                var y = 1;
                var rand = parseInt(Math.random() * (x - y + 1) + y);
                $(this).addClass("tags" + rand);
        });

        //评论
        var repStr = '<div class="addtxt_box clearfix" style="display:none;"><textarea class="intxt_j"></textarea><input type="submit" class="re_submit_j" value="确认" onclick="post_Re(this)" /><a href="javascirpt:;" class="re_submit_esc_j" onclick="closeReBox(this)">取消</a></div>';
        $('body').on('click', '.huifu', function () {
                if ($(this).attr("ea_flat") == "1") {
                        $(this).parent().prev().append(repStr);
                        $('.addtxt_box').show(300);
                        $(this).attr("ea_flat", "0");
                        return false;
                }
                else {
                        return false;
                }
        });
})
$.fn.smartFloat = function () {
        var position = function (element) {
                var top = element.position().top, pos = element.css("position");
                var bottom = element.position().bottom;
                $(window).scroll(function () {
                        var scrolls = $(this).scrollTop();
                        if (scrolls > top) { //如果滚动到页面超出了当前元素element的相对页面顶部的高度
                                if (window.XMLHttpRequest) { //如果不是ie6
                                        element.css({
                                                position: "fixed",
                                                top: 0
                                        });
                                } else { //如果是ie6
                                        element.css({
                                                top: scrolls
                                        });
                                }
                        } else {
                                element.css({
                                        position: pos,
                                        top: top
                                });
                        }
                });
        };
        return $(this).each(function () {
                position($(this));
        });
};
function closeReBox(obj) {
        $('.huifu').attr("ea_flat", "1");
        $(obj).parent().remove();
}
function post_Re(obj) {
        var new_re = ' <li class="clearfix"><div class="top_floor fl"><a href="javascript:;" class="head_portrait"><div class="img"></div></a></div><div class="other fl"><div class="floor_host"><div class="userName_box clearfix"><a href="javascript:;" class="userName fl">admin</a><i class="report_time fl">发表于：2015-01-12 15:15:15</i></div><div class="reply"><p>new发表评论</p><div class="m10"></div></div><div class="plc"><a href="javascript:;" class="huifu" ea_flat="1">回复</a>&nbsp;|&nbsp;<a href="javascript:;" class="yinyong">引用</a></div></div></div></li>';
        $(obj).parents("ul").append(new_re);
        $(obj).parent().remove();
        $('.huifu').attr("ea_flat", "1");
}