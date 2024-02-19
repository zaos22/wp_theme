<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header class="<?php echo is_front_page() ? 'header2' : 'header'; ?> <?php if(is_front_page()) echo 'fixed-header'; ?>">
        <div class="container-content navigation-bar">
            <div class="logo">
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
                </a>
            </div>

            <?php
            $menu = array(
                'theme_location' => 'first-menu',
                'container' => 'nav',
                'container_class' => 'first-menu',
            );
            wp_nav_menu($menu);
            ?>
        </div>
    </header>