<?php
get_header(); ?>

    <div id="primary" class="content-area"> 

        <main id="main" class="site-main">

            <div id="single-post-container" class="container">

                <div class="row">

                    <div id="single-post" class="col-md-<?php echo sterling_get_container_width(); ?>">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div id="single-post-title">

                                <?php if ( has_post_thumbnail() &&
                                           get_theme_mod( 'sterling_single_page_img_toggle', 'on' ) == 'on') : ?>

                                    <div id="single-post-title-img" style="background-image: url( <?php echo get_the_post_thumbnail_url(); ?> )">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </div>

                                <?php endif; ?>

                                <div id="single-post-title-text">

                                    <?php if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' ) : ?>

                                        <a href="<?php echo get_the_author_meta( 'user_url' ); ?>">
                                            By <?php echo get_the_author_meta( 'display_name' ); ?>
                                        </a>

                                    <?php endif; ?>

                                     <?php if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' && 
                                                get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' ) : ?>

                                        <span></span>

                                    <?php endif; ?>
                                    <?php if ( get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' ) : ?>

                                        <p><?php echo get_the_date( 'm/d/Y' ); ?></p>

                                    <?php endif; ?>
                                    <?php if ( get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'on' &&
                                               get_theme_mod( 'sterling_single_page_comments_toggle', 'on' ) == 'on' ) : ?>

                                        <span></span>

                                    <?php endif; ?>

                                    <?php if ( get_theme_mod( 'sterling_single_page_author_toggle', 'on' ) == 'on' &&
                                               get_theme_mod( 'sterling_single_page_comments_toggle', 'on' ) == 'on' &&
                                               get_theme_mod( 'sterling_single_page_date_toggle', 'on' ) == 'off') : ?>

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

                                    <?php $tags = get_the_tags(); ?> 

                                    Tags: 

                                    <?php if ( get_the_tags() ) : ?>

                                        <?php foreach ( $tags as $tag ) : ?>

                                            <a class="tag-btn" href="<?php bloginfo( 'url' );?>/tag/<?php echo ( $tag->slug );?>">
                                                     <?php echo ( $tag->name ) . ', '; ?>
                                            </a>

                                        <?php endforeach; ?>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                            <?php if ( get_theme_mod( 'sterling_single_page_about_author_toggle', 'on' ) == 'on' ) : ?>

                                <div id="single-post-author-info">

                                    <div id="single-post-author-img" style="background-image: url( <?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), 64 ) ) ?> ) ">
                                    </div>

                                    <div id="single-post-author-title">
                                        
                                        <h4>
                                            <?php esc_html_e( 'About '); ?><?php the_author_meta( 'display_name' ); ?>
                                        </h4>
                                        
                                        <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                        
                                            <p>
                                                <?php the_author_meta( 'description' ); ?>
                                            </p>
                                            
                                        <?php endif; ?>

                                    </div>

                                </div>

                            <?php endif; ?>

                            <?php // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop. ?>

                    </div>

                    <div id="single-post-sidebar" class="col-md-3">

                        <?php get_sidebar(); ?>

                    </div>

                </div>    

            </div>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php

get_footer();
