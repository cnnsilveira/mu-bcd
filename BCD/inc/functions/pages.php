<?php

add_action( 'init', 'bcd__rewrite_rules' );
function bcd__rewrite_rules() {
	add_rewrite_rule( '^dashboard/imoveis/cadastro/?', 'index.php?bcd__page=new_prop', 'top' );
	add_rewrite_rule( '^dashboard/imoveis/favoritos/?', 'index.php?bcd__page=favorite', 'top' );
	add_rewrite_rule( '^dashboard/imoveis/pesquisas/?', 'index.php?bcd__page=saved_searches', 'top' );
	add_rewrite_rule( '^dashboard/imoveis/?', 'index.php?bcd__page=props', 'top' );
	add_rewrite_rule( '^dashboard/meu-perfil/?', 'index.php?bcd__page=profile', 'top' );
	add_rewrite_rule( '^dashboard/usuarios/?', 'index.php?bcd__page=users', 'top' );
	add_rewrite_rule( '^dashboard/definicoes/?', 'index.php?bcd__page=definitions', 'top' );
	add_rewrite_rule( '^dashboard/?', 'index.php?bcd__page=home', 'top' );

	flush_rewrite_rules();
}

add_filter( 'query_vars', 'bcd__query_vars' );
function bcd__query_vars( $vars ) {
	$vars[] = 'bcd__page';
	return $vars;
}

add_action( 'template_include', 'bcd__template' );
function bcd__template( $template ) {
	if ( get_query_var( 'bcd__page' ) ) {
		$template = BCD__TEMPLATES . 'dash-' . get_query_var( 'bcd__page' ) . '.php';
	}
	return $template;
}
