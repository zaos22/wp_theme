<?php

while (have_posts()) : the_post();
    if (is_page('contact')) {
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'image_about_us'));
        }
        the_content();
    } else {
        the_title('<h1 class="text-center text-color1">', '</h1>');
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'image_about_us'));
        }
        the_content();
    }
endwhile;
