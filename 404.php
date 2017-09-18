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

                    <div class="col-sm-12 not-found-large">

                        <h1>
                            <?php esc_html_e( '404', 'sterling' ); ?>
                        </h1>

                    </div>

                    <div class="col-sm-12 not-found-text">

                        <section class="error-404 not-found">

                            <h2 class="page-title">
                                <?php esc_html_e( get_theme_mod( 'sterling_404_title', __( 'Oops!', 'sterling' ) ) ); ?>
                            </h2>

                            <div class="page-content">
                                <p>
                                    <?php esc_html_e( get_theme_mod( 'sterling_404_message', __( "We're sorry, something seems to have gone wrong.", 'sterling' ) ) ); ?>
                                </p>
                            </div><!-- .page-content -->    

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php esc_html_e( __( 'Return to Home', 'sterling' ) ); ?>
                            </a>

                        </section><!-- .error-404 -->

                    </div>

                </div>
                
                <div class="clear"></div>

            </div>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php

sterling_get_custom_footer();

get_footer();
