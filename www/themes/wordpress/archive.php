<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

get_header();
?>

	<?php if ( have_posts() ) : ?>
	<div class="page-header">
		<div class="page-header__container">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</div>
	</div><!-- .page-header -->
	<?php endif; ?>
	<?php breadcrumb(); ?>
	<div class="content__main">
		<main id="main" class="main">

		<?php if ( have_posts() ) : ?>

			<div class="post-list__list" data-list="grid">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</div>
			<?php
			zotPagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
