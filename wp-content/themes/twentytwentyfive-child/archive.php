<?php 
// Wordpress child theme index.php file
get_header();
?>

<div class="container">
  <div class="row">
  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
  ?>
    <!-- first column -->
    <div class="col-md-4">
      <div class="article-card-wrapper">
          <a href="<?php the_permalink(); ?>" class="article-link">
              <div class="article-content-wrapper">
                <h1 class="article-main-heading"></h1>
                <div class="article-ini-content">
                  <?php  $content = get_the_content();
                         echo mb_strimwidth($content, 0, 215, '...');?> 
                </div>
                <div class="article-btn-wrapper">
                  <a href="<?php the_permalink(); ?>" class="article readmore">Read More</a>
                </div>
              </div>
          </a>
      </div>
    </div>
   <!-- first column -->

  <?php 
    endwhile;
    endif;
  ?>    
  </div>
</div>

 <div class="container">
  <div class="row">
   <div class="col-md-4">
   <div class="artical-card-wrapper">
     <div class="artical-content-wrapper">
      <h1 class="aritcal-main-heading"></h1>
      <div class="artical-ini-content">
        <div class="artical-btn-wrapper"></div>
      </div>
     </div>
   </div>
   
   </div>
  </div>
 </div>
      
   
<?php get_footer(); ?>

