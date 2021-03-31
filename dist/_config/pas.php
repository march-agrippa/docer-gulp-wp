<?php
$url_count = count(explode('/', $_SERVER["REQUEST_URI"]));
$pas = "";
//テスト環境
if($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_NAME"] == "testsite.help"){
	$url_count = $url_count - 1;

//本番環境
}else{
	$url_count = $url_count;
}
for ($i = 2; $i < $url_count; $i++) { $pas .= "../";}

$img = $pas."assets/img/";
$css = $pas."assets/css/";
$js = $pas."assets/js/";

#$pas = "/_kanri/";

?>
