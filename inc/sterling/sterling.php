<?php

/**
 * Enqueue scripts and styles.
 */
function sterling_scripts() {
    
    // Load Fonts from array
    $fonts = sterling_fonts();

     // Primary Font Enqueue
    if( array_key_exists ( get_theme_mod( 'sterling_font_primary', 'Trirong, serif'), $fonts ) ) :
        wp_enqueue_style('google-font-primary', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'sterling_font_primary', 'Trirong, serif' ) ] ), array(), STERLING_VERSION );
    endif;
    // Body Font Enqueue
    if( array_key_exists ( get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif'), $fonts ) ) :
        wp_enqueue_style('google-font-body', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif' ) ] ), array(), STERLING_VERSION );
    endif;
    
    wp_enqueue_style( 'sterling-style', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrap css', get_template_directory_uri() . '/inc/css/bootstrap.min.css', null, STERLING_VERSION );

    wp_enqueue_style( 'fontawesome css', get_template_directory_uri() . '/inc/css/font-awesome.min.css', null, STERLING_VERSION );

    wp_enqueue_style( 'custom css', get_template_directory_uri() . '/inc/css/custom.css', null, STERLING_VERSION );

    wp_enqueue_script( 'sterling-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'sterling-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'bootstrap js', get_template_directory_uri() . '/inc/js/bootstrap.min.js', null, STERLING_VERSION );
    
    wp_enqueue_script( 'sticky js', get_template_directory_uri() . '/inc/js/jquery.sticky.js', null, STERLING_VERSION );

    wp_enqueue_script( 'custom js', get_template_directory_uri() . '/inc/js/custom.js', null, STERLING_VERSION );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'sterling_scripts' );

function sterling_custom_css() { ?>

    <style type="text/css">
        
        #top-bar, #header-panel *{
             font-family: <?php echo esc_attr( get_theme_mod( 'sterling_font_primary', 'Trirong, serif') ); ?>;
        }
        p {
            font-family: <?php echo esc_attr( get_theme_mod( 'sterling_font_body', 'Titillium Web, sans-serif') ); ?>;
        }
        
    </style>
    
    <?php 
    
}
add_action('wp_head', 'sterling_custom_css');

/**
 * Returns all available fonts as an array
 * 
 * @return array of fonts
 */
function sterling_fonts(){
    
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
    
    return $font_family_array;
}
/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param boolean $include_pages
 * @return array of posts
 */
function sterling_all_posts_array( $include_pages = false ) {
    
    $posts = get_posts( array(
        'post_type'        => $include_pages ? array( 'post', 'page' ) : 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));
    $posts_array = array(
        'none'  => __( 'None', 'sterling' ),
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
 * 
 */
function sterling_get_header_panel() { ?>
    
    <div id="header-panel" class="container-fluid" style="background: url(<?php header_image(); ?>) no-repeat center">
        
        <div class="row">
            
            <div id="header-panel-content">
                
                <h1>Wedding Photography</h1>
                
                <div id="header-panel-links">
                    
                    <a>Home</a>
                    <a>All Posts</a>
                    <h4>Wedding Photography</h4>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
<?php }

/**
 * Creates blog post output
 * 
 */
function sterling_get_blog_posts() {
    
    $blogs = wp_get_recent_posts(); 
    $ctr = 0; ?>   

<div class="container-fluid" id="blog-posts">

    <?php foreach( $blogs as $blog ) : ?>
    
        <div class="row">
            
            <?php if ( $ctr % 2 ) : ?>
            
                <div class="col-md-6 blog-img" style="background: url(<?php echo get_the_post_thumbnail_url( $blog[ "ID" ], 'full' )?>) center;">

                    <a href="<?php echo get_permalink( $blog[ "ID" ] ); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url( $blog[ "ID" ], 'full' ); ?>" >
                    </a>

                </div>
                
                <div class="col-md-6 blog-info">

                    <h2><?php echo $blog[ "post_title" ]; ?></h2>
                    <i><?php echo $blog[ "post_date" ] ?></i>

                    <i><?php echo $blog[ "comment_count" ] ?> Comments</i>

                    <p><?php echo get_the_excerpt(); ?></p>

                    <span class="read-more-btn">Read More</span>

                </div>

            <?php else: ?>
            
                <div class="col-md-6" id="blog-info">

                    <div id="blog-info-content">
                        
                        <h2><?php echo $blog[ "post_title" ]; ?></h2>
                        <i><?php echo $blog[ "post_date" ] ?></i>

                        <i><?php echo $blog[ "comment_count" ] ?> Comments</i>

                        <p><?php echo get_the_excerpt(); ?></p>

                        <span class="read-more-btn">Read More</span>
                        
                    </div>
                    
                </div>

                <div class="col-md-6" id="blog-img" style="background: url(<?php echo get_the_post_thumbnail_url( $blog[ "ID" ], 'full' )?>) center;">

                    <a href="<?php echo get_permalink( $blog[ "ID" ] ); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url( $blog[ "ID" ], 'full' ); ?>" >
                    </a>

                </div>
            
            <?php endif; ?>
            
            <?php $ctr++; ?> 
            
        </div>
    
    <?php endforeach; ?>    

</div>
    
<?php }