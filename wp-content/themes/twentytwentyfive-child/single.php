<?php
get_header();  // This includes the header.php file

if ( have_posts() ) :  // Check if there are posts
    while ( have_posts() ) : the_post();  // Start the loop
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
            // Display the post title
            the_title( '<h1 class="entry-title">', '</h1>' );
            ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            // Display the post content
            the_content();

            // If there are any pages in the post, display pagination
            wp_link_pages();
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php
            // Display post metadata (like categories, tags, etc.)
            the_category( ', ' );
            the_tags( 'Tags: ', ', ' );
            ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->

<?php
    endwhile;  // End the loop
else :
    echo '<p>No posts found.</p>';
endif;

get_footer(); 