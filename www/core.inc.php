<?php

date_default_timezone_set("GMT");

function html_header($title='', $currentPage='about') {
  
  if(trim($title)=='') {
    $title = 'We are 201 Digital - Specialist Internet Marketing Services & Tools';
  }
  
  $class['about'] = '';
  $class['approach'] = '';
  $class['products'] = '';
  $class['cloud'] = '';
  $class['applications'] = '';
  $class['data'] = '';
  $class['contact'] = '';
  
  switch($currentPage) {
  case 'about':
    $class['about']='navon';
    break;
  case 'approach':
    $class['approach']='navon';
    break;
  case 'products':
    $class['products']='navon';
    break;
  case 'cloud':
    $class['cloud']='navon';
    break;
  case 'applications':
    $class['applications']='navon';
    break;
  case 'data':
    $class['data']='navon';
    break;
  case 'contact':
    $class['contact']='navon';
    break;

  }


?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en">  <![endif]-->
   <head>
   <link href='http://fonts.googleapis.com/css?family=Lobster+Two:700' rel='stylesheet' type='text/css'>
   <script src="http://yui.yahooapis.com/3.8.1/build/yui/yui-min.js"></script>
   <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
   <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
   <!--[if IE]>
    <link href="stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
    
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo $title?></title>
    
</head>

<body>

   
   <div id='background-container'>
   <div id='background-position'>
   <div id='background-b' class='background background-off'></div>
   <div id='background-y' class='background background-off'></div>
   <div id='background-p' class='background'></div>
   </div>
   </div>


   <header>   
   
   <div id='header-container'>
   <div id='logo-container'>
   <div class='logo-shadow purple'></div>
   <div class='logo-shadow red hidden'></div>
   <div class='logo-shadow blue hidden'></div>
   <div id='header-stripe'></div>
   <h1 class='logo purple'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   <h1 class='logo red hidden'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   <h1 class='logo blue hidden'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   </div>

   <nav>
   
   <div id='navigation-container'>
   <ul id='navigation-items'>
   <li class='<?php echo $class['about']?>'><a class='<?php echo $class['about']?>' href='about.php'>about</a></li>
   <li class='<?php echo $class['what']?>'><a class='<?php echo $class['what']?>' href='what.php'>services</a></li>
   <li class='<?php echo $class['clients']?>'><a class='<?php echo $class['clients']?>' href='clients.php'>blog</a></li>
   <li class='<?php echo $class['contact']?>'><a class='<?php echo $class['contact']?>' href='contact.php'>contact</a></li>
</ul>
</div>
														
</nav>
   </div>   
   </header>
   

   <div id='foreground-container'>
   <div id='foreground'>
														

</header>
<?php
    }

function html_footer() { 
?>
<footer>
<div id='footer-container' class='page-container'>
    <div class='rule'></div>
  <div id='copyright'>
    Copyright © 2013 201 Digital Ltd. All rights reserved.<br  />
    Last Updated On: <?php echo Date("jS F Y");?><br />

<!--    <a href='privacy.html'>Privacy Policy</a> ¦ 
    <a href='terms.html'>Terms of Use</a>-->
    
  </div>
  </div>
</footer>
</div>
</div>
<script language='javascript'>

						 YUI().use("node",function(Y) {
						     
						     var
						       backB = Y.one("#background-b"),
						       backY = Y.one("#background-y"),
						       backP = Y.one("#background-p"),

						       sideContentB = Y.one("#side-content-background-b"),
						       sideContentY = Y.one("#side-content-background-y"),
						       sideContentP = Y.one("#side-content-background-p"),
						       swap = 1,

						       swapBack = function() {
						       
						       switch(swap) {
							 
						       case 1:
						       backB.removeClass("background-off");
						       backY.addClass("background-off");
						       backP.addClass("background-off");
						       sideContentB.addClass("background-off");
						       sideContentY.removeClass("background-off");
						       sideContentP.addClass("background-off");

						       swap=2;
						       break;
						       
						       case 2:
						       backB.addClass("background-off");
						       backY.removeClass("background-off");
						       backP.addClass("background-off");
						       sideContentB.addClass("background-off");
						       sideContentY.addClass("background-off");
						       sideContentP.removeClass("background-off");

						       swap=3;
						       break;

						       case 3:
						       backB.addClass("background-off");
						       backY.addClass("background-off");
						       backP.removeClass("background-off");
						       sideContentB.removeClass("background-off");
						       sideContentY.addClass("background-off");
						       sideContentP.addClass("background-off");

						       swap=1;
						       break;
						       }
						       
						       setTimeout(swapBack,10000);
						     };
						       
						     //						     swapBack();
						     

						   });
  
  </script>						 
</div>

</body>
</html>

<?php
    }
?>