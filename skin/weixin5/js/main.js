$(function(){
		//省略号js 
		$(".ind_conLi_m2 span").each(function(i){  
			if($(this).text().length>60){
				$(this).attr("title",$(this).text());  
				var text=$(this).text().substring(0,65)+"...";  
				$(this).text(text);  
			}
		});
		$("#myTab1_Content0 li a").each(function(j){
			if($(this).text().length>18){
				$(this).attr("title",$(this).text());  
				var text=$(this).text().substring(0,18)+"...";  
				$(this).text(text);  
			}
		});
		$("#myTab1_Content1 li a").each(function(j){
			if($(this).text().length>18){
				$(this).attr("title",$(this).text());  
				var text=$(this).text().substring(0,18)+"...";  
				$(this).text(text);  
			}
		});
	});
//选项卡js
function nTabs(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
  if (i == Num)
  {
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
  }else{
   tabList[i].className = "normal"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
  }
} 
}
function nTabs2(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
  if (i == Num)
  {
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
  }else{
   tabList[i].className = "normal"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
  }
} 
}

function htmlScroll()
{
	var top = document.body.scrollTop ||  document.documentElement.scrollTop;
	if(elFix.data_top < top)
	{
		elFix.style.position = 'fixed';
		elFix.style.top = 0;
		elFix.style.left = elFix.data_left;
	}
	else
	{
		elFix.style.position = 'static';
	}
}
function sqyqlj_fun(obj,sType)
{
	if (sType == 'show') { document.getElementById(obj).style.display = 'block';} 
	if (sType == 'hide') { document.getElementById(obj).style.display = 'none';} 	
}
