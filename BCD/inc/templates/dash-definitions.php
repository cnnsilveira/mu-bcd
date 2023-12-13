<?php
/**
 * This file generates the markup for the definitions page.
 *
 * @package BCD Platform
 */

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
		$this->bcd__term_table();
		$this->bcd__end();
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
				foreach ( bi_get_terms( 'property_city' ) as $term ) {
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
					'columns_title'   => array( 'Tipos', '', 'Imóveis' ),
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

	private function bcd__term_table() {
		if ( null === $this->terms_table_args || null === $this->new_term_args ) {
			return;
		}
		
		$this->bcd__block( bi_terms_table( $this->terms_table_args ) );
		$this->bcd__block( bi_new_term_form( $this->new_term_args ) );

		if ( null !== $this->new_subitem_args ) {
			$this->bcd__block( bi_new_term_form( $this->new_subitem_args ) );
		}
	}

	private function bcd__default_page() {
		if ( ! isset( $_GET['mod'] ) ) {
			$defaut_page = '?mod=cidades-e-bairros';

			wp_safe_redirect( home_url( bcd__urls( 'definitions' ) . $defaut_page ) );
		}
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

	private function bcd__pages_info( string $option = null ) {
		$options = array(
			'cidades-e-bairros' => array(
				'template' => 'cities.php',
				'taxonomy' => array( 'property_city', 'property_area' ),
				'name'     => 'Cidades e bairros',
			),
			'tipos'             => array(
				'template' => 'types.php',
				'taxonomy' => array( 'property_type' ),
				'name'     => 'Tipos de imóvel',
			),
			'caracteristicas'   => array(
				'template' => 'features.php',
				'taxonomy' => array( 'property_feature' ),
				'name'     => 'Características',
			),
			'etiquetas'         => array(
				'template' => 'labels.php',
				'taxonomy' => array( 'property_label' ),
				'name'     => 'Etiquetas',
			),
			'situacoes'         => array(
				'template' => 'status.php',
				'taxonomy' => array( 'property_status' ),
				'name'     => 'Situações',
			),
		);
		if ( null !== $option ) {
			return array_key_exists( $option, $options ) ? $options[ $option ] : false;
		}
		return $options;
	}
	
	/**
	 * Outputs the template according to the request.
	 *
	 * @package bi_custom_code
	 * @since 1.0.0
	 * @source /houzez/bi-custom/inc/cities-options/bi-cities-options.php
	 */
	private function bcd__table_info() {
		$pages_info = isset( $_GET['mod'] ) ? bi_prop_options_info( $_GET['mod'] ) : false;
		if ( $pages_info ) {
			echo bi_content_start( 'Definições do imóvel', array( 'type' => 'menu' ) );
			require_once BIC_DIR . '/inc/cities-options/templates/' . $pages_info['template'];
			echo bi_content_end();
			return;
		}
	}
};
