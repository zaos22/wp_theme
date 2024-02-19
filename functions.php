<?php

// Includes

require get_template_directory() . '/includes/widgets.php';

function thetopic_setup()
{

    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'thetopic_setup');

function thetopic_menu()
{
    register_nav_menus(
        array(
            'first-menu' =>  __('First Menu', 'thetopic'),
            'second-menu' =>  __('Second Menu', 'thetopic'),
        )
    );
}

add_action('init', 'thetopic_menu');


function thetopic_scripts_style()
{
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    if (is_front_page()) {
        wp_enqueue_script('header-script', get_template_directory_uri() . '/js/header-scroll.js', array('jquery'), null, true);
    }
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.6');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.6', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('swiper-js'), true);
}

add_action('wp_enqueue_scripts', 'thetopic_scripts_style');

// Definir zona de widgets
function thetopic_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-color1">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'thetopic_widgets');

// Create Shortcodes

function thetopic_ubication_shortcode()
{
?>
    <div class="contact contact-form-align">
        <div class="contact-slogan">
            <h1>
                Tell us, how we can help you?
            </h1>
            <h2>
                If you have any questions, do not hesitate to contact us.
            </h2>
            <h3>
                Don't think about it too much. Go ahead.
            </h3>
        </div>
        <div class="contact-form-space">
            <?php
            echo do_shortcode('[contact-form-7 id="d4619f6" title="Contact Form"]');
            ?>
        </div>
    </div>
    <div class="map">
        <?php
        if (is_page('contact')) {
            the_field('ubication');
        }
        ?>
    </div>
<?php
}

add_shortcode('thetopic_ubication', 'thetopic_ubication_shortcode');
