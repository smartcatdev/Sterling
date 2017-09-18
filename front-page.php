<?php
/**
 * The front-page.php template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sterling
 */
    
$front = get_option( 'show_on_front' ); 

get_header(); ?>

<?php if ( $front != 'posts' ) : ?>

    <?php if ( function_exists( 'sterling_slider' ) ) { sterling_slider(); } ?>
    
    <?php do_action( 'sterling_after_slider' ); ?>
    
    <?php do_action( 'sterling_before_content' ); ?>
    
<?php endif; ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container<?php echo $front == 'posts' ? '-fluid' : ''; ?> push" id="blog-posts">
        
            <?php if ( have_posts() ) : ?>
            
                <?php if ( is_home() && ! is_front_page() ) : ?>

                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>

                <?php endif; ?>

                <?php 
    
                $ctr = 0;
                
                while ( have_posts() ) : the_post();

                    if ( $front == 'posts' ) :

                        if ( $ctr % 2 ) :
                        
                            get_template_part( 'template-parts/content', 'blog-flip' );
                        
                        else : 
                            
                            get_template_part( 'template-parts/content', 'blog' );
                            
                        endif;
                        
                        $ctr++;
                        
                    else :

                        get_template_part( 'template-parts/content', 'page-home' );

                    endif;

                endwhile; 

                ?>   

                <?php if ( $front == 'posts' ) : ?>
                
                    <div class="row">
            
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>

                    </div>
                        
                <?php endif; ?>

            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </div> 
        
        <?php if ( $front != 'posts' ) : ?>
           
            <?php do_action( 'sterling_after_content' ); ?>

        <?php endif; ?>

    </main><!-- #main -->

</div><!-- #primary -->

<?php 

get_footer();
