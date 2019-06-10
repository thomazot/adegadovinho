<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package simplessystem
 */

get_header();
?>

	
	<header class="page-header">
		<div class="page-header__container">
		<h1 class="page-title"><?php esc_html_e( 'Oops! Pagina não encontrada.', 'zot' ); ?></h1>
		</div>
	</header><!-- .page-header -->
	<div class="content__main">
		<main id="main" class="main">

			<section class="error-404 not-found">

				<div class="page-content">
					<p><?php esc_html_e( 'Parece que nada foi encontrado neste local. Talvez tente um dos links abaixo ou uma pesquisa?', 'zot' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
