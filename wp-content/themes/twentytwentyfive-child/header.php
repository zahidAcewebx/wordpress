<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/zahid-tutor/wp-content/themes/twentytwentyfive-child/customstyle.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>
  <header class="site-main-header">
    <div class="container">
      <div class="row">
        <!-- Get dynamic logo here -->
        <div class="site-logo">
          <div class="site-logo-outer"></div>
        </div>
        <!-- Need to get wordpress dynamic menu here -->
        <div class="site-nav-bar">
          <?php 
            wp_nav_menu( array( 
              'theme_location' => 'header-top-menu','menu_class' => 'nav' ) ); 
          ?>
        </div>
        <!-- Need to get wordpress dynamic menu here -->

        <!-- we can add any addition buttons  -->
        <div class="header-top-btn"></div>
      </div>
    </div>
  </header>



  


