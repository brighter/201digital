<?php include "core.inc.php";

html_header('','');

?>
<div id='main-content-container' class='page-container'>
  <div id='main-content'>

  <h1 class='title'>I would like to...</h1>

  <div id='home-button-container'>

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
  <img class='home-button-icon' src='img/icon-mobile.png' alt='mobile icon' />
  <h2>take my business</h2>
  <h1>mobile</h1>
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
  <div class='home-button home-button-hover dormant'></div>
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

  </div>

  </div>
  <div id='side-content'>

 <div id='side-content-background-b' class='side-content-background'></div>
  <div id='side-content-background-p' class='side-content-background background-off'></div>
  <div id='side-content-background-y' class='side-content-background background-off'></div>
<!-- <div id='side-content-background-y' class='side-content-background'></div>-->
  <div id='side-content-foreground'>
  <div id='mailing-list' class='side-content-box'>
  <h1>JOIN OUR MAILING LIST</h1>
  <p>Keep up to date with the latest trends, technology and gossip from across the net...</p>
  <form>
  <input type='email' name='signupemail' />
  <button name='signup'>Sign up</button>
  </div>



  <div id='latest-news' class='side-content-box'>
  <h1>LATEST NEWS</h1>
  <p>201 Digital wins contract with Microsoft to secure 1.5 million revenue over the next 2 weeks.</p><a href="item.php?1">read more</a>
  </div>



  <div id='from-our-blog' class='side-content-box'>
  <h1>FROM OUR BLOG</h1>
  <p>Well it's been an interesting week here at 201Digital. First of all we start a company called Brighter, then we decide to do something completely different and start a company with some poncy name 201Digital. There is a plan to all the madness however...</p><a href="item.php?1">read more</a>
  </div>
</div>

  </div>
</div>
<script language='javascript'>
  YUI().use("node",function(Y) {

      var	
	hoverButton = function(e) {
	
	var button = e.currentTarget.one(".home-button-hover");
	
	button.removeClass("dormant");
	
    },
    unHoverButton = function(e) {
      var button = e.currentTarget.one(".home-button-hover");
      button.addClass("dormant");
      
    };
      
    Y.one("#home-button-container").delegate("mouseover",hoverButton,"div.home-button-container");
    Y.one("#home-button-container").delegate("mouseout",unHoverButton,"div.home-button-container");
      
    });
</script>
<?php
  html_footer();
?>