<?php get_header(); ?>

<div id="primary" class="content-area"> 

    <main id="main" class="site-main">

        <div id="single-post-container" class="container">

            <div class="row">

                <div class="col-md-10 col-md-offset-1">

                    <div class="row">

                        <?php if ( get_post_meta( get_the_ID(), 'sterling_sidebar', true ) == 'sterling_lsidebar' ) : ?>

                            <div class="col-md-4" id="single-post-sidebar">

                                <?php get_sidebar(); ?>

                            </div>

                        <?php endif; ?>

                        <div id="single-post" class="col-md-<?php echo intval( sterling_get_container_width() ); ?>">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id="single-post-title">

                                    <?php
                                    if ( has_post_thumbnail() &&
                                            get_theme_mod( 'sterling_single_page_img_toggle', 'on' ) == 'on' ) :
                                        ?>

                                        <div id="single-post-title-img">
                                            <?php the_post_thumbnail( 'large' ); ?>
                                        </div>

                                    <?php endif; ?>

                                    <div id="single-post-title-text">
                                        
                                        
                                        <h1><?php the_title(); ?></h1>
                                        
                                        <?php if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' ) : ?>

                                            <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>">
                                                <?php _e( 'By', 'sterling' ); ?> <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                                            </a>

                                        <?php endif; ?>

                                        <?php
                                        if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' &&
                                                get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' ) :
                                            ?>

                                            <span></span>

                                        <?php endif; ?>

                                        <?php if ( get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' ) : ?>

                                            <p>
                                                <?php echo esc_html( date_i18n( get_option( 'date_format' ) ) ); ?>
                                            </p>

                                        <?php endif; ?>
                                        <?php
                                        if ( get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' &&
                                                get_theme_mod( 'sterling_single_page_comments_toggle', 'on' ) == 'on' ) :
                                            ?>

                                            <span></span>

                                        <?php endif; ?>

                                        <?php
                                        if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' &&
                                                get_theme_mod( 'sterling_single_page_comments_toggle', 'on' ) == 'on' &&
                                                get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'off' ) :
                                            ?>

                                            <span></span>

                                        <?php endif; ?>    

                                        <?php if ( get_theme_mod( 'sterling_single_page_comments_toggle', 'on' ) == 'on' ) : ?>

                                            <a href="#comments">
                                                <?php _e( get_comments_number() . ' Comments', 'sterling' ); ?>
                                            </a>

                                        <?php endif; ?>

                                    </div>

                                </div>

                                <div id="single-post-content">

                                    <?php echo get_the_content(); ?>

                                </div>

                                <span id="content-divider"></span>

                                <?php if ( has_tag() ) : ?>

                                    <div id="single-post-tags">
                                        <?php echo get_the_tag_list( __( 'Tags: ', 'sterling' ), ', ' ); ?>
                                    </div>

                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'sterling_single_page_about_author_toggle', 'on' ) == 'on' ) : ?>

                                    <div id="single-post-author-info">

                                        <div id="single-post-author-img">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                                        </div>

                                        <div id="single-post-author-title">

                                            <h4>
                                                <?php esc_html_e( 'About', 'sterling' ); ?> <?php the_author_meta( 'display_name' ); ?>
                                            </h4>

                                            <?php if ( get_the_author_meta( 'description' ) ) : ?>

                                                <p>
                                                    <?php the_author_meta( 'description' ); ?>
                                                </p>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop. 
                            ?>

                        </div>

                        <?php if ( get_post_meta( get_the_ID(), 'sterling_sidebar', true ) != 'sterling_lsidebar' ) : ?>

                            <div class="col-md-4" id="single-post-sidebar">

                                <?php get_sidebar(); ?>

                            </div>

                        <?php endif; ?>

                    </div>
                </div>

            </div>    

        </div>

    </main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
