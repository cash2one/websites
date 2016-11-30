$(function() {
    $("#search-bt").click(function() {
        if ($("#more-navbg").is(":hidden")) {
            $("#more-navbg").slideDown(100);
            $("html").css("overflow", "hidden");
        }
    });

    $("#more-navbg,#more-close").click(function(event) {
        $("#more-navbg").slideUp(100);
        $("html").css("overflow", "");
        event.stopPropagation();
    });

})
