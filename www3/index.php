<?php 
include "core.inc.php";
html_header('','');
?>
<div id='signupFormContainer' style='display:none'>
<div id='signupForm'>


<div id='newsletter-pending' class='interactive-panel waiting-message' style='display:none'><img src='img/spinner.gif' alt='waiting-image' class='waiting-spinner'/><h1>One Moment Please.</h1><p>We are just processing your request.</p></div>

<div id='newsletter-accepted' class='interactive-panel waiting-message click-handler close-panel' style='display:none'><img src='img/success.png' alt='waiting-image' class='waiting-spinner'/><h1>Thank you.</h1><p>We hope you enjoy our newsleter.</p></div>

  <div id='newsletter-suggestion-valid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>We think you may have misspelt your email.</p><p>You typed: <span class='email-suggestion original'></span></p><p>We think it should be: <span class='email-suggestion suggestion'></span>
<p>Please confirm if you would like us to correct it for you?</p>
<img src='img/failure.png' alt='waiting-image' class='waiting-spinner click-handler dont-correct-email'/> <img src='img/success.png' alt='waiting-image' class='waiting-spinner click-handler correct-email' />
</div>

  <div id='newsletter-suggestion-invalid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>You have not entered a valid email address.</p><p>You typed: <span class='email-suggestion original'></span></p><p>We think it should be: <span class='email-suggestion suggestion'></span>
<p>Please confirm if you would like us to correct it for you?</p>
<img src='img/failure.png' alt='waiting-image' class='waiting-spinner click-handler dont-correct-email'/> <img src='img/success.png' alt='waiting-image' class='waiting-spinner click-handler correct-email'/>			    
</div>

  <div id='newsletter-email-invalid' class='interactive-panel waiting-message' style='display:none'><h1>Oops!</h1><p>You have not entered a valid email address.</p><img src='img/failure.png' alt='waiting-image' class='waiting-spinner click-handler close-panel'/>
</div>

  <div id='newsletter-error' class='interactive-panel waiting-message click-handler close-panel' style='display:none'><img src='img/failure.png' alt='waiting-image' class='waiting-spinner'/><h1>Oops!</h1><p>We seem to have encountered an error:</p>
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
<div class='foreground-container'>
  <div class='foreground'>

    <div id='power-content'>
      
      <div id='paused-slide-container'></div>
      
      <div class='slide-background'> </div>
      
      <div id='slide1' class='slide centerslide'>
        <h1 class='subtitle'>creative</h1>
        <h1 class='title'>web development</h1>
      </div>
      
      <div id='slide2' class='slide centerslide'>
        <h1 class='subtitle'>on-line</h1>
        <h1 class='title'>marketing strategies</h1>
      </div>
      
      <div id='slide3'  class='slide centerslide'>
        <h1 class='subtitle'>digital</h1>
        <h1 class='title'>brand building</h1>
      </div>
      
      <div id='slide4' class='slide'>
        <div class='subslide subslide1'>
          <div class='slide-content'>
            <h1 class='title'>201 Digital</h1>
            <h1 class='subtitle'>The request has been fulfilled<h1>
              <h1 class='subtitle line2'>a new resource has been created</h1>
          </div>
          <img class='slide-img' src='img/201d-large.png' style='border:1px solid #fff'/>
        </div>
        <div class='subslide subslide2'>
          <div class='slide-content'>
            <h1 class='title'>Multiplatform</h1>
            <h1 class='subtitle'>cohesive approach to brand building</h1>
            <h1 class='subtitle line2'>and customer acquisition</h1>
          </div>
          <img class='slide-img' src='img/checklist.gif'/>
        </div>
        <div class='subslide subslide3'>
          <div class='slide-content'>
            <h1 class='title'>Search Engine</h1>
            <h1 class='subtitle'>rank building, AdWord campaigns</h1>
            <h1 class='subtitle line2'>ROI analysis and adjustment</h1>
          </div>
          <img class='slide-img' src='img/search.png'/>
        </div>
        <div class='subslide subslide4'>
          <div class='slide-content'>
            <h1 class='title'>Social Media</h1>
            <h1 class='subtitle'>viral marketing campaigns,</h1>
            <h1 class='subtitle line2'>custom application development</h1>
          </div>
          <img class='slide-img' src='img/social.png'/>
        </div>
        <div class='subslide subslide5'>
          <div class='slide-content'>
            <h1 class='title'>Email Marketing</h1>
            <h1 class='subtitle'>list management, content development</h1>
            <h1 class='subtitle line2'>brand and product placement</h1>
          </div>
          <img class='slide-img' src='img/email.png'/>
        </div>
        <div class='subslide subslide6'>
          <div class='slide-content'>
            <h1 class='title'>Mobile Marketing</h1>
            <h1 class='subtitle'>web site adaptation
            <h1 class='subtitle line2'>and brand building apps</h1>
          </div>
          <img class='slide-img' src='img/mobile.png'/>
        </div>
      </div>
    </div>
    <div id='slide-buttons'>
      <div id='button1' class='switch slide-button active'><input type='hidden' value='1'>&nbsp;</div>
      <div id='button2' class='switch slide-button'><input type='hidden' value='2'>&nbsp;</div>
      <div id='button3' class='switch slide-button'><input type='hidden' value='3'>&nbsp;</div>
      <div id='button4' class='switch slide-button'><input type='hidden' value='4'>&nbsp;</div>
      <div id='button5' class='switch slide-button'><input type='hidden' value='5'>&nbsp;</div>
      <div id='button6' class='switch slide-button'><input type='hidden' value='6'>&nbsp;</div>
      <div id='button7' class='switch slide-button'><input type='hidden' value='7'>&nbsp;</div>
      <div id='button8' class='switch slide-button'><input type='hidden' value='8'>&nbsp;</div>
      <div id='button9' class='switch slide-button'><input type='hidden' value='9'>&nbsp;</div>
      <div id='button-pause' class='slide-button pause-button'>II&nbsp;</div>
    </div>

    <div id='main-content'>
      <div class='yui3-g'>

        <div class="yui3-u-1-3">
          <div class='content-container first'>
	    <div class='content-box-background'></div>
	    <div class='content-box-foreground media-feed-box'>
              <div class='media-feed-title'>
	        <img src='img/tweets-icon.png' class='media-feed-icon'/><h1 class='i201-tweets'>@ 201 Twitter</h1>
              </div>
	      <p><img class='icon-logo' src="img/201d-large.png" />Well its been an interesting week here at <a href='#sdfdsafsdfsdfd'>201Digital</a>
	  First of all we start a company called <a href='adsfdsfasdfdsafgds'>#Brighter</a></p>
              <div class='tweet-divider'></div>
              <p><img class='icon-logo' src='img/201d-large.png' />then we decide to do something completely different <a href='#gdsadf43t4'>#different</a></p>
              <div class='tweet-divider'></div>
              <p><img class='icon-logo' src='img/201d-large.png' />and start a company with some poncy name 201Digital. There is a plan to all the madness however <a href='34slgksdlg45'>#madness</a></p>
              <div class='tweet-divider'></div>
	    </div>
          </div>
        </div>

        <div class="yui3-u-1-3">

          <div class='content-container'>
	    <div class='content-box-background'>
	    </div>
	    <div class='content-box-foreground media-feed-box'>
	      <div class='media-feed-title'>
	        <img src='img/blog-icon.png' / class='media-feed-icon'><h1 class='i201-blog'>@ 201 Blog</h1>
              </div>
	      <p>201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.</p>	      <p>201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.</p>	      <p>201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.</p>
	    </div>
          </div>
        </div>

        <div class="yui3-u-1-3">  
          
          <div class='content-container last'>
	    <div class='content-box-background'>
	  </div>
	    <div class='content-box-foreground media-feed-box'>
	      <div class='media-feed-title'>
	        <img src='img/latest-icon.png' class='media-feed-icon'/><h1 class='i201-latest'>@ 201 News</h1>
              </div>
	      <p>Get our bi-weekly catch up of the latest marketing trends and campaigns from across the Net.</p>
	      
	    </div>
          </div>
        </div>
      </div><!-- end yiu3-grid -->
    </div><!-- end main content -->
  </div> <!-- foreground -->
</div>  <!-- foreground container -->
  <script language='javascript' src='js/verimail.min.js'></script>
  <script language='javascript' src='js/slideshow.js'></script>

  <?php

  html_footer() ?>
