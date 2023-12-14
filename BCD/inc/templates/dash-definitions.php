<?php
/**
 * This file generates the markup for the definitions page.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Definitions = new class() extends BCD__Template {
	private $terms_table_args = null;
	private $new_term_args    = null;
	private $new_subitem_args = null;

	public function __construct() {
		$this->bcd__default_page();

		$this->bcd__set_header_nav();
		$this->bcd__set_page_name();

		$this->bcd__set_table_info();

		$this->bcd__start( $this->page_name );
		$this->bcd__table_output();
		$this->bcd__end();
	}

	private function bcd__default_page() {
		if ( ! isset( $_GET['mod'] ) ) {
			$defaut_page = '?mod=cidades-e-bairros';

			wp_safe_redirect( home_url( bcd__urls( 'definitions' ) . $defaut_page ) );
		}
	}

	private function bcd__set_table_info() {
		switch ( $_GET['mod'] ) {
			case 'cidades-e-bairros':
				$this->terms_table_args = array(
					'block_title'     => 'Cidades e bairros',
					'taxonomy'        => 'property_city',
					'data_reference'  => 'city',
					'columns_title'   => array( 'Localização', '', 'Imóveis' ),
					'columns_content' => array( 'bi_term_name', 'bi_term_actions', 'bi_term_count' ),
					'has_actions'     => true,
					'is_link'         => true,
					'nested_table'    => array(
						'taxonomy'           => 'property_area',
						'data_reference'     => 'district',
						'icon_presence'      => false,
						'is_link'            => true,
						'empty_term_message' => 'Nenhum bairro cadastrado para esta cidade.',
					),
				);
				$this->new_term_args = array(
					'block_title' => 'Adicionar cidade',
					'taxonomy'    => 'property_city',
					'form_fields' => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-city-input',
							'type'        => 'text',
							'placeholder' => 'Nome da cidade',
							'required'    => true,
						),
					),
				);

				// 'Select' input options for district form.
				$select_options = array();
				$i              = 0;
				foreach ( $this->bcd__get_terms( 'property_city' ) as $term ) {
					$select_options[ $i ]['value']   = $term->slug;
					$select_options[ $i ]['content'] = $term->name;
					++$i;
				}
				$this->new_subitem_args = array(
					'block_title' => 'Adicionar bairro',
					'taxonomy'    => 'property_area',
					'form_fields' => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-district-input',
							'type'        => 'text',
							'placeholder' => 'Nome do bairro',
							'required'    => true,
						),
						array(
							'label'       => 'Cidade',
							'name'        => 'parent_slug',
							'id'          => 'bcd__new-district-select',
							'type'        => 'select',
							'options'     => $select_options,
							'placeholder' => 'Cidade que se encontra',
							'required'    => true,
						),
					),
				);
				break; // 'cidades-e-bairros'
			case 'tipos':
				$this->terms_table_args = array(
					'block_title'     => 'Tipos de imóvel',
					'taxonomy'        => 'property_type',
					'data_reference'  => 'type',
					'columns_title'   => array( 'Tipos de imóvel', '', 'Imóveis' ),
					'columns_content' => array( 'bi_term_name', 'bi_term_actions', 'bi_term_count' ),
					'has_actions'     => true,
					'is_link'         => true,
				);
				$this->new_term_args = array(
					'block_title'    => 'Adicionar tipo',
					'taxonomy'       => 'property_type',
					'data_reference' => 'type',
					'form_fields'    => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-type-input',
							'type'        => 'text',
							'placeholder' => 'Tipo do imóvel',
							'required'    => true,
						),
					),
				);
				break; // 'tipos'
			case 'caracteristicas':
				$this->terms_table_args = array(
					'block_title'     => 'Características dos imóveis',
					'taxonomy'        => 'property_feature',
					'data_reference'  => 'feature',
					'columns_title'   => array( 'Características', '', 'Imóveis' ),
					'columns_content' => array( 'bi_term_name', 'bi_term_actions', 'bi_term_count' ),
					'has_actions'     => true,
					'is_link'         => true,
				);
				$this->new_term_args = array(
					'block_title'    => 'Adicionar característica',
					'taxonomy'       => 'property_feature',
					'data_reference' => 'feature',
					'form_fields'    => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-feature-input',
							'type'        => 'text',
							'placeholder' => 'Nome da característica',
							'required'    => true,
						),
					),
				);
				break; // 'caracteristicas'
			case 'etiquetas':
				$this->terms_table_args = array(
					'block_title'     => 'Etiquetas dos imóveis',
					'taxonomy'        => 'property_label',
					'data_reference'  => 'type',
					'columns_title'   => array( 'Etiquetas', '', 'Imóveis' ),
					'columns_content' => array( 'bi_term_name', 'bi_term_actions', 'bi_term_count' ),
					'has_actions'     => true,
					'is_link'         => true,
				);
				$this->new_term_args = array(
					'block_title'    => 'Adicionar etiqueta',
					'taxonomy'       => 'property_label',
					'data_reference' => 'label',
					'form_fields'    => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-label-input',
							'type'        => 'text',
							'placeholder' => 'Nome da etiqueta',
							'required'    => true,
						),
					),
				);
				break;
			case 'situacoes':
				$this->terms_table_args = array(
					'block_title'     => 'Situações dos imóveis',
					'taxonomy'        => 'property_status',
					'data_reference'  => 'status',
					'columns_title'   => array( 'Situações', '', 'Imóveis' ),
					'columns_content' => array( 'bi_term_name', 'bi_term_actions', 'bi_term_count' ),
					'has_actions'     => true,
					'is_link'         => true,
				);
				$this->new_term_args = array(
					'block_title'    => 'Adicionar situação',
					'taxonomy'       => 'property_status',
					'data_reference' => 'status',
					'form_fields'    => array(
						array(
							'label'       => 'Nome',
							'name'        => 'term_name',
							'id'          => 'bcd__new-status-input',
							'type'        => 'text',
							'placeholder' => 'Nome da situação',
							'required'    => true,
						),
					),
				);
				break;
		}
	}

	private function bcd__table_output() {
		if ( null === $this->terms_table_args || null === $this->new_term_args ) {
			return;
		}
		
		$this->bcd__block( $this->bcd__term_table(), 'table-block' );
		// $this->bcd__block( bi_new_term_form( $this->new_term_args ) );

		if ( null !== $this->new_subitem_args ) {
			// $this->bcd__block( bi_new_term_form( $this->new_subitem_args ) );
		}
	}

	private function bcd__term_table() {
		$markup = '
		<div class="bcd__content--table">
			<table class="bcd__table terms">
				<thead>
					<tr>
						<th>' . esc_html( $this->terms_table_args['columns_title'][0] ) . '</th>
						<th>Imóveis</th>
		';

		$markup .= isset( $this->terms_table_args['nested_table'] ) ? '<th></th>' : '';

		$markup .= '
					</tr>
				</thead>
				<tbody>
		';

		$terms_args = array(
			'taxonomy'   => $this->terms_table_args['taxonomy'],
			'hide_empty' => false,
		);
		foreach ( get_terms( $terms_args ) as $term ) {

			$markup .= '
				<tr class="content-row" data-bcd__term_self="' . esc_attr( $term->slug ) . '">
					<td class="bcd__table--item name">
						<div class="item-name">
							<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">
								<span>' . esc_html( $term->name ) . '</span>
							</a>
						</div><!-- .item-name -->
						<div class="update-item">
							<form class="update-item--form" method="post">
								<input type="hidden" name="bcd__action" value="update">
								<input type="hidden" name="action_scope" value="term">
								<input type="hidden" name="taxonomy" value="' . esc_attr( $this->terms_table_args['taxonomy'] ) . '">
								<input type="hidden" name="term_id" value="' . esc_attr( $term->term_id ) . '">
								<input type="text" name="new_name" value="' . esc_attr( $term->name ) . '">
								<button type="submit">Atualizar</button>
							</form>
							<div class="update-item--cancel">
								<i class="fa-regular fa-circle-xmark"></i>
								<span class="update-item--cancel--tip">Cancelar edição</span>
							</div>
						</div><!-- .update-item -->
						<div class="item-actions">
							<i class="edit fa-solid fa-pen-clip"></i>
							<i class="delete fa-solid fa-trash"></i>
						</div><!-- .item-actions -->
					</td><!-- .name -->
					<td class="bcd__table--item prop-count">
						<span>' . esc_html( $term->count ) . '</span>
					</td><!-- .prop-count -->
			';

			if ( isset( $this->terms_table_args['nested_table'] ) ) {
				$markup .= '
					<td class="bcd__table--item toggle-nested">
						<div class="toggle-nested--btn">
							<svg><polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/><polygon class="arrow-middle" points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/><polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/></svg>
						</div>
					</td><!-- .toggle-nested -->
				';
			}

			$markup .=	'
				</tr><!-- .content-row -->
			';

			if ( isset( $this->terms_table_args['nested_table'] ) ) {
				$markup .= '
					<tr class="content-row nested" data-bcd__term_parent="' . $term->slug . '">
						<td>
							<table class="bcd__table terms">
								<tbody>';

				$terms_args['taxonomy'] = $this->terms_table_args['nested_table']['taxonomy'];

				$has_children = false;
				foreach ( get_terms( $terms_args ) as $child_term ) {

					$is_child = false;
					$nested_term_location = get_option( "_houzez_property_area_$child_term->term_taxonomy_id" );
					if ( isset( $nested_term_location['parent_city'] ) && $nested_term_location['parent_city'] == $term->slug ) {
						if ( ! $has_children ) {
							$has_children = true;
						}
						$is_child = true;
					}

					if ( $is_child ) {
						$markup .= '
							<tr class="content-row" data-bcd__term_self="' . $child_term->slug . '">
								<td class="bcd__table--item name">
									<div class="item-name">
										<a href="' . get_term_link( $child_term->term_id ) . '">
											<span>' . $child_term->name . '</span>
										</a>
									</div><!-- .item-name -->
									<div class="update-item">
										<form class="update-item--form" method="get">
											<input type="text" value="' . $child_term->name . '">
											<button type="submit">Atualizar</button>
										</form>
									</div><!-- .update-item -->
								</td><!-- .name -->
								<td class="bcd__table--item actions">
									<div class="actions-wrap">
										<a href="' . get_term_link( $child_term->term_id ) . '">
									</div><!-- .actions-wrap -->
								</td><!-- .actions -->
								<td class="bcd__table--item prop-count">
									' . $term->count . '
								</td><!-- .prop-count -->
								<td></td>
							</tr><!-- .content-row -->
						';
					}
				}

				if ( false === $has_children ) {
					$markup .= '<tr><td colspan="3">Nenhum bairro cadastrado para essa cidade</td></tr>';
				}

				$markup .= '
								</tbody>
							</table>
						</td>
					</tr>
				';
			}
		}
		
		$markup .= '
				</tbody>
			</table><!-- .bcd__table -->
		</div><!-- .bcd__content--table -->
		';
		
		return $markup;
	}

	private function bcd__new_term() {

	}

	private function bcd__get_terms( string $taxonomy, array $args = null ) {
		if ( null !== $args ) {
			$terms_args = $args;
		} else {
			$terms_args = array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
			);
		}
		return get_terms( $terms_args );
	}

	private function bcd__set_header_nav() {
		$this->header_nav = array(
			'Cidades e bairros' => '?mod=cidades-e-bairros',
			'Tipos de imóvel' => '?mod=tipos',
			'Características' => '?mod=caracteristicas',
			'Etiquetas' => '?mod=etiquetas',
			'Situações' => '?mod=situacoes',
		);
	}

	private function bcd__set_page_name() {
		$value = '?mod=' . $_GET['mod'];
		$this->page_name = array_search( $value, $this->header_nav, true );
	}
};
