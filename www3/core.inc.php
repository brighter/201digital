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

   <div class='logo-shadow purple'></div>

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
   <li class='<?php echo $class['about']?>'><a class='<?php echo $class['about']?>' href='about.php'>about</a></li>
   <li class='<?php echo $class['services']?>'><a id='services-link' class='<?php echo $class['services']?>' href='services.php'>services</a></li>
   <li class='<?php echo $class['blog']?>'><a class='<?php echo $class['blog']?>' href='blog.php'>blog</a></li>
   </ul>

   </div>
														
   </nav>

   </div>   <!-- end header-container -->

   </header>
   
   <div id='foreground-container'>
   <div id='foreground'>
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
						  

  </div> <!-- foreground -->
						    
						    </div>  <!-- foreground container -->
						    
						    </body>
						    </html>
						    
<?php
    }
?>