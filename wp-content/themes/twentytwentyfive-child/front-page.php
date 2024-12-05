<?php 
// Wordpress child theme index.php file
get_header();
?>


<?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      ?>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- <h2><?php the_title(); ?></h2> Display post title as a heading -->
            <div class="post-content">
              <?php the_content(); ?> <!-- Display the post content -->
            </div>
          </div>
        </div>
      </div>
      <?php
    endwhile;
  endif;
?>


<?php get_footer(); ?>