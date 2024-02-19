<?php
get_header();
?>

<main class="section container-content">

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