<?php
/**
 * Template Name: Post-Workout Foods Category
 *
 * @package Dumbbells-Kitchen
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content post-workout-food-wrapper" role="main">
            <?php query_posts('post_type=post-workout_food'); ?>
			<h2>Post-Workout Foods</h2>
			<?php if(have_posts ()) while ( have_posts() ) : the_post(); ?>			
                <h3><?php the_field('food_name'); ?></h3>
                	<p>BENEFITS<br />
					<?php the_field('food_benefits'); ?></p>
                    <img src="<?php the_field('food_picture'); ?>" alt="<?php the_field('alt'); ?>" />
                    <p>SERVING SIZE: <?php the_field('serving_size'); ?><br />
                    	CALORIES: <?php the_field('calories'); ?><br />
                    	FAT: <?php the_field('fat'); ?><br />	
                    	CARBOHYDRATES: <?php the_field('carbs'); ?><br />
                    	PROTEIN: <?php the_field('protein') ?></p>
			<?php endwhile; // end of the loop. ?>
                    
                    
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>