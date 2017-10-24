<?php 

if ( has_post_thumbnail() ) :
    $thumbnail_image = get_the_post_thumbnail_url();
else :
    $thumbnail_image = get_theme_mod( 'kenza_blog_roll_default_image', get_template_directory_uri() . '/inc/images/blog_default.jpg' ); 
endif; 

?>

<div class="row">

    <a href="<?php the_permalink(); ?>">

        <div class="col-md-6 col-md-push-6" id="blog-img" style="background-image: url(<?php echo esc_url( $thumbnail_image ); ?>);">
        </div>

    </a>

    <div class="col-md-6 col-md-pull-6" id="blog-info">

        <div id="blog-info-content">

            <h2><?php the_title(); ?></h2>

            <?php if ( get_theme_mod( 'kenza_blog_date_toggle', 'on' ) == "on" ) : ?>

                <i>
                    <?php echo esc_html( date_i18n( get_option( 'date_format' ) ) ); ?>
                </i>

            <?php endif; ?>
            <?php if ( get_theme_mod( 'kenza_blog_date_toggle', 'on' ) == "on" && get_theme_mod( 'kenza_blog_comments_toggle', 'on' ) == "on"  ) : ?>

                <span class="divider"></span>

            <?php endif; ?>

            <?php if ( get_theme_mod( 'kenza_blog_comments_toggle', 'on' ) == "on" ) : ?>    

                <i><?php comments_number(); ?></i>

            <?php endif; ?>

            <p><?php the_excerpt(); ?></p>

            <a href="<?php the_permalink(); ?>" class="btn-kenza primary">
                <?php esc_html_e( 'Read More', 'kenza' ); ?>
            </a>

        </div>

    </div>
    
</div>