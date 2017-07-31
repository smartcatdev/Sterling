<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sterling
 */

get_header(); ?>

	<section id="primary" class="content-area">
            
		<main id="main" class="site-main">

                    <div class="container" id="search-results-list"> 
                        
                        <div class="row">
                            
                            <div class="col-md-<?php sterling_get_container_width(); ?>">

                                <?php
                                if ( have_posts() ) : ?>

                                    <header class="page-header">
                                            <h1 class="page-title"><?php
                                                    /* translators: %s: search query. */
                                                    printf( esc_html__( 'Search Results for: %s', 'sterling' ), '<span>' . get_search_query() . '</span>' );
                                            ?></h1>
                                    </header><!-- .page-header -->

                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post(); ?>

                                        <h2><?php the_title(); ?></h2>     
                                        
                                        <p><?php the_excerpt(); ?></p>

                                    <?php endwhile;

                                    the_posts_navigation();

                                else :

                                    get_template_part( 'template-parts/content', 'none' );

                                endif; ?>
                                    
                            </div>
                            
                            <div class="col-md-3">
                                
                                <?php get_sidebar(); ?>
                                
                            </div>

                        </div>
                            
                    </div>

		</main><!-- #main -->
                
	</section><!-- #primary -->

<?php
get_footer();
