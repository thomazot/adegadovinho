<?php 

/**
 * Personalizados
 */

// include 'widgets/zotLogo.php';

include "widgets/zotMostRead.php";
include "widgets/instagram.php";


function zot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Coluna Direita', THEMENAME ),
		'id'            => 'column-right',
		'description'   => esc_html__( 'Adicione os widget', THEMENAME ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Produtos', THEMENAME ),
	// 	'id'            => 'products',
	// 	'description'   => esc_html__( 'Adicione os widget da Produtos', THEMENAME ),
	// 	'before_widget' => '',
	// 	'after_widget'  => '',
	// 	'before_title'  => '',
	// 	'after_title'   => '',
	// ) );
}
add_action( 'widgets_init', 'zot_widgets_init' );