<?php
	//echo $_GET['lang'];
	setcookie('theme',$_GET['language'], path:'/public');
	header("Location: http://localhost".$_COOKIE['last_uri']);
?>