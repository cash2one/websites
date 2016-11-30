<?php
header('Content-type: image/jpeg');
if(isset($_GET["url"])){
	$url = "http://img03.store.sogou.com/net/a/04/link?appid=100520031&w=710&url=".$_GET["url"];
}
else{
	$url = "/skin/404/images/40401.png";
}
header("Location:".$url); 
exit;
// echo file_get_contents($url);
?>