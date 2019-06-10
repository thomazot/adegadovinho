<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 
 */

if ( is_active_sidebar( 'column-right' ) ):
	
?>

<aside id="column-right" class="column-right">
	<?php dynamic_sidebar( 'column-right' ); ?>
</aside><!-- #secondary -->

<?php 
endif;
?>