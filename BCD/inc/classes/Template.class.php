<?php

defined( 'ABSPATH' ) || exit;

class BCD__Template {
	protected $page_name;
	protected $header_nav = null;

	protected function bcd__start( string $page_name ) {
		$this->bcd__doctype( $page_name );
		$this->bcd__header( $this->header_nav );
		$this->bcd__content_start( $page_name );
	}

	protected function bcd__block( string $block_content, string $block_class = '' ) {
		echo '<article class="bcd__content--block ' . esc_attr( $block_class ) . '">' . $block_content . '</article><!-- .bcd__content--block -->';
	}

	protected function bcd__end() {
		$this->bcd__content_end();
		$this->bcd__sidebar();
		$this->bcd__footer();
	}

	private function bcd__doctype( string $page_title ) {
		?>
		<!DOCTYPE html>
		<html lang="pt-BR">
			<head>
				<title><?php echo esc_attr( $page_title ); ?></title>
				<meta charset="<?php bloginfo( 'charset' ); ?>">
				<meta name="viewport" content="width=device-width initial-scale=1">
				<?php wp_head(); ?>
			</head>
			<body <?php body_class(); ?>>
			<?php
			wp_body_open();
	}

	private function bcd__header_nav( array $items ) {
		$output = '
		<div class="bcd__header--left">
			<ul>
		';

		foreach ( $items as $nicename => $href ) {
			$active = substr( $href, 1 ) === $_SERVER['QUERY_STRING'] ? ' active' : '';
			$output .= '<li><a class="' . $active . '" href="' . esc_url( $href ) . '">' . esc_html( $nicename ) . '</a></li>';
		}
		
		$output .= '
			</ul>
		</div><!-- .bcd__header--left -->
		';

		return $output;
	}

	private function bcd__header( array $header_nav = null ) {
		?>
		<header class="bcd__header">

			<?php echo null !== $header_nav ? $this->bcd__header_nav( $header_nav ) : ''; ?>

			<div class="bcd__header--right">
				<div class="bcd__header--user">
					<span><?php echo esc_html( wp_get_current_user()->display_name ); ?></span>
					<i class="fa-solid fa-circle-user"></i>
					<nav class="bcd__header--user-actions">
						<ul>
							<li><a href="<?php echo esc_url( home_url( bcd__urls( 'profile' ) ) ); ?>">Meu perfil</a></li>
							<li><a href="<?php echo esc_url( wp_logout_url() ); ?>">Log out</a></li>
						</ul>
					</nav>
				</div>
			</div><!-- .bcd__header--right -->
		</header><!-- .bcd__header -->
		<?php
	}

	private function bcd__content_start( string $title, array $button = null ) {
		?>
			<main class="bcd__content">
				<section class="bcd__content--title">
					<div class="left">
						<h1><?php echo esc_html( $title ); ?></h1>
					</div>
					<div class="right">
						<?php
						if ( null !== $button ) {
							echo '<button class="bcd__content--add-new">Novo imóvel</button>';
						}
						?>
					</div>
				</section>
				<section class="bcd__content--wrap">
		<?php
	}

	private function bcd__content_end() {
		?>
				</section>
			</main><!-- .bcd__content -->
		<?php
	}

	private function bcd__sidebar() {
		$pages = array(
			'index'          => array(
				'title' => 'Início',
				'icon'  => '<i class="fa-solid fa-chart-pie"></i>',
			),
			'props'          => array(
				'title' => 'Lista de imóveis',
				'icon'  => '<i class="fa-solid fa-building"></i>',
			),
			'new_prop'       => array(
				'title' => 'Novo imóvel',
				'icon'  => '<i class="fa-solid fa-file-circle-plus"></i>',
			),
			'favorite'       => array(
				'title' => 'Favoritos',
				'icon'  => '<i class="fa-solid fa-heart"></i>',
			),
			'saved_searches' => array(
				'title' => 'Pesquisas salvas',
				'icon'  => '<i class="fa-solid fa-magnifying-glass-location"></i>',
			),
			'users'          => array(
				'title' => 'Usuários',
				'icon'  => '<i class="fa-solid fa-users"></i>',
			),
			'definitions'    => array(
				'title' => 'Definições',
				'icon'  => '<i class="fa-solid fa-sliders"></i>',
			),
			'profile'        => array(
				'title' => 'Meu perfil',
				'icon'  => '<i class="fa-solid fa-circle-user"></i>',
			),
		);
		?>
			<aside class="bcd__sidebar">
			<small class="bcd__sidebar--logo">
				<!-- Author: Julia Passos  -->
				<!-- License: GPL-3.0 -->
				<!-- Generator: Adobe Illustrator 27.7.0 . SVG Version: 6.00 Build 0)  -->
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1080 1080" xml:space="preserve">

					<path class="st1" d="M367.58,367.3c0,0-5.96-22.78-15.23-58.22c-68.67,84.2-137.35,168.4-206.02,252.6
						c-6.57,41.5-13.14,83.01-19.71,124.51c32.67,22.8,65.81,46.98,99.26,72.62c12.54,9.61,24.87,19.23,36.99,28.84
						c0.89-11.97,1.76-23.98,2.6-36.03c0.63-9.06,1.25-18.1,1.86-27.11c-27.98-18.46-55.97-36.92-83.95-55.38
						c3.22-28.34,6.44-56.68,9.67-85.02C251.22,511.83,309.4,439.57,367.58,367.3z"/>
					<path class="st1" d="M215.03,645.01c55.85-70.47,108.63-137.04,111.71-140.93c74.09-93.44,142.77-180.02,148.2-186.86
						c15.15,12.05,30.3,24.1,45.45,36.16c-19.99,32.53-28.7,60.72-32.94,80.7c-7.76,36.57-8.8,84.41-8.81,84.41c0,0,0.01-0.11,0.01-0.2
						c21.17-19.21,39.62-37.82,55.56-55.16c0,0,19.97-21.75,40.46-47.43c53.51-67.09,116.51-173.79,124.53-187.44
						c1.6,1.36,3.2,2.71,4.81,4.07c12.45,15.8,24.91,31.59,37.36,47.39c-8.85,16.98-22.18,41.79-39.48,71.1
						c-25.21,42.72-99.98,163.79-222.35,288.77c-39.73,40.57-90.86,87.93-122.86,117.6c-25.28,23.43-46.35,42.51-60.54,55.26
						c1.81-32.27,3.61-64.54,5.42-96.81c13.77-8.37,33.16-22.34,50.87-44.37c19.78-24.59,28.24-47.66,40.87-83.52
						c7.39-20.99,16.14-49.66,22.88-84.76c-32.4,31.82-65.55,66.38-98.92,103.83c-19.85,22.28-38.66,44.33-56.48,66.03
						C245.52,663.59,230.27,654.3,215.03,645.01z"/>
					<path class="st1" d="M838,169.99c14.67,12.23,29.34,24.45,44.01,36.68c-11.15,31.17-27.75,73.59-51.35,122.25
						c-65.98,136.07-140.5,225.46-190.07,284.15c0,0-142.88,169.17-295.65,269.94c-0.9,0.59-42.33,27.91-42.33,27.91
						c-5.79-17.72-11.57-35.44-17.36-53.16c55.72-41.21,127.05-98.79,203.49-174.61c47.95-47.56,121.05-120.77,197.32-231.32
						C731.96,385.32,788.71,291.22,838,169.99z"/>
					<path class="st1" d="M827.69,496.44c-31.19,16.63-62.38,33.27-93.57,49.9c0,0,29.94,18.09,29.94,18.09c0,0-50.52,61.13-50.53,61.13
						c0.01-0.01,103.55-70.49,103.55-70.49c0,0-28.69-11.23-28.69-11.23C801.49,528.04,814.59,512.24,827.69,496.44z"/>
					<path class="st1" d="M827.35,409.31c5.35-8.55,10.78-18.08,16.01-28.61c3.6-7.24,6.76-14.25,9.54-20.96
						c14.04,32.5,28.15,64.98,42.32,97.43c14.49,33.19,29.04,66.35,43.66,99.49c-0.01,0.01-77.97,100.43-77.97,100.43
						c0,0-280.7,79.22-280.7,79.22c0,0,56.2-58.8,56.2-58.8c63.95-17.81,127.91-35.62,191.86-53.43l0,0
						c10.43-12.7,20.9-25.67,31.41-38.91c9.99-12.58,19.74-25.08,29.27-37.48c-6.97-15.14-13.92-30.4-20.85-45.78
						C854.09,470.8,840.51,439.93,827.35,409.31z"/>
				</svg>
			</small><!-- .bcd__sidebar--logo -->
			<nav class="bcd__sidebar--nav">
				<ul class="bcd__sidebar--list">
					<?php
					foreach ( $pages as $id => $info ) {
						$page_slug = bcd__urls( $id );
						$active    =  explode( '?', BCD__REQUEST_URI )[0] === $page_slug ? ' active' : '';
						echo '<li class="bcd__sidebar--item ' . esc_attr( $id ) . esc_attr( $active ) . '"><div class="bcd__sidebar--tip">' . esc_html( $info['title'] ) . '</div><a href="' . esc_url( home_url( $page_slug ) ) . '">' . wp_kses_post( $info['icon'] ) . '</a></li><!-- .bcd__sidebar--item -->';
					}
					?>
					<li class="bcd__sidebar--item">
						<div class="bcd__sidebar--tip">Voltar para o site</div><a href="<?php echo esc_url( home_url() ); ?>"><i class="fa-solid fa-angles-left"></i></a>
					</li>
					<li class="bcd__sidebar--item">
						<div class="bcd__sidebar--tip">Log out</div><a href="<?php echo esc_url( wp_logout_url() ); ?>"><i class="fa-solid fa-right-from-bracket"></i></a>
					</li>
				</ul><!-- .bcd__sidebar--list -->
			</nav><!-- .bcd__sidebar--nav -->
		</aside><!-- .bcd__sidebar -->
		<?php
	}

	private function bcd__footer() {
		echo '<footer style="display: none">';
		wp_footer();
		echo '</footer>';
		echo '</body></html>';
	}
}
