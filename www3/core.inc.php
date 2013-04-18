<?php

date_default_timezone_set("GMT");

function html_header($title='', $currentPage='about') {
  
  if(trim($title)=='') {
    $title = 'We are 201 Digital - Specialist Internet Marketing Services & Tools';
  }
  
  $class['about'] = '';
  $class['services'] = '';
  $class['blog'] = '';
  
  $class[$currentPage]='navon';
  

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en">  <![endif]-->
  <head>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssgrids/cssgrids-min.css">
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
   <header>   

   <div id='header-stripe'></div>

   <div id='header-container'>

   <div id='logo-container'><a href='index.php'>
   <h1 class='logo purple'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1></a>
   </div>

   <nav>
   
   <div id='navigation-container'>

     <div id='newsletter-signup-container'>
       <div id='newsletter-signup'>
         <input type='email' value='GET INDUSTRY NEWS AND REPORTS VIA EMAIL...' /><button class='newsletter-signup-button'>SIGN  UP</button>
       </div>
     </div>
     <ul class='main-navigation'>
       <li class='<?php echo $class['about']?> about-navigation'><a class='<?php echo $class['about']?>' href='origins.php'>about</a></li>
       <li class='<?php echo $class['services']?> services-navigation'><a id='services-link' class='<?php echo $class['services']?>' href='strategy.php'>services</a></li>
       <li class='<?php echo $class['blog']?>'><a class='<?php echo $class['blog']?>' href='blog.php'>blog</a></li>
     </ul>
     <div id='about-subnavigation' style='display:none'>
       <ul>
         <li><a href='origins.php'>origins</a></li>
         <li><a href='leadership.php'>leadership</a></li>
         <li><a href='mission.php'>mission</a></li>
         <li><a href='approach.php'>approach</a></li>
         <li><a href='news.php'>news</a></li>
         <li><a href='contact.php'>contact</a></li>
       </ul>
     </div>
     <div id='services-subnavigation' style='display:none'>
       <ul>
         <li><a href='strategy.php'>strategy</a></li>
         <li><a href='creative.php'>creative</a></li>
         <li><a href='build.php'>build</a></li>
         <li><a href='content.php'>content</a></li>
         <li><a href='campaign.php'>campaign</a></li>
         <li><a href='search.php'>search</a></li>
         <li><a href='email.php'>email</a></li>
         <li><a href='mobile.php'>mobile</a></li>
         <li><a href='social.php'>social</a></li>
       </ul>
     </div>
   </div>
   </nav>

   </div>   <!-- end header-container -->

   </header>
   <?php
   }
function about_navigation($section) {
   
   $links['origins']='origins';
   $links['leadership']='leadership';
   $links['mission']='mission';
   $links['approach']='approach';

   $total = sizeof($links);
   $i=0;
   $nav = '';
   foreach($links as $k=>$v) {
     $i++;
     $class='';
     if($i == $total) {
       $class='last';
     }
     if($v==$section) {
       $class.=" active";
       $nav .= "<li class='".$class."'>".$v."</li>";
     } else {
       $nav .= "<li class='".$class."'><a href='".$k.".php'>".$v."</a></li>";
     }
   }
   ?>
   <ul class='content-navigation'>
     <li class='first'><a href='index.php'>home</a></li>
     <?php echo $nav ?>
   </ul>
   <?php 
 }


function services_navigation($section) {
   
   $links['strategy']='strategy';
   $links['creative']='creative';
   $links['build']='build';
   $links['content']='content';
   $links['campaign']='campaign';
   $links['search']='search';
   $links['email']='email';
   $links['mobile']='mobile';
   $links['social']='social';

   $total = sizeof($links);
   $i=0;
   $nav = '';
   foreach($links as $k=>$v) {
     $i++;
     $class='';
     if($i == $total) {
       $class='last';
     }
     if($v==$section) {
       $class.=" active";
       $nav .= "<li class='".$class."'>".$v."</li>";
     } else {
       $nav .= "<li class='".$class."'><a href='".$k.".php'>".$v."</a></li>";
     }
   }
   ?>
   <ul class='content-navigation'>
     <li class='first'><a href='index.php'>home</a></li>
     <?php echo $nav ?>
   </ul>
   <?php 
 }

function html_footer() { 
?>
  <footer>
    <div id='footer-container'>
    <div class='rule'></div>
    <div id='copyright'>
    Copyright © 2013 201 Digital Ltd. All rights reserved.<br  />
    Last Updated On: <?php echo Date("jS F Y");?><br />
						    
						    <!--    <a href='privacy.html'>Privacy Policy</a> ¦ 
						    <a href='terms.html'>Terms of Use</a>-->
						    
						    </div>
						    </div>
						    </footer>
						  
						    
						    </body>
						    </html>
						    
<?php
    }
?>