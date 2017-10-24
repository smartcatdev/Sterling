<?php
/**
 * Template part for displaying homepage content in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kenza
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'homepage-content' ) ); ?>>
    
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title site-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        
        <?php
        
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kenza' ),
                'after'  => '</div>',
            ) );
            
        ?>
        
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>

        <footer class="entry-footer">
            
            <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'kenza' ),
                            array(
                                'span' => array(
                                        'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            ?>
            
        </footer><!-- .entry-footer -->
        
    <?php endif; ?>
            
</article><!-- #post-<?php the_ID(); ?> -->
