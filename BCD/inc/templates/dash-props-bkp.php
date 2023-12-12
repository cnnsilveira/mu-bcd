<?php
/**
 * This file generates the markup for the property lists page.
 *
 * @package BCD Platform
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Props = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( $this->bcd__test(), '' );
		$this->bcd__prop_table_test();
		$this->bcd__end();
	}

	private $page_name = 'Imóveis';

	private function bcd__test() {
		$markup = '';

		$properties = get_posts(
			array(
				'numberposts' => '-1',
				'post_type'   => 'property',
			)
		);

		foreach ( $properties as $prop ) {
			$markup .= $prop->ID;
			$markup .= '<br>';
		}

		return $markup;
	}

	private function bcd__prop_table_test() {
        $properties = get_posts(
			array(
				'numberposts' => '-1',
				'post_type'   => 'property',
			)
		);

		$markup = '
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
                    <tbody>';

        foreach ( $properties as $prop ) {
            $prop_id = $prop->ID;
            $prop_thumb = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAMFBMVEXQ0NDw8PDX19fU1NTn5+fl5eXt7e3q6urY2Nju7u7Ozs7e3t7g4ODy8vLi4uLb29uNTQONAAAFDElEQVR4nO2d6YKqMAyFpaxeRN//ba+MIordkqbQmJyfQ1vznbZhaWFOJ9Gqjw7gYCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bCm/bKXw12a4jeN4M4xNxIc+XJqummad++uNMKRdheT/V7d3+OqpuwXNQBvXXkLyj131qalqaQPbSSj+up2qL00dxzSAirmx4N8N6A11dPmF4b9a8WcD+I0ARMSjnX5Wy84AeMCmc3T/LHbnQTi/LffxzYHgeM3ZjX83YMwRZEaB+S+e7p9T4L8cUeYTmL/38lcTswkADbf247ObAFD+IcR/zRJmNkH5xxB/wysBQPn96Y9fAlR+mKSP/2D+a3+bX/r577R98LPlZ/YMAMzvuvl/quM1/OH8g7/7LzmCzCgwv/XZ39r9zC7/Eff/N08GYNf9mOdfVzd+w637Uc8/7Y9/59HPLPmfcPy1/RnA1LF7+odd/7CNgOnMcQkMN2HvJ4GtAyxXP/Drv0P/AV91zK57F+ET9q3pz3/L33f4nt15b1HS/ofb5dq21+vIceI/xe6ETSzlly3lly3lly3lly3lly3lly3lly3lly3lL1H7PU4skr/d72WSAvnnFeZpr5305fE/Ftj3MqA8/uf+gqnZ5deK439tr5h2yQGl8bdvq2p7GFAW/+fC8h7bKYri3+4t2iEJFsX/ta0gfw4oid+ysyy7AeXwWzeVZM8BxfC79hVmzgGl8Nt7P/8IKIXfiZ85BxTC3zrpZ2U0oAh+9+DPPgVK4Pdvqc5rQAn8gd5/GJDptwvgD/b+nwGZcsDh/HUTQZ9vChzNH0p9uQ04mD8eP5MBB/MD8PMkwWP5o1LfmwH0SfBIfsjgX0YAdby07ZkroD04fgYDSJszPSC+2BNfXgMoW5vfC4qPD9H7GQwgbKx+fBgpLj7M4H+K1AC6tpbvQkV1UAI+7Qgga8q8XoqLiC8Fn9YAqpZMD4kvCZ/UAKKG6g6ycJOIT2kATTv15ptw3vjSBj+xASTNmK8XYj3xUeDTGUDRiukB8dHgkxlA0IgN3x0fET6VAeltbOf+S7b4qHqfzIDkJtyfw7R8DpUSn8aA1Ba+U58nPlp8EgMSG7DPfUd81PgUBqTVd3wJwhEfOT6BAUnVnanPFh9971MYkFLb+yXgbXx58JMNSKjsn/uv+B5ngVz4qQbg68bhL/EFEsVhBqCrhuf+e3zZej/VAGxNU8UTTX3G3v/7AbwByIqxg38n4Q3A1fNd9R0itAGoaoX1/iysAZha9bmw3p+FNABRKeay5wDhDIDXGUqb+4tQBoCrFDj3F2H+/wq0Rh34/u2hQowAYIUiU98q+AiAlR/KTH2rwCMAVLzY1LcKagCkdKEnvk8BpwBkv0rZc38RzID4spA7vkMFMiC6aPGpbxXEgNiSjPBBBkQWZJH6VsUbEFeOzdxfFG1AVDFWg/+h2M8xx/AzxI8eARGFWOLHGhAuY3hc9nwryoBgEXapb1VMDgjxDyXf74cUYUCAnzV+zBTwH2ea+lYFDfAeNkeHn66QAb6jA9fM/65ADvDwM5/7i/wGuPl/BD8wBZyH/P/nmJV8BriO/EDqW+WZAg7+nxn8D7kNsPOzP+9v5TTAyv9z+O4cYPsr41setxwGWPkH84MaovklSfllS/llS/llS/llS/llS/llS/llS/llq/4Pyu5AznGi3bUAAAAASUVORK5CYII=';
            $prop_title = 'Apartamento em Itajuba';
            $prop_ref = '293023';
            $prop_type = 'Apartamento';
            $prop_value = 'R$ 350.000,00';
            $prop_situ = 'À venda';
            $prop_featured = 'true';
            $prop_status = 'publish';

            $markup .= '
                <tr class="content-row" data-bcd__prop_id="'.esc_attr($prop_id).'">
                <td class="bcd__props_table--item name">
                    <img src="'.$prop_thumb .'" height="50" width="50">
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
                    <button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
            ';
        }
        $markup .= '    
                    </tbody>
                </table>
            </div>
        </article><!-- .bcd__content--block -->';

		echo $markup;
	}

    /*
	private function bcd__prop_table() {
		$markup = '
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
							<button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
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
		</div>';

		return $markup;
	}
    */
};
