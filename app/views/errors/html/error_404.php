<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="id" id="not-found">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<title>404 Page Not Found</title>
<link rel="stylesheet" href="/assets/css/error.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/assets/js/jquery.typed.js"></script>
<script>
    $(function() {
        $("#story").typed({
            strings: ["Sungguh sesuatu...^2000 \njika anda telah menemukan halaman ini...^2000 \napakah anda merasa kehilangan jejak pada hari ini?^2000 \nabaikan saja pertanyaan diatas.^2000 \nkami hanya ingin mengatakan.^2000 \nbahwa anda saat ini...^2000 \nberada pada halaman yang tidak seharusnya dikunjungi...^2000 \n \nPage not found status code 404"],
            typeSpeed: 20,
            backDelay: 500,
            loop: false,
            loopCount: false,
        });
    });
    $(document).ready(function() {
      setTimeout(function() {
        $("#kick").append("<a href='/'>HOME</a>");
      }, 30000);
    });
</script>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0037/2783.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
</head>
<body>
    <div id="holder">
        <span id="story"></span>
        <div id="kick"></div>
    </div>
</body>
</html>