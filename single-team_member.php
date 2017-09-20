<?php get_header(); ?>

<div id="primary" class="content-area"> 

    <main id="main" class="site-main">

        <div id="single-post-container" class="container">

            <div class="row">

                <div id="single-post" class="col-md-<?php echo intval( sterling_get_container_width() ); ?>">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <div id="single-post-title">

                            <?php if ( has_post_thumbnail() ) : ?>
                            
                            <div id="single-post-title-img" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>)">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>

                            <?php endif; ?>
                            
                            <div id="single-post-title-text">

                                <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>">
                                    <?php _e( 'By', 'sterling' ); ?> <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                                </a>

                                <span></span>

                                <p>
                                    <?php echo esc_html( date_i18n( get_option( 'date_format' ) ) ); ?>
                                </p>

                                <span></span>

                                <a href="<?php echo esc_url( get_comment_link() ); ?>">
                                    <?php echo esc_html( get_comments_number() . ' ' ); ?><?php _e( 'Comments', 'sterling' ); ?>
                                </a>

                            </div>

                        </div>

                        <div id="single-post-content">

                            <?php echo get_the_content(); ?>

                        </div>

                        <span id="content-divider"></span>

                        <?php $tags = get_the_tags(); ?> 

                        <?php if ( !empty( $tags ) && is_array( $tags ) ) : ?>

                            <div id="single-post-tags">

                                <?php _e( 'Tags:', 'sterling' ); ?>

                                <?php foreach ( $tags as $tag ) : ?>

                                    <a class="tag-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>/tag/<?php echo ( $tag->slug ); ?>">
                                        <?php echo ( $tag->name ) . ', '; ?>
                                    </a>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>

                        

                        <div id="single-post-author-info">
                            <div id="single-post-author-img" style="background-image: url(<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), 64 ) ); ?>);">
                            </div>
                            <div id="single-post-author-title">
                                <h4>
                                    <?php _e( 'About ', 'sterling' ); ?><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                                </h4>
                                <p>
                                    <?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
                                </p>
                            </div>
                        </div>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop. 
                    ?>

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
