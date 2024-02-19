<?php
get_header();
?>

<main class="section container-content">
    <?php $category = get_queried_object(); ?>
    <h2 class="text-color1 text-center"><?php echo $category->name; ?></h2>
    <ul class="grid-list">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/topics');
        endwhile;

        ?>

    </ul>

</main>

<?php
get_footer();
?>