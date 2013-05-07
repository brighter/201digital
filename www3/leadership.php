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
          <div id='leadership-photos'>
          <div class='leadership-item'>
            <input type='hidden' name='leader' value='dan' />
          <img src="img/profile4.jpg" class='leadership-photo'/>
          </div>
          <div class='leadership-item'>
            <input type='hidden' name='leader' value='richard' />
          <img src="img/profile3.jpg" class='leadership-photo' />
          </div>
          <div class='leadership-item'>          
            <input type='hidden' name='leader' value='harry' />
          <img src="img/profile5.jpg" class='leadership-photo' />
          </div>
          <div class='leadership-item'>          
            <input type='hidden' name='leader' value='kelly' />
          <img src="img/profile1.jpg" class='leadership-photo' />
          </div>
          </div>
          <div id='leadership-instructions' class='bio-container'>
            <p class='instructions'>Click our picture for more information</p>
          </div>

          <div id='dan' class='bio-container hidden'>
            <p class='leader-name'>Daniel Garcia</p>
            <p class='leader-quote'>The Creative Genius</p>
            <p class='leader-text'>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          </div>


          <div id='richard' class='bio-container hidden'>
            <p class='leader-name'>Richard O'flynn</p>
            <p class='leader-quote'>The Internet Guru</p>
            <p class='leader-text'>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          </div>



          <div id='harry' class='bio-container hidden'>
            <p class='leader-name'>Harry Lal</p>
            <p class='leader-quote'>The Coding Ninja</p>
            <p class='leader-text'>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          </div>


          <div id='kelly' class='bio-container hidden'>
            <p class='leader-name'>Kelly Goldsmith</p>
            <p class='leader-quote'>The Master of Strategies</p>
            <p class='leader-text'>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- foreground -->
</div>  <!-- foreground container -->
  <script language='javascript' src='js/slideshow.js'></script>
  <?php

  html_footer() ?>
