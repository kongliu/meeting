// 首页焦点图
$(function(){
	var sWidth = $("#focus_img_container").width();
	var len = $("#focus_img_list .focus_item").length;
	var index = 0;
	var picTimer = null;
	var turn_left = true;
	var focus_time = 1000;
	var move_time = 500;
	$("#focus_img_list").css("width", sWidth*len);
	$("#focus_img_container").hover(function(){clearInterval(picTimer);},function()
	{
		picTimer = setInterval(function()
		{
			showPics(turn_left, index);
			if(turn_left){ index++; }else{ index--; }
			if(index == len){ turn_left = false; index--; }
			if(index == 0){ turn_left = true; }
		}, focus_time);
	}).trigger("mouseleave");
	function showPics(turn_left, index)
	{
		if(turn_left)
		{
			var nowLeft = -index*sWidth;
			$("#focus_img_list").stop(true,false).animate({"left":nowLeft}, move_time);
		}
		else
		{
			var nowLeft = -(index-1)*sWidth;
			$("#focus_img_list").stop(true,false).animate({"left":nowLeft}, move_time);
		}
	}
});