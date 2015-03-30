<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?> - With Us</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="/static/lib/ratchet/css/ratchet.min.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="/static/lib/ratchet/js/ratchet.min.js"></script>
  </head>
  <body>
		<header class="bar bar-nav wu-bar">
		  <button class="btn btn-link btn-nav pull-right">
		    <span class="icon icon-bars wu-bar-color"></span>
		  </button>
      <?php if(!isset($_SESSION['user'])) { ?>
		  <a data-transition="slide-in" class="btn btn-outlined pull-right wu-bar-color wu-bar-login" href="/sign-in">LOGIN</a>
		  <?php }else{ ?>
      <a data-transition="slide-in" class="btn btn-outlined pull-right wu-bar-color wu-bar-login" href="/sign-out">LOGOUT</a>
      <?php } ?>
      <h1 class="title wu-bar-color">
		    <a data-transition="slide-out" class="pull-left" style="margin:11px;" href="/">
		      <img src="static/img/with-us-logo.png" height="25">
		    </a>
		  </h1>
      <ul class="wu-menu">
        <li><a href="/">回到首页</a></li>
        <li><a href="/sign-in">注册和登录</a></li>
        <li><a href="/office-bj">空间介绍</a></li>
        <li><a href="/room-apply">会议室预约租用</a></li>
        <li><a href="/event-apply">活动空间预约租用</a></li>
      </ul>
      <script type="text/javascript">
        document
        .addEventListener('click', function(e){
          if(e.target.classList.toString().indexOf('icon-bars') == -1){
            return;
          }
          var menu = document.querySelector('.wu-menu');
          menu.classList.toggle('active');
        });
      </script>
		</header>