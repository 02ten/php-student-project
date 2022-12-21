<?php
	//echo $_GET['lang'];
	setcookie('lang',$_GET['language'], path:'/public');
	header("Location: http://localhost".$_COOKIE['last_uri']);
?>