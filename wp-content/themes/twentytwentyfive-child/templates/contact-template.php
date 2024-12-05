<?php 
/* 
* Template Name: contact Template
*
**/
get_header();
?>

<div class="container">
    <?php 
    $postId = get_the_ID();
    ?>
    <div class="row">
        <div class="content">
            <ul class="meta-list">
                <?php 
                $email = get_post_meta($postId, 'email', true);
                if ($email) {
                    echo '<li><strong>Email:</strong> ' . esc_html($email) . '</li>';
                }
                
                $phone_number = get_post_meta($postId, 'phone_number', true);
                if ($phone_number) {
                    echo '<li><strong>Phone Number:</strong> ' . esc_html($phone_number) . '</li>';
                }
                
                $maps = get_post_meta($postId, 'maps', true);
                if ($maps) {
                    echo '<li><strong>Maps:</strong> ' . esc_html($maps) . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

