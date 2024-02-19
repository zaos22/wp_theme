<?php
/* 
    * Template Name: Moderators List
    */
get_header();
?>

<main class="container-content section">

    <?php
    get_template_part('template-parts/about_us_page');
    ?>
    
    <ul class="grid-list">
        <?php
        $args = array(
            'post_type' => 'thetopic_moderators',
        );

        $moderators = new WP_Query($args);

        while ($moderators->have_posts()) {
            $moderators->the_post();
        ?>
            <li class="card">
                <?php the_post_thumbnail(); ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php $joinedInDate = get_field('date'); ?>
                    <p><?php the_field('joined_in'); ?> - <?php echo $joinedInDate; ?></p>
                </div>
            </li>
        <?php
        }
        wp_reset_postdata();
        ?>
    </ul>
</main>

<?php
get_footer();
?>