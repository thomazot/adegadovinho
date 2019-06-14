<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

get_header();
?>


	<div class="content__main">
		<main id="main" class="main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<?php breadcrumb(); ?>
			<div class="pages__container std"><?php the_content(); ?></div>
			<?php

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
