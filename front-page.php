<?php
get_header();
?>
<div class="home-img">
    <?php the_post_thumbnail(); ?>
    <div class="content">
        <div class="box">
            <h1 class="text-center text-color1">Welcome to <?php echo get_bloginfo('name'); ?></h1>
            <div class="text-center">
                <button class="btn-primary"><a href="/topics">Get Started</a></button>
            </div>
        </div>
    </div>
</div>
<main class="container-content section">
    <div>
        <h1 class="text-center text-color1">Posts</h1>
        <div class="swiper">
            <ul class="grid-list swiper-wrapper">
                <?php
                // Query for blog posts
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                );
                $topics = new WP_Query($args);

                // Check if there are posts
                if ($topics->have_posts()) :
                    while ($topics->have_posts()) : $topics->the_post();
                        get_template_part('template-parts/topics-slide');
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <li>Topics not found.</li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
    <div>
        <div class="pt-50 pb-20">
            <h1 class="text-center text-color1">Moderators</h1>
        </div>
        <ul class="grid-list">
            <?php
            // Query for moderators
            $args = array(
                'post_type' => 'thetopic_moderators',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );
            $moderators = new WP_Query($args);

            // Check if there are moderators
            if ($moderators->have_posts()) :
                while ($moderators->have_posts()) : $moderators->the_post();
                    get_template_part('template-parts/moderators_part');
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <li>Moderators not found.</li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <div class="pt-50 pb-20">
        <h1 class="text-center text-color1">Contact</h1>
    </div>
    <?php
    // Query for moderators
    $args = array(
        'post_type' => 'thetopic_ubication',
        'posts_per_page' => -1,
        'order' => 'DESC',
    );
    $moderators = new WP_Query($args);

    get_template_part('template-parts/contact_part');

    ?>
    </div>
</main>
<?php
get_footer();
?>