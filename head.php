<?php
require_once __DIR__.'/rooturl.php';
$pageurl = $rooturl.$_SERVER['REQUEST_URI'];
?>
<head>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="http-equiv" content="Content-type: text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>

<title>Mikey's Pizza! - Most delicious Pizza!</title>
<meta name="keywords" content="Mikes&#39;s Pizza pizza">
<meta name="description" content="Mike&#39;s Pizza in Kyiv ✔ Pizzeria №1 in Ukraine ✔ Pizza Tracker ✔ Pizza Marker ✔ 70% off every Tuesday ☎ (068) 000-00-00">
<meta name="author" content="Oleksiy">
<!-- <link rel="manifest" href="link_pwa.json"> -->

<link rel="shortcut icon" type="image/png" href="img/favicon.png">


<link rel="canonical" href="<?=$pageurl?>" />

<!-- <meta name="msapplication-TileColor" content="#2b5797"> -->
<!-- <meta name="theme-color" content="#ffffff"> -->

<link rel="alternate" hreflang="en-ua" href="<?=$pageurl?>" />
<link rel="alternate" hreflang="uk-ua" href="<?=$pageurl?>" />
<link rel="alternate" hreflang="ru-ua" href="<?=$pageurl?>" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

<!-- Materialize, Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
<!-- Materialize, Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- Local stylesheets -->
<link rel="stylesheet" href="<?=$rooturl?>/stylesheet.css" />

<!-- <link rel="preconnect" href="http://static.mikespizza.pp.ua"> -->

<script defer type="text/javascript" src="<?=$rooturl?>/script.js"></script>

<?php
if($_SERVER['PHP_SELF'] === '/index.php') 
{
?>
    <link rel="prerender" href="<?=$rooturl?>/details.php">
    <link rel="stylesheet" type="text/css" href="stylesheet_carousel.css" />
    <script defer type="text/javascript" src="<?=$rooturl?>/script_carousel.js"></script>
<?php
}
?>


<!--
<meta property="og:title" content="Mikes’s Pizza - pizzeria №1 in Kiev" />
<meta property="og:description" content="Mike&#39;s Pizza in Kiev ✔ Pizzeria №1 in Ukraine ✔ Pizza Tracker ✔ Pizza Marker ✔ 70% off every Tuesday ☎ (068) 000-00-00" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://mikespizza.pp.ua" />
<meta property="og:image" content="https://static.mikespizza.pp.ua/web/img/mikes_logo.png" />
 -->


</head>