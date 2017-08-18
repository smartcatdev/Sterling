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
 * @package Sterling
 */
    
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php endif; ?>

                        <?php $ctr = 0; ?>   

                <div class="container-fluid push" id="blog-posts">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <div class="row">

                            <?php if ( $ctr % 2 ) : ?>

                                <a href="<?php the_permalink(); ?>">

                                    <div class="col-md-6" id="blog-img" style="background-image: url( <?php the_post_thumbnail_url(); ?> );">

                                           <?php the_post_thumbnail(); ?>

                                    </div>    

                                </a>

                                <div class="col-md-6" id="blog-info">

                                    <div id="blog-info-content">

                                        <h2><?php the_title(); ?></h2>
                                        
                                        <?php if ( get_theme_mod( 'sterling_blog_date_toggle', 'on' ) == "on" ) : ?>
                                        
                                            <i><?php echo esc_html( get_the_date( 'm/d/Y' ) ); ?></i>
                                  
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'sterling_blog_date_toggle', 'on' ) == "on" && 
                                                   get_theme_mod( 'sterling_blog_comments_toggle', 'on' ) == "on"  ) : ?>
                                        
                                            <span class="divider"></span>
                                            
                                        <?php endif; ?>
                                        
                                        <?php if ( get_theme_mod( 'sterling_blog_comments_toggle', 'on' ) == "on" ) : ?>    
                                            
                                            <i><?php comments_number(); ?></i>
                                            
                                        <?php endif; ?>
                                            
                                        <p><?php the_excerpt(); ?></p>

                                        <a class="btn-sterling primary" href="<?php the_permalink(); ?>">
                                            Read More
                                        </a>

                                    </div>

                                </div>

                            <?php else: ?>

                                <a href="<?php the_permalink(); ?>">

                                    <div class="col-md-6 col-md-push-6" id="blog-img" style="background-image: url( <?php the_post_thumbnail_url(); ?> );">


                                        <?php the_post_thumbnail(); ?>


                                    </div>

                                </a>

                                <div class="col-md-6 col-md-pull-6" id="blog-info">

                                    <div id="blog-info-content">

                                        <h2><?php the_title(); ?></h2>
                                        
                                        <?php if ( get_theme_mod( 'sterling_blog_date_toggle', 'on' ) == "on" ) : ?>
                                        
                                            <i><?php echo esc_html( get_the_date( 'm/d/Y' ) ); ?></i>
                                  
                                        <?php endif; ?>
                                        <?php if ( get_theme_mod( 'sterling_blog_date_toggle', 'on' ) == "on" && 
                                                   get_theme_mod( 'sterling_blog_comments_toggle', 'on' ) == "on"  ) : ?>
                                        
                                            <span class="divider"></span>
                                            
                                        <?php endif; ?>
                                        
                                        <?php if ( get_theme_mod( 'sterling_blog_comments_toggle', 'on' ) == "on" ) : ?>    
                                            
                                            <i><?php comments_number(); ?></i>
                                            
                                        <?php endif; ?>

                                        <p><?php the_excerpt(); ?></p>

                                        <a href="<?php the_permalink(); ?>" class="btn-sterling primary">
                                            Read More
                                        </a>

                                    </div>

                                </div>

                            <?php endif; ?>

                            <?php $ctr++; ?> 

                        </div>

                    <?php endwhile; ?>    

                    <?php endif; ?>

                </div> <?php

			the_posts_pagination( array( 'mid_size' => 1 ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 

get_footer();
