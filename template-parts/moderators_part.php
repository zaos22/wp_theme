<?php

while (have_posts()) : the_post();
    the_title('<h1 class="text-center text-color1">', '</h1>');
    if (has_post_thumbnail()) {
        the_post_thumbnail('full', array('class' => 'image_about_us'));
    }

    if(is_single()) {
    $joinedInDate = get_field('date'); ?>
    <p class="info-moderator"><?php the_field('joined_in'); ?> - <?php echo $joinedInDate; ?></p>
<?php
    }
    the_content();

endwhile;
