    <?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sterling
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
<div id="page" class="sterling-site-wrapper">
    
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sterling' ); ?></a>

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
                            <?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                            endif;

                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                            <?php
                            endif; ?>
                                    
                    </div><!-- .site-branding -->

                    <div id="main-navigation" class="col-sm-6">
                        
                        
                        <div id="mobile-overlay" class="push"></div>
                        
                        <div id="mobile-menu">
                            
                            <a href="#menu" class="menu-link"><i class="fa fa-bars fa-2x"></i></a>
                            
                            <nav id="menu" class="panel" role="navigation">
                                
                                <a href="#menu" class="menu-link"><i class="fa fa-times"></i></a> 
                                
                                <?php wp_nav_menu( array(
                                     'theme_location' => 'menu-primary',
                                     'menu_id'        => 'primary-menu',
                                 ) ); ?>

                                <div id="mobile-menu-social-link">
                                    
                                    <a href="<?php echo esc_attr( get_theme_mod( 'sterling_location_link', '#' ) ) ?>">
                            
                                        <div class="header-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                            
                                     </a>
                        
                                    <div class="header-icon search-btn menu-link ">
                                        <i class="fa fa-search"></i>
                                    </div>

                                    <a href="<?php echo esc_attr( get_theme_mod( 'sterling_email_link', '#' ) ) ?>">

                                        <div class="header-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>

                                    </a>

                                </div>

                            </nav>

                        </div>
                        
                        <div id="main-navigation-wrapper">
                            
                            <nav id="site-navigation" class="main-navigation">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'sterling' ); ?></button>
                                    <?php
                                            wp_nav_menu( array(
                                                    'theme_location' => 'menu-primary',
                                                    'menu_id'        => 'primary-menu',
                                            ) );
                                    ?>
                            </nav><!-- #site-navigation -->
                            
                        </div>
                        
                    </div>
                    
                    <div id="header-icons" class="col-sm-3">
                    
                        <a href="<?php echo esc_attr( get_theme_mod( 'sterling_location_link', '#' ) ) ?>">
                            
                            <div class="header-icon">

                                <i class="fa fa-map-marker"></i>

                            </div>
                            
                        </a>
                        
                        <div class="header-icon search-btn">
                            
                            <i class="fa fa-search"></i>
                                                       
                        </div>
                        
                        <a href="<?php echo esc_attr( get_theme_mod( 'sterling_email_link', '#' ) ) ?>">
                            
                            <div class="header-icon">

                                <i class="fa fa-envelope"></i>

                            </div>
                            
                        </a>
                        
                    </div>
                                  
                </div>
                
            </div>
            
            <?php sterling_get_header_panel(); ?>
            
	</header><!-- #masthead -->

	<div id="content" class="site-content">
