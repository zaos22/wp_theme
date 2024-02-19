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
    <h1 class="text-center text-color1">Some Posts</h1>
<div class="swiper">
    <ul class="grid-list swiper-wrapper">
        <?php
        // Creamos una nueva instancia de WP_Query
        $args = array(
            'post_type' => 'post', // Solo queremos entradas del blog
            'posts_per_page' => -1, // Mostrar todas las entradas del blog
            'order' => 'DESC', // Ordenar las entradas de más recientes a más antiguas
        );
        $query = new WP_Query($args);

        // Verificamos si hay entradas
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/topics-slide');
            endwhile;
            wp_reset_postdata(); // Restablecemos los datos de la consulta
        else :
            // Si no hay entradas disponibles
            ?>
            <li>No se encontraron entradas.</li>
        <?php
        endif;
        ?>
    </ul>
</div>

</main>

<?php
get_footer();
?>