<?php 
/* 
* Template Name: Learn Template
*
**/
get_header('new');
?>

<!-- <?php
    $args = array(
        'post_type' => 'sliderbanner',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);
    // echo "<pre>";
    // print_r($loop);
    // echo "</pre>";

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            echo get_the_title() . '<br>'; // Display post title for testing
            echo  the_content(). '<br>';
        }
    } else {
        echo 'No posts found.';
    }

    wp_reset_postdata();
?> -->

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

<?php get_footer(); ?>









