$(function () {
        var prevTop = 0,
              currTop = 0;
        if ($(window).scrollTop() >= 40) {
                $('.p-header').removeClass('p-header-show').addClass('p-header-hide');
                setTimeout(function () {
                        $('.p-header .second-nav').removeClass('second-nav-large').addClass('second-nav-small');
                }, 100)
        }
        if ($(window).scrollTop() < 42) {
                $('.p-header').removeClass('p-header-hide').addClass('p-header-show');
                setTimeout(function () {
                        $('.p-header .second-nav').removeClass('second-nav-small').addClass('second-nav-large');
                }, 100);
        }
        $(window).scroll(function () {
                currTop = $(window).scrollTop();
                if (currTop < prevTop) { //判断小于则为向上滚动
                        setTimeout(function () {
                                $('.p-header').removeClass('p-header-hide').addClass('p-header-show');
                        }, 100);
                } else {
                        if ($(window).scrollTop() < 42) {
                                $('.p-header').removeClass('p-header-hide').addClass('p-header-show');
                        }
                        if ($(window).scrollTop() >= 40) {
                                $('.p-header').removeClass('p-header-show').addClass('p-header-hide');
                        }
                }
                //prevTop = currTop; //IE下有BUG，所以用以下方式
                setTimeout(function () { prevTop = currTop }, 0);
        });
})