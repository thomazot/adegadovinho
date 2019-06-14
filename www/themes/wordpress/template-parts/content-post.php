<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

	$title = get_the_title();
	$link = get_the_permalink();
	$image = get_field('image');
	$description = get_field('resume');
?>

<article id="post-list-item-<?php the_ID(); ?>" <?php post_class('post-list__item'); ?>>
	<div class="post-list__border">
		<?php if($image): ?>
		<figure class="post-list__figure">
			<?php if($link): ?>
			<a class="post-list__link" href="<?php echo $link; ?>">
			<?php endif ?>
				<img src="<?php echo $image?>" alt="<?php echo $title?>">
			<?php if($link): ?>
			</a>
			<?php endif ?>
		</figure>
		<?php endif; ?>
		<div class="post-list__content">
			<div class="post-list__head">
				<h1 class="post-list__name"><?php echo $title; ?></h1>
				<div class="post-list__tags">
				<?php
				$posttags = get_the_tags();
				$count=0; $sep='';
				if ($posttags) {
					foreach($posttags as $tag) {
						$count++;
						echo $sep . '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
						$sep = ' ';
						if( $count > 2 ) break; 
					}
				}
				?>
				</div>
				
			</div>
			<div class="post-list__info">Por <?php the_author_posts_link(); ?>. em <?php the_time('j/m/Y'); ?> </div>
			<div class="post-list__description"><?php echo $description; ?></div>
			<a class="post-list__button ct-bg-primary" href="<?php echo $link; ?>">Continue Lendo</a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
