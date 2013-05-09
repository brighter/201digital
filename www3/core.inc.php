<?php

date_default_timezone_set("GMT");

function html_header($title='', $currentPage='about',$currentSubPage='') {
  
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
   
   <body class='yui3-skin-sam'>
<div class='secondry-background-container'>
<div id='<?php echo $currentSubPage?>' class='secondry-background'></div>
</div>
<div id='signupFormContainer' style='display:none'>
<div id='signupForm'>


<div id='newsletter-pending' class='interactive-panel waiting-message' style='display:none'><img src='img/spinner.gif' alt='waiting-image' class='waiting-spinner'/><h1>One Moment Please.</h1><p>We are just processing your request.</p></div>

<div id='newsletter-accepted' class='interactive-panel waiting-message click-handler close-panel' style='display:none'><img src='img/success.gif' alt='waiting-image' class='waiting-spinner'/><h1>Thank you.</h1><p>We hope you enjoy our newsleter.</p></div>

  <div id='newsletter-suggestion-valid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>We think you may have misspelt your email.</p><p>You typed: <span class='email-suggestion original'></span></p><p>We think it should be: <span class='email-suggestion suggestion'></span>
<p>Please confirm if you would like us to correct it?</p>
<img src='img/failure.gif' alt='waiting-image' class='waiting-spinner click-handler dont-correct-email'/> <img src='img/success.gif' alt='waiting-image' class='waiting-spinner click-handler correct-email' />
</div>

  <div id='newsletter-suggestion-invalid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>You have not entered a valid email address.</p><p>You typed: <span class='email-suggestion original'></span></p><p>We think it should be: <span class='email-suggestion suggestion'></span>
<p>Please confirm if you would like us to correct it?</p>
<img src='img/failure.gif' alt='waiting-image' class='waiting-spinner click-handler dont-correct-email'/> <img src='img/success.gif' alt='waiting-image' class='waiting-spinner click-handler correct-email'/>			    
</div>

  <div id='newsletter-email-invalid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>You have not entered a valid email address.</p><img src='img/failure.gif' alt='waiting-image' class='waiting-spinner click-handler close-panel'/>
</div>

  <div id='newsletter-error' class='interactive-panel waiting-message click-handler close-panel' style='display:none'><img src='img/failure.gif' alt='waiting-image' class='waiting-spinner'/><h1>Oops!</h1><p>We seem to have encountered an error:</p>
<p class='error-message'></p>
</div>

  <form action="" id='newsletter-form' class='interactive-panel'>
    <fieldset>
      <legend>personalise your newsletter</legend>
      <div class='control-group'>
      <label>First name</label>
      <input type='text' name='firstname' />
      </div>
      <div class='control-group'>
      <label>Last name</label>
      <input type='text' name='lastname' />
      </div>
      <div class='control-group'>
      <label>Company</label>
      <input type='text' name='company' />
      </div>
      <div class='control-group-buttons'>
      <button type='reset' name='cancel' class='cancel-button click-handler close-panel'>Cancel</button>
      <button type='submit' name='Submit' class='submit-button click-handler complete-registration'>Submit</button>
      </div>
    </fieldset>
    </form>
</div>
</div>

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
       <li class='<?php echo $class['blog']?>'><a class='<?php echo $class['blog']?>' href='http://internet-marketing-advice-tips-solutions.co.uk/'>blog</a></li>
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
         <li><a href='social.php'>social</a></li>
         <li><a href='search.php'>search</a></li>
         <li><a href='email.php'>email</a></li>
         <li><a href='mobile.php'>mobile</a></li>
       </ul>
     </div>
   </div>
   </nav>

   <div id='contact-icons'>
     <ul>
       <li><div class='contact-details collapsed'><p>Call us on: 01582 422 444</p></div><a href='contact.php'><img src='img/icons/telephone_off.gif'/></a></li>
       <li><div class='contact-details collapsed'><p>Email us: <a href='mailto:moreinfo@201d.co.uk?subject=I was looking through your web site...'>moreinfo@201d.co.uk</a></p></div><a href='mailto:moreinfo@201d.co.uk?subject=I was looking through your web site...'><img src='img/icons/email_off.gif' /></a></li>
       <li><div class='contact-details collapsed'><p><a href='http://www.twitter.com/201Digital'>www.twitter.com/201Digital</a></p></div><a href='http://www.twitter.com/201Digital'><img src='img/icons/twitter_off.gif' /></a></li>
       <li><div class='contact-details collapsed'><p><a href='http://www.facebook.com/201digital'>www.facebook.com/201Digital</a></p></div><a href='http://www.facebook.com/201Digital'><img src='img/icons/facebook_off.gif' /></a></li>
     </ul>
   </div>


   </div>   <!-- end header-container -->

   </header>
   <?php
   }
function about_navigation($section) {
   
   $links['origins']='origins';
   $links['leadership']='leadership';
  $links['approach']='approach';
  $links['clients']='clients';
  $links['news']='news';
  $links['contact']='contact';

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
   $links['social']='social';
   $links['email']='email';
   $links['mobile']='mobile';
   $links['content']='content';
   $links['search']='search';



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
  <script language='javascript' src='js/verimail.min.js'></script>
  <script language='javascript' src='js/slideshow.js'></script>
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