<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sterling
 */

get_header(); ?>

	<div id="primary" class="content-area">
            
		<main id="main" class="site-main">
                    
                    <div class="container">

                        <div class="row">
                            
                            <div class="col-sm-6 not-found-large">

                                <h1>404</h1>

                            </div>
                            
                            <div class="col-sm-6 not-found-text">
                                
                                <section class="error-404 not-found">
                                    
                                        <h1 class="page-title"><?php echo esc_attr( get_theme_mod( 'sterling_404_title', 'Oops!' ) ); ?></h1>

                                        <div class="page-content">
                                                <p><?php echo esc_attr( get_theme_mod( 'sterling_404_message', "WE'RE SORRY, BUT SOMETHING WENT WRONG." ) ); ?></p>
                                        </div><!-- .page-content -->    
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                Return to Home
                                        </a>

                                </section><!-- .error-404 -->
                                
                            </div>

                        </div>
                        
                    </div>
                    
		</main><!-- #main -->
                
	</div><!-- #primary -->

<?php
sterling_get_scrolltotop();
 
sterling_get_custom_footer();

get_footer();
