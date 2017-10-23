<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kenza
 */
    
get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>

                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

            <?php endif; ?>

            <?php $ctr = 0; ?>   

            <div class="container-fluid push" id="blog-posts">

                <?php while ( have_posts() ) : the_post();

                    if ( $ctr % 2 ) :

                        get_template_part( 'template-parts/content', 'blog-flip' );

                    else : 

                        get_template_part( 'template-parts/content', 'blog' );

                    endif;

                    $ctr++;

                endwhile; ?> 

                <div class="row">

                    <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>

                </div>
                
            </div>
        
        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->

</div><!-- #primary -->

<?php get_footer();
