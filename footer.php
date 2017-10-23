<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kenza
 */

kenza_get_custom_footer(); ?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">

        <div class="container-fluid" id="footer">

            <div class="row">

                <div class="container">

                    <div class="site-info">

                        <a href="<?php echo esc_url( get_theme_mod('kenza_company_url', 'http://www.wordpress.org/' ) ); ?>">
                            <?php
                                /* translators: %s: CMS name, i.e. WordPress. */
                                printf( esc_attr( get_theme_mod( 'kenza_company_name', __( 'WordPress', 'kenza' ) ) ) );
                            ?>
                        </a>

                        <span class="sep"> | </span>
                        
                        <?php if( get_theme_mod( 'kenza_sc_branding', 'on' ) == 'on' ) : ?>
                        
                        <a id="sc_brand" href="https://smartcatdesign.net/" rel="designer" style="display: inline-block !important" class="rel" title="<?php printf( esc_attr__( '%s Logo', 'kenza'), 'Smartcat' ); ?>">
                            <?php _e( 'Designed by ', 'kenza' ); ?> 
                            <img src="<?php echo trailingslashit( get_template_directory_uri() ) . 'inc/images/smartcat_new_logo.png'; ?>" alt="<?php printf( esc_attr__( '%s Logo', 'kenza'), 'Smartcat' ); ?>" />
                        </a>
                        
                        <?php endif; ?>
                        
                        <?php kenza_get_scrolltotop(); ?>

                    </div><!-- .site-info -->

                </div>

            </div>

        </div>

    </footer><!-- #colophon -->
        
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>