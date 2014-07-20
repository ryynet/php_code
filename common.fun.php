<?php

function GetUrl(){ 
	$url="http://".$_SERVER["HTTP_HOST"]; 
	if(isset($_SERVER["REQUEST_URI"])){ 
		$url.=$_SERVER["REQUEST_URI"]; 
	} else{ 
		$url.=$_SERVER["PHP_SELF"]; 
		if(!empty($_SERVER["QUERY_STRING"])){$url.="?".$_SERVER["QUERY_STRING"];} 
	} 
	return $url; 
}


?>