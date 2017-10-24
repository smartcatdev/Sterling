<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kenza
 */

get_header(); ?>

    <section id="primary" class="content-area">

            <main id="main" class="site-main">

                <div class="container" id="search-results-list"> 

                    <div class="row search-page">

                        <div class="col-md-<?php echo intval( kenza_get_container_width() ); ?>">

                            <?php
                            if ( have_posts() ) : ?>

                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post(); ?>

                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>     
                                    </a>

                                    <p><?php the_excerpt(); ?></p>

                                <?php endwhile;

                                    the_posts_pagination( array( 'mid_size' => 1 ) );

                                else :

                                    get_template_part( 'template-parts/content', 'none' );

                            endif; ?>

                        </div>

                        <div id="search-sidebar" class="col-md-3">

                            <?php get_sidebar(); ?>

                        </div>

                    </div>

                </div>

            </main><!-- #main -->

    </section><!-- #primary -->

<?php
get_footer();
