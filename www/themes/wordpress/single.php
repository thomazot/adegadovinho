<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package simplessystem
 */

get_header();

while ( have_posts() ) :
	the_post();
	$banner = get_field('banner');
?>	
	<?php if($banner): ?>
	<div class="page-banner">
		<div class="page-banner__container">
			<img src="<?php echo $banner; ?>">
		</div>
	</div>
	<?php endif; ?>
	<?php breadcrumb(); ?>
	<div class="content__main">
		<main id="main" class="main">

		<?php
			$related = get_field('related');
			?>
				<div class="pages__container std"><?php the_content(); ?></div>

				<div class="comment">
					<div class="comment__container">
						<div class="comment__header">
							<div class="comment__title">Comentários</div>
							<div class="comment__legend"><?php echo get_comments_number(); ?> Comentários</div>
						</div>
						<div class="comment__content">
							<?php comment_form(); ?>
						</div>
					</div>
				</div>
				<?php if($related): ?>
				<div class="post-list post-list--related">
					<div class="post-list__header">
						<h3 class="post-list__title">
							Posts Relacionados
						</h3>
					</div>
					<div class="post-list__list" data-list="grid">
					<?php foreach( $related as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); get_template_part( 'template-parts/content', 'post' ); ?>
					<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
			<?php 
			
			
		
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div>
	
<?php
endwhile; // End of the loop.
get_footer();
