    <?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kenza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
    
<div id="page" class="kenza-site-wrapper">
    
    <header id="masthead" class="site-header">

        <div id="search-menu">

            <div id="search-menu-box">

                <div id="close-search-btn">

                    <i class="fa fa-times fa-2x"></i>

                </div>

                <?php get_search_form(); ?>

            </div>

        </div>

        <div id="top-bar" class="container-fluid">

            <div class="row">

                <div id="site-branding" class="col-sm-3">

                    <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) { ?>

                        <?php the_custom_logo(); ?>

                    <?php } else { ?>

                        <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php $description = get_bloginfo( 'description' ); ?>
                            
                        <?php if ( !empty( $description ) ) : ?>

                            <p class="site-description">
                                <?php echo esc_html( $description ); ?>
                            </p>

                        <?php endif; ?>

                    <?php } ?>

                </div><!-- .site-branding -->

                <div id="main-navigation" class="col-sm-6">

                    <div id="mobile-overlay" class="push">
                        <a href="#menu" class="menu-link">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/mobile-menu-close.png' ); ?>"/>
                        </a>
                        <div class="header-icon search-btn">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/images/lnr-magnifier.svg' ); ?>"/>
                        </div>
                    </div>

                    <a href="#menu" class="menu-link"><i class="fa fa-bars fa-2x"></i></a>

                    <div id="mobile-menu">

                        <nav id="menu" class="panel" role="navigation">

                            <?php wp_nav_menu( array(
                                 'theme_location' => 'menu-primary',
                                 'menu_id'        => 'primary-menu',
                             ) ); ?>

                            <div id="mobile-menu-social-link">

                                <?php if ( get_theme_mod( 'kenza_location_link', '' ) != '' ) : ?>

                                    <a href="<?php echo esc_url( get_theme_mod( 'kenza_location_link', '' ) ); ?>">

                                        <div class="header-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                    </a>

                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'kenza_email_link', '' ) != '' ) : ?>

                                    <a href="<?php echo esc_attr( get_theme_mod( 'kenza_email_link', '' ) ); ?>">

                                        <div class="header-icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>

                                    </a>

                                <?php endif; ?>

                            </div>

                        </nav>

                    </div>

                    <div id="main-navigation-wrapper">

                        <nav id="site-navigation" class="main-navigation">
                            
                            <?php if( has_nav_menu( 'menu-primary' ) ) :
                                
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-primary',
                                    'menu_id'        => 'primary-menu',
                                    'container'         => ''
                                ) );
                            
                                elseif( current_user_can( 'edit_theme_options' ) ) : ?>
                                    
                                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php _e( 'Add a primary menu', 'kenza' ); ?></a>
                                    
                                <?php else :
                            
                                    wp_page_menu();
                                    
                                endif; ?>
                            
                            <?php

                            ?>
                                
                        </nav><!-- #site-navigation -->

                    </div>

                </div>

                <div id="header-icons" class="col-sm-3">

                    <?php if ( get_theme_mod( 'kenza_location_link', '' ) != '' ) : ?>

                        <a href="<?php echo esc_url( get_theme_mod( 'kenza_location_link', '' ) ); ?>">

                            <div class="header-icon">

                                <i class="fa fa-map-marker"></i>

                            </div>

                        </a>

                    <?php endif; ?>

                    <div class="header-icon search-btn">

                        <i class="fa fa-search"></i>

                    </div>

                    <?php if ( get_theme_mod( 'kenza_email_link', '' ) != '' ) : ?>

                        <a href="<?php echo esc_attr( get_theme_mod( 'kenza_email_link', '' ) ); ?>">

                            <div class="header-icon">

                                <i class="fa fa-envelope"></i>

                            </div>

                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </header><!-- #masthead -->
    
    <?php do_action( 'kenza_header_panel' ); ?>

    <div id="content" class="site-content">
