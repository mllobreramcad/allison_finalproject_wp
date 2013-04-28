<?php
/**
 * Template Name: Home Page
 *
 * @package Dumbbells-Kitchen
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
            
            <h2><?php the_field('intro_heading'); ?></h2>
                	<p><?php the_field('intro_description'); ?></p>
                    
                    
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>