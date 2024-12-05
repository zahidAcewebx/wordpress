<?php 
/****
 * Template Name: News
 * 
 */
get_header();
?>

<?php
       $args = array(
       'type'                     => 'post',
       'orderby'                  => 'name',
       'taxonomy'                 => 'category',
       );
       $categories = get_categories($args);
       echo '<ul>';
       foreach ($categories as $category) {
         $url = get_term_link($category);?>
          <li><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></li>
         <?php
       }
       echo '</ul>';
   ?>


<?php get_footer(); ?>