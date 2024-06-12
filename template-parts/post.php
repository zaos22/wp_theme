<?php

while (have_posts()) : the_post();
    the_title('<h1 class="text-center text-color1">', '</h1>');
    if (has_post_thumbnail()) {
        the_post_thumbnail('full', array('class' => 'image_about_us'));
    }
?>
    <div class="meta-info">
        <p class="meta">
            <span>By: </span>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author_meta('display_name'); ?>
            </a>
        </p>

        <div class="category">
            <p class="meta">
                <span>Category: </span>
            </p>
            <p class="categories-name">
            <?php the_category(',') ?>
            </p>
        </div>

        <p class="meta">
            <span>Date: </span>
            <?php the_time(get_option('date_format')); ?>
        </p>
    </div>

<?php
    the_content();

    // Añadir sección de comentarios
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

endwhile;
?>
