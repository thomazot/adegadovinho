<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplessystem
 */
$logo = get_theme_mod('footer_logo');
$social = get_theme_mod('social');

?>
			</div>
		</div>

		<div class="contact" id="contato">
			<div class="contact__container">
				<div class="contact__inner">
					<div class="contact__content">
						<div class="contact__legend">
							<i class="fas fa-envelope-open-text"></i>
							<span>Cadastre seu E-mail para receber ofertas exclusivas</span>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="15" title="Formulário de contato 1"]'); ?>
					</div>
				</div>
			</div>
		</div>

		<footer id="footer" class="footer">
			<div class="footer__container">
				<div class="footer__logo">
					<h3><img src="<?php echo $logo; ?>" /></h3>
				</div>

				<?php zotMenu('Menu Rodape'); ?>

				<?php if($social): ?>
					<div class="footer__social">
						<div class="footer__social-content">
							<h3 class="footer__title">Redes Sociais</h3>
							<div class="social">
								<?php echo $social; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
			</div>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
