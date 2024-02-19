<?php
get_header();
?>

<main class="container-content section sidebar">
    <section class="main-content">
        <?php
        get_template_part('template-parts/moderators_part');
        ?>
    </section>
    <?php
    get_sidebar();
    ?>
</main>

<?php
get_footer();
?>