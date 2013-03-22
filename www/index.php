<?php include "core.inc.php";

html_header('','');

?>
<div id='main-content-container' class='page-container'>

  <div id='power-message-container'>
  
  <div id='slide-buttons'>
  <div id='button1' class='slide-button active'></div>
  <div id='button2' class='slide-button'></div>
  <div id='button3' class='slide-button'></div>
  <div id='button4' class='slide-button'></div>
  </div>
  
  <div id='slide1' class='yellow slide'>
  <div class='power-message'>
  <h1 class='power-title'>join us in a toast</h1>
  <h2 class='power-subtitle'>to success!</h2>
  <p>201 Digital launch their new brand and bring with them over 20 years of internet marketing experience.</p><p><button class='more-info'>Read More</button></p>
  </div>
  <div class='power-image'>
  <img src='img/toast.png' />
  </div>
  </div>


  <div id='slide2' class='red slide hidden'>
  <div class='power-message'>
  <h1 class='power-title small'>build</h1>
  <h1 class='power-title medium'>your</h1>
  <h1 class='power-title large'>brand</h1>
  <h1 class='power-subtitle massive'>awareness</h1>

  <p><button class='more-info'>Find out more</button></p>
  </div>
  <div class='power-image'>
  <img src='img/getnoticed.jpg' />
  </div>
  </div>

  <div id='slide3' class='blue slide hidden'>
  <div class='power-message'>
  <h1 class='power-title'>target your marketing</h1>
  <h2 class='power-subtitle'>with precision advertising</h2>
  <p><button class='more-info'>Find out more</button></p>
  </div>
  <div class='power-image'>
  <img src='img/targetted.png' />
  </div>
  </div>

  <div id='slide4' class='purple slide hidden'>
  <div class='power-message'>
  <h1 class='power-title'>engage with<br />your customers</h1>
  <h2 class='power-subtitle'>in new and exciting ways</h2>
  <p><button class='more-info'>Find out more</button></p>
  </div>
  <div class='power-image'>
  <img src='img/mobile.png' />
  </div>
  </div>
  
  <div id='power-message-shadow-container'>
  <span class='power-message-shadow yellow'></span>
  <span class='power-message-shadow red hidden'></span>
  <span class='power-message-shadow blue hidden'></span>
  <span class='power-message-shadow purple hidden'></span>
  </div>
  
  </div> <!-- power message container -->
  
  <div class='media-rule-top'></div>

  <?php include_media_channels()?>
  															
			 <div class='media-rule-bottom'></div>
			 
  </div> <!-- main content container -->
  <script language='javascript' src='js/slideshow.js'></script>
  <?php html_footer() ?>
