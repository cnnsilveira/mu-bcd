<?php
/*
function bcd__header( string $page_title, $show_header = true ) {
	new BCD__Reset();

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
		?>
			<header class="bcd__header">
				<div class="bcd__header--right">
					<div class="bcd__header--user">
						<span>John Doe</span>
						<i class="fa-solid fa-circle-user"></i>
						<nav class="bcd__header--user-actions">
							<ul>
								<li><a href="#">Meu perfil</a></li>
								<li><a href="#">Log out</a></li>
							</ul>
						</nav>
					</div>
				</div><!-- .bcd__header--right -->
			</header><!-- .bcd__header -->
	<?php
}

function bcd__sidebar() {
	$pages = array(
		'profile'        => array(
			'title' => 'Meu perfil',
			'icon'  => '<i class="fa-solid fa-circle-user"></i>',
			'link'  => bcd__page_url( 'meu-perfil/' ),
			'slug'  => '/dashboard/meu-perfil/',
		),
		'props'          => array(
			'title' => 'Lista de imóveis',
			'icon'  => '<i class="fa-solid fa-building"></i>',
			'link'  => bcd__page_url( 'imoveis/listagem/' ),
			'slug'  => '/dashboard/imoveis/listagem/',
		),
		'new_prop'       => array(
			'title' => 'Novo imóvel',
			'icon'  => '<i class="fa-solid fa-file-circle-plus"></i>',
			'link'  => bcd__page_url( 'imoveis/cadastro/' ),
			'slug'  => '/dashboard/imoveis/cadastro/',
		),
		'favorites'      => array(
			'title' => 'Favoritos',
			'icon'  => '<i class="fa-solid fa-heart"></i>',
			'link'  => bcd__page_url( 'imoveis/favoritos/' ),
			'slug'  => '/dashboard/imoveis/favoritos/',
		),
		'saved_searches' => array(
			'title' => 'Pesquisas salvas',
			'icon'  => '<i class="fa-solid fa-magnifying-glass-location"></i>',
			'link'  => bcd__page_url( 'imoveis/pesquisas/' ),
			'slug'  => '/dashboard/imoveis/pesquisas/',
		),
		'users'          => array(
			'title' => 'Usuários',
			'icon'  => '<i class="fa-solid fa-users"></i>',
			'link'  => bcd__page_url( 'usuarios/' ),
			'slug'  => '/dashboard/usuarios/',
		),
		'definitions'    => array(
			'title' => 'Definições',
			'icon'  => '<i class="fa-solid fa-sliders"></i>',
			'link'  => bcd__page_url( 'definicoes/' ),
			'slug'  => '/dashboard/definicoes/',
		),
		'back_to_site'   => array(
			'title' => 'Voltar para o site',
			'icon'  => '<i class="fa-solid fa-angles-left"></i>',
			'link'  => home_url(),
			'slug'  => null,
		),
		'logout'         => array(
			'title' => 'Sair',
			'icon'  => '<i class="fa-solid fa-right-from-bracket"></i>',
			'link'  => wp_logout_url(),
			'slug'  => null,
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
					$active = BCD__REQUEST_URI === $info['slug'] ? ' active' : '';
					echo '<li class="bcd__sidebar--item ' . esc_attr( $id ) . esc_attr( $active ) . '"><div class="bcd__sidebar--tip">' . esc_html( $info['title'] ) . '</div><a href="' . esc_url( $info['link'] ) . '">' . wp_kses_post( $info['icon'] ) . '</a></li><!-- .bcd__sidebar--item -->';
				}
				?>
			</ul><!-- .bcd__sidebar--list -->
		</nav><!-- .bcd__sidebar--nav -->
	</aside><!-- .bcd__sidebar -->
	<?php
}

function bcd__content_start( string $title, array $button = null ) {
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

function bcd__content_end() {
	?>
			</section>
		</main><!-- .bcd__content -->
	<?php
}

function bcd__footer() {
	echo '<footer style="display: none">';
	wp_footer();
	echo '</footer>';
	echo '</body></html>';
}

function bcd__open( string $title ) {
	bcd__header( $title );
	bcd__content_start( $title );
}

function bcd__close() {
	bcd__content_end();
	bcd__sidebar();
	bcd__footer();
}

function bcd__prop_table() {
	?>
		<article class="bcd__content--block table-block">
			<div class="bcd__content--props-table">
				<table class="bcd__props_table">
					<thead>
						<tr>
							<th>Imóvel</th>
							<th>Tipo</th>
							<th>Valor</th>
							<th>Situação</th>
							<th>Destaque</th>
							<th>Status</th>
							<th class="bcd__props_table--actions"></th>
						</tr>
					</thead>
					<tbody>
						<tr class="content-row" data-bcd__prop_id="1">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Apartamento em Itajuba</strong>
									<br>
									<span>Ref.: 329839</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Apartamento</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 350.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured true">
								<i class="fa-solid fa-circle-check"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag publish">
									Publicado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="1">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="3">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Casa no centro</strong>
									<br>
									<span>Ref.: 219302</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Casa</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 550.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag pending">
									Pendente
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="3">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="4">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Residencial Piracanjuba</strong>
									<br>
									<span>Ref.: 102398</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Empreendimento</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 600.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag expired">
									Expirado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="4">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="5">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Quitinete mobiliada</strong>
									<br>
									<span>Ref.: 120389</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Quitinete</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 850,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>Aluguel</span>
							</td>
							<td class="bcd__props_table--item featured true">
								<i class="fa-solid fa-circle-check"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag publish">
									Publicado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="5">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="6">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Casa (faltando informações)</strong>
									<br>
									<span>Ref.: 583943</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Casa</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 450.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag draft">
									Rascunho
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="6">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="7">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Loft na Barra Sul</strong>
									<br>
									<span>Ref.: --</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Loft</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 350.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag disapproved">
									Reprovado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="7">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="8">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Apartamento mobiliado em Canto Grande</strong>
									<br>
									<span>Ref.: 209389</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Apartamento</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 2.500,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>Aluguel</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag sold">
									Locado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="8">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
						<tr class="content-row" data-bcd__prop_id="9">
							<td class="bcd__props_table--item name">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=" height="50" width="50">
								<div class="item-name">
									<strong>Apartamento em Itajuba</strong>
									<br>
									<span>Ref.: 329839</span>
								</div>
							</td>
							<td class="bcd__props_table--item type">
								<span>Apartamento</span>
							</td>
							<td class="bcd__props_table--item price">
								<span>R$ 350.000,00</span>
							</td>
							<td class="bcd__props_table--item situation">
								<span>À venda</span>
							</td>
							<td class="bcd__props_table--item featured false">
								<i class="fa-solid fa-circle-xmark"></i>
							</td>
							<td class="bcd__props_table--item status">
								<span class="bcd__props_table--status-tag private">
									Privado
								</span>
							</td>
							<td class="bcd__props_table--item actions">
								<button class="menu" onclick="this.classList.toggle('opened')" aria-label="Main Menu">
									<svg width="35" height="35" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</button>
							</td>
						</tr>
						<tr class="action-row" data-bcd__prop_id="9">
							<td>
								<div>
									<div class="actions-wrap">
										<a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
										<a href="#"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
										<a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
										<a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</article>
	<?php
}
*/