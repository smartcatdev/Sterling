<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sterling
 */


sterling_get_custom_footer();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
            
            <div class="container-fluid" id="footer">
                
                <div class="row">
                    
                    <div class="container">
                        
                        <div class="site-info">
                                <a href="<?php echo esc_url( get_theme_mod('sterling_company_url', 'www.wordpress.org') ); ?>"><?php
                                        /* translators: %s: CMS name, i.e. WordPress. */
                                        printf( esc_attr( get_theme_mod('sterling_company_name', 'Wordpress') ) );
                                ?></a>
                                <span class="sep"> | </span>
                                <?php
                                        /* translators: 1: Theme name, 2: Theme author. */
                                        printf( esc_html__( 'Designed by %2$s.', 'sterling' ), 'Sterling', '<a href="https://www.smartcatdesign.net/">Smartcat</a>' );
                                ?>
                                
                                <?php sterling_get_scrolltotop(); ?>
                                    
                        </div><!-- .site-info -->
                
                    </div>
                
                </div>
                                
            </div>
            
	</footer><!-- #colophon -->
        
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>