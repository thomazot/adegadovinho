<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package simplessystem
 */

get_header();
?>

	
<header class="page-header">
	<div class="page-header__container">
	<h1 class="page-title">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Resultado de busca para: %s', 'simplessystem' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>
	</div>
</header><!-- .page-header -->
	
<div class="content__main">
		<main id="main" class="main">

	<?php if ( have_posts() ) : ?>


		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			?>
			<div class="post-list__list" data-list="grid">
			<?php get_template_part( 'template-parts/content', 'post' ); ?>
			</div>
			<?php

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
	<?php get_sidebar(); ?>
</div>

<?php

get_footer();
