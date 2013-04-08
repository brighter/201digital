<?php

date_default_timezone_set("GMT");

function html_header($title='', $currentPage='about') {
  
  if(trim($title)=='') {
    $title = 'We are 201 Digital - Specialist Internet Marketing Services & Tools';
  }
  
  $class['about'] = '';
  $class['services'] = '';
  $class['blog'] = '';
  $class['contact'] = '';
  
  $class[$currentPage]='navon';
  

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en">  <![endif]-->
   <head>
   <link href='http://fonts.googleapis.com/css?family=Lobster+Two:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rufina:400,700' rel='stylesheet' type='text/css'>
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
   <div id='header-stripe'></div>
   <header>   
   
   <div id='header-container'>
   <div class='logo-shadow yellow hidden'></div>
   <div class='logo-shadow red hidden'></div>
   <div class='logo-shadow blue hidden'></div>
  <div class='logo-shadow purple'></div>
   <div id='logo-container'><a href='index.php'>
   <h1 class='logo yellow hidden'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   <h1 class='logo red hidden'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   <h1 class='logo blue hidden'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
   <h1 class='logo purple'><span class='logo-201'>201</span><span class='logo-digital'>digital</span><span class='logo-co-uk'>.co.uk</span><span class='logo-marketing'>internet marketing</span></h1>
</a>

   </div>

   <nav>
   
   <div id='navigation-container'>
   <ul class='main-navigation'>
   <li class='<?php echo $class['about']?>'><a class='<?php echo $class['about']?>' href='about.php'>about</a></li>
   <li class='<?php echo $class['services']?>'><a id='services-link' class='<?php echo $class['services']?>' href='services.php'>services</a></li>
   <li class='<?php echo $class['blog']?>'><a class='<?php echo $class['blog']?>' href='blog.php'>blog</a></li>
<!--   <li class='<?php echo $class['contact']?>'><a class='<?php echo $class['contact']?>' href='contact.php'>contact</a></li>-->
   </ul>


   <div id='services-navigation-container' class='hidden'>
   <p>how can we help you?</p>
   <ul id='services-navigation'>
   
   <li>

   <a href='website.php'><img class='home-button-icon' src='img/icon-website.png' alt='web site icon' />
   <h1>I want to launch a kick-ass web site</h1></a>

   </li>
			 
   <li>

   <a href='mobile.php'>
   <img class='home-button-icon' src='img/icon-mobile.png' alt='mobile icon' />
    <h1>I want a mobile marketing strategy</h1></a>

   </li>

   <li>

   <a href='mailing.php'>
   <img class='home-button-icon' src='img/icon-mailing.png' alt='mailing list icon' />
   <h1>I want to use email marketing</h1></a>
   </li>

   <li>

   <a href='social.php'>
   <img class='home-button-icon' src='img/icon-social.png' alt='social media icon' />
   <h1>I want to advertise through social media</h1></a>

   </li>

   <li>

   <a href='tracking.php'>
   <img class='home-button-icon' src='img/icon-tracking.png' alt='user tracking icon' />
   <h1>I want to track my customers behaviour</h1></a>

   </li>

   <li>

   <a href='searchengines.php'>
   <img class='home-button-icon' src='img/icon-search.png' alt='search icon' />
   <h1>I want better search engine rankings</h1></a>
     
  </li>

   </div>
														
</nav>
   </div>   
   </header>
   

   <div id='foreground-container'>
   <div id='foreground'>

<?php
    }
function include_media_channels() {
?>
  <span class='media-glow'></span>
  <ul id='media-content-container'>

  <li id='mailing-list' class='media-content-box'>

  <div class='media-content'>
    <div class='media-top'>
  <h1>email</h1>
    <label for "mc-EMAIL"><p>Get our bi-weekly catch up of the latest marketing trends and campaigns from across the Net.</p></label>
    <form action='http://twitter.us5.list-manage.com/subscribe/post?u=aec9a01e16e8dbedf96c72ea9&id=3235809f24'  id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>

    </div>
    <div class='media-bottom'>
<button name="subscribe" id="mc-embedded-subscribe" class="signup-button">subscribe</button>
    </div>
    </div>
    </li>


    <li id='latest-news' class='media-content-box'>
    <div class='media-content'>
    <div class='media-top'>
    <h1>news</h1>
    <p>201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.</p>
    </div>
    <div class='media-bottom'><button href="item.php?1" class='signup-button'>read more</button>
    </div>
    </div>
    </li>
    
    <li id='from-our-blog' class='media-content-box'>
    <div class='media-content'>
    <div class='media-top'>
    <h1>blog</h1>
    <p>Well its been an interesting week here at 201Digital. First of all we start a company called Brighter, 
    then we decide to do something completely different and start a company with some poncy name 201Digital.
			   There is a plan to all the madness however...</p>
			   </div>
			   <div class='media-bottom'>
			   <button href="item.php?1" class='signup-button'>read more</button>
			   </div>
			   </div>	
			 </li>
			 </ul>	
<?php
			 }
function html_footer() { 
?>
     <script language='javascript' src='js/help.js'></script>
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
function home_buttons() {
?>
			 <div id='home-button-container'>
			 

			 <span id='home-button-shadow'></span>														
	                <h1 class='power-title padme50 center'>I would like to...</h1>
			<ul>
			 
			 <li>
			 <div id='home-button-website' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hover dormant'></div>
			 <div class='home-button home-button-content'>
			 <a href='website.php'><img class='home-button-icon' src='img/icon-website.png' alt='web site icon' />
			 <h2>launch a kick-ass</h2>
			 <h1>web site</h1></a>
			 </div>
			 </div>
			 </li>
			 
			 <li>
			 <div id='home-button-mobile' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hover dormant'></div>
			 <div class='home-button home-button-content'>
			 <a href='mobile.php'>
			 <img class='home-button-icon' src='img/icon-mobile.png' alt='mobile icon' />
			 <h2>take my business</h2>
			 <h1>mobile</h1></a>
			 </div>
			 </div>

			 </li>

			 <li>

			 <div id='home-button-mailing' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hover dormant'></div>
			 <div class='home-button home-button-content'>
			 <img class='home-button-icon' src='img/icon-mailing.png' alt='mailing list icon' />
			 <h2>grow my business with  a</h2>
			 <h1>mailing list</h1>
			 </div>
			 </div>

			 </li>

			 <li>

			 <div id='home-button-social' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hover dormant'></div>
			 <div class='home-button home-button-content'>
			 <img class='home-button-icon' src='img/icon-social.png' alt='social media icon' />
			 <h2>market my business using</h2>
			 <h1>social media</h1>
			 </div>
			 </div>

			 </li>

			 <li>

			 <div id='home-button-tracking' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hoverButton dormant'></div>
			 <div class='home-button home-button-content'>
			 <img class='home-button-icon' src='img/icon-tracking.png' alt='user tracking icon' />
			 <h2>see the bigger picture with</h2>
			 <h1>user tracking</h1>
			 </div>
			 </div>

			 </li>

			 <li>

			 <div id='home-button-search' class='home-button home-button-container'>
			 <div class='home-button home-button-border'>
			 </div>
			 <div class='home-button home-button-hover dormant'></div>
			 <div class='home-button home-button-content'>
			 <img class='home-button-icon' src='img/icon-search.png' alt='search icon' />
			 <h2>optimise my web site for</h2>
  <h1>search engines</h1>
  </div>
  </div>
  
  </li>
  </ul>

  </div> <!-- home button container -->

<?php
     }
?>