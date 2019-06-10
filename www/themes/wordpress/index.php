<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

get_header();
?>

	<div class="content__main">
		<main id="main" class="main">

			<div class="banners-grid banners-grid--three">
				<div class="banners-grid__item banners-grid__item--one">
					<?php zotBanner('Banner Home Um'); ?>
				</div>
				<div class="banners-grid__item banners-grid__item--two">
					<?php zotBanner('Banner Home Dois'); ?>
				</div>
				<div class="banners-grid__item banners-grid__item--three">
					<?php zotBanner('Banner Home Tres'); ?>
				</div>
			</div>
			
			<div class="post-list">
				<div class="post-list__container">
					<?php zotPosts([ 'limit' => 4, 'list' => 'list' ]); ?>
				</div>
			</div>

		</main>


		<?php get_sidebar(); ?>
	</div>

<div class="post-list post-list--margin">
	<div class="post-list__container">
		<?php zotPosts([ 'limit' => 3, 'list' => 'grid' ]); ?>
	</div>
</div>

<?php
get_footer();
