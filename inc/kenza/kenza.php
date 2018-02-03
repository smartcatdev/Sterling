<?php

/**
 * Enqueue scripts and styles.
 */
function kenza_scripts() {
    
    $fonts = kenza_fonts();
    
    wp_enqueue_style( 'kenza-style', get_stylesheet_uri() );
    
    // Google Fonts Enqueue
    if( array_key_exists( get_theme_mod( 'kenza_font_primary', 'Trirong, serif' ), $fonts ) && array_key_exists ( get_theme_mod( 'kenza_font_body', 'Titillium Web, sans-serif' ), $fonts ) ) :
        wp_enqueue_style( 'kenza-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'kenza_font_primary', 'Trirong, serif' ) ] . '|' . $fonts[ get_theme_mod( 'kenza_font_body', 'Titillium Web, sans-serif' ) ] ), array(), KENZA_VERSION );
    endif;
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', null, KENZA_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', null, KENZA_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/inc/css/animate.css', null, KENZA_VERSION );
    wp_enqueue_style( 'kenza-custom', get_template_directory_uri() . '/inc/css/custom.css', null, KENZA_VERSION );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array("jquery"), KENZA_VERSION );
    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array("jquery"), KENZA_VERSION );
    wp_enqueue_script( 'jquery-bigSlide', get_template_directory_uri() . '/inc/js/bigSlide.min.js', array("jquery"), KENZA_VERSION );
    wp_enqueue_script( 'kenza-parallax', get_template_directory_uri() . '/inc/js/plx.js', null, KENZA_VERSION );
    wp_enqueue_script( 'kenza-custom', get_template_directory_uri() . '/inc/js/custom.js', array("jquery"), KENZA_VERSION );

    wp_localize_script( 'kenza-custom', 'kenzaTheme', array(
        'headerDesktopHeight'       => intval( get_theme_mod( 'kenza_custom_header_height_desktop', 96 ) ),
        'templateDirectory'         => get_template_directory_uri(),
                
    ) );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'kenza_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kenza_widgets_init() {
    
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'kenza' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'kenza' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer', 'kenza' ),
        'id'            => 'footer',
        'description'   => esc_html__( 'Add widgets here.', 'kenza' ),
        'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section></div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    
}
add_action( 'widgets_init', 'kenza_widgets_init' );

function kenza_hex2rgba( $color, $opacity = false ) {
 
    $default = 'rgb(0,0,0)';
    
    // Return default if no color provided
    if ( empty( $color ) ) { return $default; }
    
    // Sanitize $color if "#" is provided 
    if ( $color[0] == '#' ) { $color = substr( $color, 1 ); }
    
    // Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
    
    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );
    
    // Check if opacity is set(rgba or rgb)
    if( $opacity ) {
        
        if( abs( $opacity ) > 1 ) { $opacity = 1.0; }
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        
    } else {
        
        $output = 'rgb('.implode(",",$rgb).')';
        
    }
    
    // Return rgb(a) color string
    return $output;
        
}

function kenza_custom_css() { ?>

    <style type="text/css">
        
        /*¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
            BODY FONTS
        ________________________________________________________________________________________________*/
        
        #top-bar, 
        #header-panel *, 
        h1,h2,h3,h4,h5,h6, 
        .site-title a {
             font-family: <?php echo esc_attr( get_theme_mod( 'kenza_font_primary', 'Trirong, serif') ); ?>;
        }
        
        p, 
        body, 
        div, 
        input, 
        textarea {
            font-family: <?php echo esc_attr( get_theme_mod( 'kenza_font_body', 'Titillium Web, sans-serif') ); ?>;
        }
        
        /*¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
            BODY COLORS
        ________________________________________________________________________________________________*/
        
        <?php $skin_color       = esc_attr( kenza_hex2rgba( get_theme_mod( 'kenza_skins_color', 'e5bc6e' ) ) ); ?>
        <?php $skin_hover_color = esc_attr( kenza_hex2rgba( get_theme_mod( 'kenza_skins_color', 'e5bc6e' ), 0.65 ) ); ?>
        
        h1,h2,h3,h4,h5,h6,
        th,
        .site-info a,
        #wp-calendar a, 
        #header-panel-content span, 
        a, 
        a:visited, 
        a:hover, 
        .tag-btn, 
        caption, 
        #site-branding .site-title a, 
        #mobile-menu #menu .menu-primary-container #primary-menu li:hover.menu-item-has-children:before {
            color: <?php echo $skin_color; ?>;
        }
        
        .current-menu-item > a,
        #primary-menu > li.current-menu-ancestor > a,
        #top-bar .menu-primary-container #primary-menu li > .sub-menu > li > .sub-menu > li:hover a {
            color: <?php echo $skin_color; ?> !important;
        }
        
        /*.header-icon,*/ 
        .read-more-btn, 
        .custom-footer-social-icon, 
        .page-numbers.current,
        input[type="submit"], 
        .not-found-text a, 
        #search-icon, 
        .btn-kenza.primary {
            background-color: <?php echo $skin_color; ?>;
            color: #ffffff;
        }
        
        #blog-info .divider, 
        #content-divider, 
        #single-post-title span, 
        #scrolltotop-btn,
        .kenza-footer-calltoaction{
            background: <?php echo $skin_color; ?>;
        }
        
        #scrolltotop-btn:hover {
            background: <?php echo $skin_hover_color; ?>
        }
        
        #single-post-sidebar section, 
        #page-sidebar section, 
        #search-sidebar section {
            border: 2px solid <?php echo $skin_color; ?>;
        }
        
        .comment-list {
            border: 1px solid <?php echo $skin_color; ?>;
        }
        
        .comment-list > li:not(:last-child) {
            border-bottom: 2px solid <?php echo $skin_color; ?>;
        }
        
        #single-post-sidebar section:after, 
        #page-sidebar section:after, 
        #search-sidebar section:after {
            border-top-color:  <?php echo $skin_color; ?>;
        }
        
        .read-more-btn:hover, 
        .custom-footer-social-icon:hover, 
        .page-numbers:hover, 
        input[type=submit]:hover, 
        .not-found-text a:hover,
        .btn-kenza.primary:hover,
        #search-icon:hover {
            background-color: <?php echo $skin_hover_color; ?>
        }
        
        #main-navigation a:hover, 
        #header-panel-links a:hover {
            color: <?php echo $skin_color; ?>;
        }
            
        /*¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
            HEADER BAR HEIGHTS
        ________________________________________________________________________________________________*/
            
        @media (min-width:992px) {
            #top-bar .row {
               height: <?php echo intval( get_theme_mod( 'kenza_custom_header_height_desktop', 96 ) ); ?>px;   
            }  
            #site-branding img {
               max-height: <?php echo intval( get_theme_mod( 'kenza_custom_header_height_desktop', 96 ) ); ?>px;   
            }  
        }

        @media (max-width:991px) {
            #top-bar .row {
               height: <?php echo intval( get_theme_mod( 'kenza_custom_header_height_mobile', 64 ) ); ?>px;
            }   
            #site-branding img {
               max-height: <?php echo intval( get_theme_mod( 'kenza_custom_header_height_mobile', 64 ) ); ?>px;   
            }  
        }
        
        /*¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
            CUSTOM LOGO HEIGHT
        ________________________________________________________________________________________________*/
        
        <?php if ( get_theme_mod( 'kenza_custom_logo_height_toggle', 'off' ) == 'on' ) : ?>
        
            #site-branding img {
                height: <?php echo intval( get_theme_mod( 'kenza_custom_logo_height', 96 ) ); ?>px;
            }
        
        <?php endif; ?>
        
    </style>
    
    <?php 
    
}
add_action('wp_head', 'kenza_custom_css');

/**
 * Returns all available fonts as an array
 * 
 * @return array of fonts
 */

if( !function_exists( 'kenza_fonts' ) ) {

    function kenza_fonts(){

        $font_family_array = array(

            'Abel, sans-serif'                                  => 'Abel',
            'Arvo, serif'                                       => 'Arvo:400,400i,700',
            'Bangers, cursive'                                  => 'Bangers',
            'Courgette, cursive'                                => 'Courgette',
            'Domine, serif'                                     => 'Domine',
            'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
            'Droid Sans, sans-serif'                            => 'Droid+Sans:400,700',
            'Economica, sans-serif'                             => 'Economica:400,700',
            'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
            'Itim, cursive'                                     => 'Itim',
            'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
            'Lobster Two, cursive'                              => 'Lobster+Two',
            'Lora, serif'                                       => 'Lora',
            'Lilita One, cursive'                               => 'Lilita+One',
            'Montserrat, sans-serif'                            => 'Montserrat:400,700',
            'Noto Serif, serif'                                 => 'Noto+Serif',
            'Old Standard TT, serif'                            => 'Old+Standard+TT:400,400i,700',
            'Open Sans, sans-serif'                             => 'Open Sans',
            'Open Sans Condensed, sans-serif'                   => 'Open+Sans+Condensed:300,300i,700',
            'Orbitron, sans-serif'                              => 'Orbitron',
            'Oswald, sans-serif'                                => 'Oswald:300,400',
            'Poiret One, cursive'                               => 'Poiret+One',
            'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
            'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
            'Raleway, sans-serif'                               => 'Raleway:200,300,400,500,700',
            'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
            'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
            'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
            'Shrikhand, cursive'                                => 'Shrikhand',
            'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
            'Teko, sans-serif'                                  => 'Teko:300,400,600',
            'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
            'Trirong, serif'                                    => 'Trirong:400,700',
            'Ubuntu, sans-serif'                                => 'Ubuntu',
            'Vollkorn, serif'                                   => 'Vollkorn:400,400i,700',
            'Voltaire, sans-serif'                              => 'Voltaire',

        );

        return apply_filters( 'kenza_fonts', $font_family_array );

    }
    
}

/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param boolean $include_pages
 * @return array of posts
 */
function kenza_all_posts_array( $include_pages = false ) {
    
    $posts = get_posts( array(
        'post_type'        => $include_pages ? array( 'post', 'page' ) : 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));
    
    $posts_array = array(
        'none'  => __( 'None', 'kenza' ),
    );
    
    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

/**
 * Creates header using images from Custom Header
 * @param string $details Extra info to print into header
 */
add_action( 'kenza_header_panel', 'kenza_get_header_panel' );
function kenza_get_header_panel( ) { 


    /**
     * Theme Integration with Smartcat Slider plugin
     * https://wordpress.org/plugins/smartcat-video-image-slider/
     */
    $post_id = null;
    
    if( is_home() ){
        
        $post_id = get_option( 'page_for_posts' );
        
    }else {
        
        $post_id = get_the_ID();
        
    }
    
    if ( get_post_meta( $post_id, 'scslider_toggle', true ) == 'on' ) {
        
        do_action( 'render_scslider', true );
        return;
        
    }
    // ------- end
    
    if ( ( is_home() || is_front_page() || is_archive() || is_search() ) && has_header_image() ) : ?>
        
        <?php $image = get_header_image(); ?>
    
        <div id="header-panel" class="container-fluid" style="height: <?php echo esc_attr( get_theme_mod( 'kenza_header_height', 50 ) ); ?>vh">

            <div class="row ">

                <div class="parallax" data-plx-img="<?php echo esc_url( $image ); ?>" style="height: <?php echo esc_attr( get_theme_mod( 'kenza_header_height', 50 ) ); ?>vh">
                
                    <div id="header-panel-content">

                        <div class="header-panel-inner">

                            <?php if( is_archive() ) : ?>

                                <h1 class="entry-title"><?php echo esc_attr( get_the_archive_title() ); ?></h1>

                            <?php elseif( is_search() ) : ?>

                                <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'kenza' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

                            <?php elseif( is_home() && ! is_front_page() ) : ?>

                                <h1 class="entry-title animated slideInDown"><?php echo esc_attr( single_post_title( null, false ) ); ?></h1>

                            <?php elseif( is_home() ) : ?>
                                
                                <h1 class="entry-title animated slideInDown"><?php bloginfo( 'name' ); ?></h1>
                                
                            <?php else : ?>

                                <h1 class="entry-title"><?php echo esc_attr( single_post_title( null, false ) ); ?></h1>

                            <?php endif; ?>

                            <div id="header-panel-links">

                                <?php

                                if( has_nav_menu( 'menu-secondary' ) ) :

                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-secondary',
                                        'menu_id'        => 'secondary-menu',
                                        'container_class'=> is_home() || is_front_page() ? 'animated slideInUp' : '',
                                    ) );
                                
                                elseif( current_user_can( 'edit_theme_options' ) ) : ?>
                                    
                                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php _e( 'Add a secondary menu ?', 'kenza' ); ?></a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>
            
            <?php if( is_front_page() && !is_home() ) : ?>
                <div class="header-angle">
                    <svg width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none"> <path d="M0 0 L50 90 L100 0 V100 H0" fill="#FFF"></path></svg>
                </div>
            <?php endif; ?>
            
        </div>
    
    <?php endif;
    
}


/**
 * Creates kenza custom footer
 */
function kenza_get_custom_footer() { ?>
    
    <?php 
    
    $social_urls['twitter']     = get_theme_mod( 'kenza_twitter_link', '' );
    $social_urls['facebook']    = get_theme_mod( 'kenza_facebook_link', '' );
    $social_urls['instagram']   = get_theme_mod( 'kenza_instagram_link', '' );
    $social_urls['dribbble']    = get_theme_mod( 'kenza_dribbble_link', '' );
    $valid_social_urls          = 0;
    
    foreach ( $social_urls as $social_url ) {
        if ( !empty( $social_url ) ) : 
            $valid_social_urls++;
        endif;
    }
    
    ?>
    
    <?php if ( is_active_sidebar( 'footer' ) || $valid_social_urls > 0 ) : ?>
    
        <div class="container-fluid" id="custom-footer">

            <div class="row">

                <div class="container">

                    <div class="row">

                        <div id="custom-footer-social-icons">

                            <?php if ( !empty( $social_urls['twitter'] ) ) : ?>

                                <a href="<?php echo esc_url( $social_urls['twitter'] ); ?>">
                                    <div class="custom-footer-social-icon">

                                        <i class="fa fa-twitter fa-2x"></i>

                                    </div>
                                </a>

                            <?php endif; ?>

                            <?php if ( !empty( $social_urls['facebook'] ) ) : ?>

                                <a href="<?php echo esc_url( $social_urls['facebook'] ); ?>">
                                    <div class="custom-footer-social-icon">

                                        <i class="fa fa-facebook fa-2x"></i>

                                    </div>
                                </a>

                            <?php endif; ?>

                            <?php if ( !empty( $social_urls['instagram'] ) ) : ?>

                                <a href="<?php echo esc_url( $social_urls['instagram'] ); ?>">
                                    <div class="custom-footer-social-icon">

                                        <i class="fa fa-instagram fa-2x"></i>

                                    </div>
                                </a>

                            <?php endif; ?>

                            <?php if ( !empty( $social_urls['dribbble'] ) ) : ?>

                                <a href="<?php echo esc_url( $social_urls['dribbble'] ); ?>">  
                                    <div class="custom-footer-social-icon">

                                        <i class="fa fa-dribbble fa-2x"></i>

                                    </div>
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if ( is_active_sidebar( 'footer' ) ) : ?>

                        <?php if ( $valid_social_urls > 0 ) : ?>
                    
                            <span id="custom-footer-divider"></span>
                        
                        <?php endif; ?>

                        <div class="row">

                            <div id="custom-footer-widgets">

                                <?php dynamic_sidebar( 'footer' ); ?>

                            </div>  

                        </div>

                    <?php endif; ?>

                </div>    

            </div>

        </div>
    
    <?php endif; ?>
        
<?php }


function kenza_get_scrolltotop() { ?>
    
    <span id="scrolltotop-btn">
        
        <i class="fa fa-chevron-up"></i>
        
    </span>
    
<?php }

function kenza_get_container_width() {
    
    return is_active_sidebar( 'sidebar' ) ? 8 : 12;
    
}

