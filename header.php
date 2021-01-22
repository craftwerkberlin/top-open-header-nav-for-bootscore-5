<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Bootscore
	 */
	
	?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Loads the internal WP jQuery -->
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="preloader" class="align-items-center justify-content-center position-fixed">
        <div id="status" class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="to-top"></div>

    <div id="page" class="site">

        <header id="masthead" class="site-header">

            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/logo/logo.svg" alt="logo" class="logo"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="toggler-icon-animated"><span></span><span></span><span></span><span></span></div>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'primary',
                                'depth'             => 3,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse justify-content-end',
                                'container_id'      => 'navbarSupportedContent',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
				        ?>
                    </div>
                </div>
            </nav>

            <style>
                .navbar-toggler {
                    padding: 0 !important;
                    border: none !important;
                    margin-right: -1px;
                    z-index: 9
                }

                .navbar-toggler:focus {
                    outline: 0 dotted;
                    outline: 0 auto -webkit-focus-ring-color
                }

                .toggler-icon,
                .toggler-icon-animated {
                    width: 25px;
                    height: 17px;
                    position: relative;
                    -webkit-transform: rotate(0);
                    -moz-transform: rotate(0);
                    -o-transform: rotate(0);
                    transform: rotate(0);
                    -webkit-transition: .5s ease-in-out;
                    -moz-transition: .5s ease-in-out;
                    -o-transition: .5s ease-in-out;
                    transition: .5s ease-in-out;
                    cursor: pointer;
                    z-index: 1
                }

                .toggler-icon span,
                .toggler-icon-animated span {
                    display: block;
                    position: absolute;
                    height: 3px;
                    width: 100%;
                    border-radius: 9px;
                    opacity: 1;
                    left: 0;
                    -webkit-transform: rotate(0);
                    -moz-transform: rotate(0);
                    -o-transform: rotate(0);
                    transform: rotate(0);
                    -webkit-transition: .25s ease-in-out;
                    -moz-transition: .25s ease-in-out;
                    -o-transition: .25s ease-in-out;
                    transition: .25s ease-in-out
                }

                .toggler-icon span:nth-child(1),
                .toggler-icon-animated span:nth-child(1) {
                    top: 0
                }

                .toggler-icon span:nth-child(2),
                .toggler-icon span:nth-child(3),
                .toggler-icon-animated span:nth-child(2),
                .toggler-icon-animated span:nth-child(3) {
                    top: 7px
                }

                .toggler-icon span:nth-child(4),
                .toggler-icon-animated span:nth-child(4) {
                    top: 14px
                }

                .toggler-icon-animated.open span:nth-child(1),
                .toggler-icon-animated.open span:nth-child(4) {
                    top: 11px;
                    width: 0%;
                    left: 50%
                }

                .toggler-icon-animated.open span:nth-child(2) {
                    -webkit-transform: rotate(45deg);
                    -moz-transform: rotate(45deg);
                    -o-transform: rotate(45deg);
                    transform: rotate(45deg)
                }

                .toggler-icon-animated.open span:nth-child(3) {
                    -webkit-transform: rotate(-45deg);
                    -moz-transform: rotate(-45deg);
                    -o-transform: rotate(-45deg);
                    transform: rotate(-45deg)
                }

                .toggler-icon-animated span {
                    background-color: var(--bs-secondary);
                }

            </style>

            <script>
                jQuery(document).ready(function($) {
                    // Close toggler on click nav-link
                    $('.navbar-nav>li>a:not(.dropdown-toggle), a.dropdown-item').on('click', function() {
                        $('.toggler-icon-animated.open').removeClass('open')
                    });

                    // Close toggler on click / touch outside
                    $('.site-content, .opac, .menu-header').on('click touchstart', function() {
                        $('.toggler-icon-animated.open').removeClass('open')
                    });

                    // CSS Toggler
                    $('.navbar-toggler').on('click', function() {
                        $('.toggler-icon-animated').toggleClass('open')
                        //$('.opac').toggleClass('visible')
                    });
                });

            </script>

        </header><!-- #masthead -->

        <?php bootscore_ie_alert(); ?>
