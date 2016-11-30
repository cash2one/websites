//当滚动到一定位置后广告位固定位置
$(function(){
    	var rollSet = $('#elFix');// 检查对象，#sidebar-tab是要随滚动条固定的ID，可根据需要更改
		var offset = rollSet.offset();
		$(window).scroll(function () {
		// 检查对象的顶部是否在游览器可见的范围内
		var scrollTop = $(window).scrollTop();
		
		if(offset.top < scrollTop){
			rollSet.addClass('fixed');
		}else{
			rollSet.removeClass('fixed');
		}
	});
});