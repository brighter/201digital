<?php 
include "core.inc.php";
html_header('','about');
?>
<div class='foreground-container'>
  <div class='foreground'>
    <div class='content-page-container'>
      <?php about_navigation('leadership'); ?>
      <div class='content-page'>
        <div class='content-page-background'></div>
        <div class='content-page-content'>
          <h1 class='title'>meet the team</h1>
          <div class='leadership-item'>
          <img src="img/profile4.jpg" class='leadership-photo' />
          <p>Dan 'the hog' Garcia</p>
          </div>
          <div class='leadership-item'>
          <img src="img/profile3.jpg" class='leadership-photo' />
          <p>Richard 'hawkins' O'flynn</p>
          </div>
          <div class='leadership-item'>          
          <img src="img/profile5.jpg" class='leadership-photo' />
          <p>Harry 'peacock' Lal</p>
          </div>
          <div class='leadership-item'>          
          <img src="img/profile2.jpg" class='leadership-photo' />
          <p>Shahid 'shady' Tarer </p>
          </div>
          <div class='leadership-item'>          
          <img src="img/profile1.jpg" class='leadership-photo' />
          <p>Kelly 'avin it large' O'flynn</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- foreground -->
</div>  <!-- foreground container -->

  <script language='javascript' src='js/slideshow.js'></script>
  <?php

  html_footer() ?>
