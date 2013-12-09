<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Redis Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Le styles -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<style>
	body {
		padding-top: 60px;
		/* 60px to make the container go all the way to the bottom of the topbar */
	}
	
	#main {
		
		-webkit-transition: all .8s ease-in-out;
	    -moz-transition: all .8s ease-in-out;
	    -o-transition: all .8s ease-in-out;
	    transition: all .8s ease-in-out;		
	}
	
	.slideout {
		margin-left: -102%;	
	}
	
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/application.css" rel="stylesheet">	
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">redis-admin</a>
          <div class="nav-collapse">
            <ul class="nav" id="nav">
              <li class="active"><a class="pjax" href="connections.php">Redis配置</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="container">
    	<div id="loading" class='loader' style='display:none;'><img src='img/spin.gif'></div>
    	<div id="main" style="position: absolute;"  class="row">
    		<?php include $GLOBALS['content_view']; ?>
    	</div>    	
    </div>
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.pjax.js"></script>
    <script src="js/application.js"></script>
</body>
</html>