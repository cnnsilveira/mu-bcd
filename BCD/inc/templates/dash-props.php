<?php
/**
 * This file generates the markup for the property lists page.
 *
 * @package BCD Platform
 */

defined( 'ABSPATH' ) || exit;

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Props = new class() extends BCD__Template {
	public function __construct() {
		$this->page_name = 'Imóveis';
		
		$this->bcd__start( $this->page_name );
		// $this->bcd__block( $this->bcd__test(), '' );
		$this->bcd__prop_table();
		$this->bcd__end();
	}

	private function bcd__status_label( string $status ) {
		$labels = array(
			'publish'     => 'Publicado',
			'pending'     => 'Pendente',
			'expired'     => 'Expirado',
			'draft'       => 'Rascunho',
			'disapproved' => 'Reprovado',
			'on_hold'     => 'Privado',
			'houzez_sold' => 'Vendido',
		);
		return '<span class="bcd__table--status-tag ' . $status . '">' . $labels[ $status ] . '</span>';
	}

	private function bcd__prop_table() {

		$paged       = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$query_args  = array(
			'posts_per_page' => -1,
			'post_type'      => 'property',
			'post_status'    => 'any',
		);
		$props_query = new WP_Query( $query_args );

		$pagination = '';

		$content = '<div class="bcd__content--table">';
		$empty = '';
		if ( $props_query->have_posts() ) {
			$content .= '
                <table class="bcd__table props">
                <thead>
                    <tr>
                        <th>Imóvel</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Situação</th>
                        <th>Destaque</th>
                        <th>Status</th>
                        <th class="bcd__table--actions"></th>
                    </tr>
                </thead>
                <tbody>
            ';

			while ( $props_query->have_posts() ) {
				$props_query->the_post();

				$prop_id       = get_the_ID();
				$prop_thumb    = get_the_post_thumbnail_url( $prop_id, 'bcd__prop_thumb' );
				$prop_title    = get_the_title( $prop_id );
				$prop_ref      = get_post_meta( $prop_id, 'fave_property_id', true );
				$prop_type     = join( ', ', wp_get_post_terms( $prop_id, 'property_type', array( 'fields' => 'names' ) ) );
				$prop_price    = get_post_meta( $prop_id, 'fave_property_price', true );
				$prop_situ     = join( ', ', wp_get_post_terms( $prop_id, 'property_status', array( 'fields' => 'names' ) ) );
				$prop_featured = get_post_meta( $prop_id, 'fave_featured', true ) ? 'true' : 'false';
				$featured_icon = get_post_meta( $prop_id, 'fave_featured', true ) ? '<i class="fa-solid fa-circle-check"></i>' : '<i class="fa-solid fa-circle-xmark"></i>';
				$prop_status   = get_post_status( $prop_id );

				$content .= '
                    <tr class="content-row" data-bcd__prop_id="' . esc_attr( $prop_id ) . '">
                    <td class="bcd__table--item name">
                        <img src="' . esc_url( $prop_thumb ) . '" height="50" width="50">
                        <div class="item-name">
                            <a href="' . bcd__urls( 'edit_prop' ) . '?imovel=' . $prop_id . '"><strong>' . esc_html( $prop_title ) . '</strong></a>
                            <br>
                            <span>Ref.: ' . esc_html( $prop_ref ) . '</span>
                        </div>
                    </td>
                    <td class="bcd__table--item type">
                        <span>' . esc_html( $prop_type ) . '</span>
                    </td>
                    <td class="bcd__table--item price">
                        <span>' . esc_html( bcd__brl_value( $prop_price ) ) . '</span>
                    </td>
                    <td class="bcd__table--item situation">
                        <span>' . esc_html( $prop_situ ) . '</span>
                    </td>
                    <td class="bcd__table--item featured ' . esc_attr( $prop_featured ) . '">
                        ' . wp_kses_post( $featured_icon ) . '
                    </td>
                    <td class="bcd__table--item status">
                        ' . wp_kses_post( $this->bcd__status_label( $prop_status ) ) . '
                    </td>
                    <td class="bcd__table--item actions">
                        <button class="menu" onclick="this.classList.toggle(\'opened\')" aria-label="Main Menu">
                            <svg width="35" height="35" viewBox="0 0 100 100">
                                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                <path class="line line2" d="M 20,50 H 80" />
                                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="action-row" data-bcd__prop_id="' . $prop_id . '">
                    <td>
                        <div>
                            ' . $this->bcd__prop_actions( $prop_id ) . '
                        </div>
                    </td>
                </tr>
                ';
			}

			$content .= '
                </tbody>
            </table>
            ';

			$big        = 999999999;
			$pagination = paginate_links(
				array(
					'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format'  => '?paged=%#%',
					'current' => max( 1, get_query_var( 'paged' ) ),
					'total'   => $props_query->max_num_pages,
				)
			);

		} else {
			$content .= '<span class="bcd__content--no-posts">Nenhum imóvel encontrado.</span>';
			$empty = ' empty';
		}

		$content .= '</div><!-- .bcd__content--props-table -->';

		$this->bcd__block( $content, 'table-block' . $empty );
		// $this->bcd__block( $pagination, 'pagination-block' );
		wp_reset_postdata();
	}

	private function bcd__prop_actions( int $prop_id ) {
		$view_prop = get_post_permalink( $prop_id );
		$edit_prop = home_url( bcd__urls( 'edit_prop' ) . '?imovel=' . $prop_id );

		$content = '
            <div class="actions-wrap">
                <a href="' . $view_prop . '"><i class="fa-solid fa-arrow-up-right-from-square"></i><span>Ver imóvel</span></a>
                <a href="' . $edit_prop . '"><i class="fa-solid fa-pen-to-square"></i><span>Editar imóvel</span></a>
                <a href="#"><i class="fa-solid fa-copy"></i><span>Duplicar imóvel</span></a>
                <a href="#"><i class="fa-solid fa-chart-simple"></i><span>Estatísticas do imóvel</span></a>
                <a href="#"><i class="fa-solid fa-trash"></i><span>Deletar imóvel</span></a>
            </div><!-- .actions-wrap -->
        ';

		return $content;
	}
};
