<?php
/**
 * Template Name: Post-Workout Food
 *
 * @package Dumbbells-Kitchen
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
			
			<?php endwhile; // end of the loop. ?>
            
        <div id="post-workout-food-wrapper">
            	<h2>Post-Workout Foods</h2>
                <h3><?php the_field('food_name'); ?></h3>
                	<p><?php the_field('food_benefits'); ?></p>
                    <img src="<?php the_field('food_picture'); ?>" alt="<?php the_field('alt'); ?>" />
                    <p><?php the_field('serving_size'); ?></p>
                    <p><?php the_field('calories'); ?></p>
                    <p><?php the_field('fat'); ?></p>
                    <p><?php the_field('carbs'); ?></p>
                    <p><?php the_field('protein') ?></p>
        </div>
                    
                    
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>