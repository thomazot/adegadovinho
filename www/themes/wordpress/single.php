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
	$banner_title = get_field('banner_title');
	$banner_description = get_field('banner_description');
	$title = get_the_title();
	$link = get_the_permalink();
?>	
	<?php if($banner): ?>
	<div class="page-banner">
		<div class="page-banner__container">
			<img src="<?php echo $banner; ?>">
			<div class="page-banner__info">
				<h3 class="page-banner__title">
					<?php echo $banner_title; ?>
				</h3>
				<div class="page-banner__description">
					<?php echo $banner_description; ?>
				</div>
				<div class="page-banner__tags">
				<?php
					$posttags = get_the_tags();
					$count=0; $sep='';
					if ($posttags) {
						foreach($posttags as $tag) {
							$count++;
							echo $sep . '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
							$sep = ' ';
							if( $count > 5 ) break; 
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php breadcrumb(); ?>
	
	<div class="content__main">
		<main id="main" class="main">
		<div class="pages__share">
			<div class="inner">
				<?php #Facebook; ?>
				<a href="javascript:void(0)" onclick="window.open('//www.facebook.com/sharer.php?s=100&u=<?php echo $link; ?>','<?php echo $title; ?>','toolbar=0,status=0,width=626,height=436');"><i class="fab fa-facebook"></i></a>
				<?php #Twitter; ?>
				<a href="javascript:void(0)" onclick="window.open('//twitter.com/share?url=<?php echo $link; ?>&text=<?php echo $title; ?>','<?php echo $title; ?>','toolbar=0,status=0,width=626,height=436');"><i class="fab fa-twitter"></i></a>
				<?php #Whatsapp; ?>
				<a href="javascript:void(0)" onclick="window.open('//wa.me/?text=<?php echo urlencode($link); ?>','<?php echo $title; ?>','toolbar=0,status=0,width=626,height=436');"><i class="fab fa-whatsapp"></i></a>
			</div>
		</div>
		<div class="pages__info">Por <?php the_author_posts_link(); ?>. em <?php the_time('j/m/Y'); ?> </div>
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
				<?php $commentList  = get_comments(array('post_id' => get_the_ID())); ?>
				<?php if(count($commentList) > 0): ?>
				<div class="comment__list">
					<?php  foreach (as $comment): ?>
					<div class="comment__list-item">
						<div class="comment__list-author"><?php echo $comment->comment_author; ?></div>
						<div class="comment__list-comment"><?php echo $comment->comment_content; ?></div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

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
