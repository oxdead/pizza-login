<?php
$rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].'/pizza_login';

function headTo($url)
{
	// echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	echo '<meta http-equiv="refresh" content="0; url='.$url.'">';
}
?>