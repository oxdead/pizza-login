<?php
$rooturl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];

function headTo($url)
{
	echo "<script type='text/javascript'>window.location.assign('".$url."');</script>";
	// echo "<script type='text/javascript'>window.location.href='{$url}';</script>"; // faster than assign method, but prefer assign
	// echo '<meta http-equiv="refresh" content="0; url='.$url.'">'; // can be problematic (refresh delay = 0), but can be used, if javascript is disabled in browser
}
?>