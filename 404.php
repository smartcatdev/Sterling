<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kenza
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 not-found-large">

                        <h1>
                            <?php esc_html_e( '404', 'kenza' ); ?>
                        </h1>

                    </div>

                    <div class="col-sm-12 not-found-text">

                        <section class="error-404 not-found">

                            <h2 class="page-title">
                                <?php echo esc_html( get_theme_mod( 'kenza_404_title', __( 'Oops!', 'kenza' ) ) ); ?>
                            </h2>

                            <div class="page-content">
                                <p>
                                    <?php echo esc_html( get_theme_mod( 'kenza_404_message', __( "We're sorry, something seems to have gone wrong.", 'kenza' ) ) ); ?>
                                </p>
                            </div><!-- .page-content -->    

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo esc_html( 'Return to Home', 'kenza' ); ?>
                            </a>

                        </section><!-- .error-404 -->

                    </div>

                </div>
                
                <div class="clear"></div>

            </div>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php

get_footer();
