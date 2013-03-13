<?php include "core.inc.php";

html_header('','');

?>
<div id='main-content-container' class='page-container'>
  <div id='internal-content'>

  <h1 class='title1'>you want to launch</h1>
  <h1 class='title2'>a successful web site</h1>
  <div id='body-content'><p>It can be a daunting prospect. Time, investment and sometimes the entire success of your venture can depend on it.</p>
  <p>We will help you face the challenges ahead, and provide you with a proven framework for success.</p>
  <p>We combine bold creativity, technical excellence and marketing prowess to give your project the leap start it needs.</p>
  <p>Find out more about our...</p>
</div><img src='img/websites.png'/>
  </div>
 <div class='more-info-container'><p><button class='more-info'>Framework for Success</button><button class='more-info'>Creativity</button><button class='more-info'>Techical Skills</button><button class='more-info'>Marketing Approach</button></p></div>
  <!--<div id='side-content'>

 <div id='side-content-background-b' class='side-content-background'></div>
  <div id='side-content-background-p' class='side-content-background background-off'></div>
  <div id='side-content-background-y' class='side-content-background background-off'></div>
<!-- <div id='side-content-background-y' class='side-content-background'></div>
  <div id='side-content-foreground'>
</div>

  </div>-->
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