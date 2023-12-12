<?php
/**
 * This file generates the markup for the favorite properties page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Favorite = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		// $this->bcd__block( $this->bcd__test(), '' );
		$this->bcd__prop_table();
		$this->bcd__end();
	}

	private $page_name = 'Favoritos';

	private function bcd__prop_table() {

		if ( is_user_logged_in() ) {
			$fav_ids = get_option( 'houzez_favorites-' . get_current_user_id() );
		} else {
			$fav_ids = isset( $_COOKIE['houzez_favorite_listings'] ) ? explode( ',', $_COOKIE['houzez_favorite_listings'] ) : array();
		}

		$empty = empty( $fav_ids ) ? ' empty' : false;

		$content = '<div class="bcd__content--props-table' . $empty . '">';

		if ( ! $empty ) {
			$query_args  = array(
				'posts_per_page' => -1,
				'post_type'      => 'property',
				'post_status'    => 'any',
				'post__in'       => $fav_ids,
			);
			$props_query = new WP_Query( $query_args );

			$pagination = '';

			if ( $props_query->have_posts() ) {
				$content .= '
                    <table class="bcd__props_table">
                    <thead>
                        <tr>
                            <th>Imóvel</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Situação</th>
                            <th>Comparação</th>
                            <th class="bcd__props_table--actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                ';

				while ( $props_query->have_posts() ) {
					$props_query->the_post();

					$prop_id    = get_the_ID();
					$prop_thumb = get_the_post_thumbnail_url( $prop_id, 'bcd__prop_thumb' );
					$prop_title = get_the_title( $prop_id );
					$prop_ref   = get_post_meta( $prop_id, 'fave_property_id', true );
					$prop_type  = join( ', ', wp_get_post_terms( $prop_id, 'property_type', array( 'fields' => 'names' ) ) );
					$prop_price = get_post_meta( $prop_id, 'fave_property_price', true );
					$prop_situ  = join( ', ', wp_get_post_terms( $prop_id, 'property_status', array( 'fields' => 'names' ) ) );

					$content .= '
                        <tr class="content-row" data-bcd__prop_id="' . esc_attr( $prop_id ) . '">
                        <td class="bcd__props_table--item name">
                            <img src="' . esc_url( $prop_thumb ) . '" height="50" width="50">
                            <div class="item-name">
                                <a href="' . get_post_permalink( $prop_id ) . '"><strong>' . esc_html( $prop_title ) . '</strong></a>
                                <br>
                                <span>Ref.: ' . esc_html( $prop_ref ) . '</span>
                            </div>
                        </td>
                        <td class="bcd__props_table--item type">
                            <span>' . esc_html( $prop_type ) . '</span>
                        </td>
                        <td class="bcd__props_table--item price">
                            <span>' . esc_html( bcd__brl_value( $prop_price ) ) . '</span>
                        </td>
                        <td class="bcd__props_table--item situation">
                            <span>' . esc_html( $prop_situ ) . '</span>
                        </td>
                        <td class="bcd__props_table--item compare">
                            <i class="fa-solid fa-circle-plus"></i>
                        </td>
                        <td class="bcd__props_table--item actions">
                            <span title="Remover"><i class="fa-solid fa-trash"></i></span>
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
				$content .= '<span class="bcd__content--no-posts">Você ainda não adicionou nenhum imóvel aos favoritos.</span>';
			}
		} else {
			$content .= '<span class="bcd__content--no-posts">Você ainda não adicionou nenhum imóvel aos favoritos.</span>';
		}

		$content .= '</div><!-- .bcd__content--props-table -->';

		$this->bcd__block( $content, 'table-block favorite' );
		// $this->bcd__block( $pagination, 'pagination-block' );
		wp_reset_postdata();
	}

	private function bcd__prop_actions( int $prop_id ) {
		$view_prop = get_post_permalink( $prop_id );
		$edit_prop = home_url( bcd__urls( 'edit_prop' ) . '?imovel=' . $prop_id );

		$content = '
            <div class="actions-wrap">
                <a href="#"><i class="fa-solid fa-trash"></i><span>Remover</span></a>
            </div><!-- .actions-wrap -->
        ';

		return $content;
	}
};
