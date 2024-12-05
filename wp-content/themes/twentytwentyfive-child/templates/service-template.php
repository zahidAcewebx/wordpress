<?php 
/* 
* Template Name: service Template
*
**/
get_header('new');
?>



<?php
    // Arguments for the custom query to fetch 'sliderbanner' posts
    $args = array(
        'post_type' => 'sliderbanner',
        'posts_per_page' => 1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);
    
    // Check if there are posts
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            
            // Display the image as a background and overlay the content on top of it
            echo '<div class="banner-container" style="background-image: url(\'http://localhost/zahid-tutor/wp-content/uploads/2024/11/data.jpg\');">';
            echo '<div class="banner-content">';
            
            // Display post title and content
            echo '<h2>' . get_the_title() . '</h2>'; // Display post title
            echo '<div class="post-content">';
            the_content(); // Display the content of each post
            echo '</div>'; // Closing content div
            
            echo '</div>'; // Closing banner-content div
            echo '</div>'; // Closing banner-container div
        }
    } else {
        echo 'No posts found.';
    }

    wp_reset_postdata();
?>
<div class="container">
<?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_content(); 
    endwhile;
  endif;
?>
</div>

<?php
    // Arguments for the custom query to fetch 'sliderbanner' posts
    $args = array(
        'post_type' => 'sliderbanner',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);
    
    // Check if there are posts
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            
            // Display the image as a background and overlay the content on top of it
            echo '<div class="banner-container" style="background-image: url(\'http://localhost/zahid-tutor/wp-content/uploads/2024/11/data.jpg\');">';
            echo '<div class="banner-content">';
            
            // Display post title and content
            echo '<h2>' . get_the_title() . '</h2>'; // Display post title
            echo '<div class="post-content">';
            the_excerpt(); // Display the content of each post
            echo '</div>'; // Closing content div
            
            echo '</div>'; // Closing banner-content div
            echo '</div>'; // Closing banner-container div
        }
    } else {
        echo 'No posts found.';
    }

    wp_reset_postdata();
?>
<?php 
$postId = get_the_ID();
$res = get_post_meta($postId,'our_services_banner_image', true);
echo $res;
?>



<?php get_footer(); ?>

