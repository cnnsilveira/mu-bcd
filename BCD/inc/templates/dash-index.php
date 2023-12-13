<?php
/**
 * This file generates the markup for the index page.
 *
 * @package BCD Platform
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Home = new class() extends BCD__Template {
	// Main attr.
	private $author_id;
	private $user_id;
	private $insights;
	private $insights_stats;
	private $local;

	// Chart info.
	private $count_label;
	private $chart_data;
	private $other_data;
	private $type;
	private $total;

	public function __construct() {
		$this->page_name = 'Dashboard';

		$this->bcd__set_attr();

		$this->bcd__start( $this->page_name );
		$this->bcd__small_chart( 'devices', 'Dispositivos', '<i class="fa-solid fa-tv"></i>' );
		$this->bcd__small_chart( 'browsers', 'Navegadores', '<i class="fa-brands fa-chrome"></i>' );
		$this->bcd__large_chart( 'Visitas', '<i class="fa-solid fa-chart-line"></i>' );
		$this->bcd__end();
	}

	private function bcd__set_attr() {
		$this->author_id      = 0;
		$this->user_id        = get_current_user_id();
		$this->insights       = new Fave_Insights();
		$this->insights_stats = $this->insights->fave_user_stats( $this->user_id );
		$this->local          = houzez_get_localization();
	}

	private function bcd__chart_info( $type ) {
		$this->count_label = $this->local['views_label'];
		$this->chart_data  = array();
		$this->other_data  = array();
		$this->type        = $this->insights_stats['others'][ $type ];
		$this->total       = count( $this->type );
	}

	private function bcd__chart_period( $chart_period, $canvas_id ) {
		$period = $this->insights_stats['charts'][ $chart_period ];
		
		$views = $unique_views = $labels = array();

		foreach ( $period as $value ) {
			$views[]        = $value['views'];
			$unique_views[] = $value['unique_views'];
			$labels[]       = isset($value['label']) ? $value['label'] : '';
		}

		return '
		<canvas
			id="' . $canvas_id . '"
			data-labels=\'' . json_encode( $labels ) . '\' 
			data-views=\'' . json_encode( $views ) . '\'
			data-unique=\'' . json_encode( $unique_views ) . '\'
			data-visit-label=\'' . esc_attr( $this->local['visits_label'] ) . '\'
			data-unique-label=\'' . esc_attr( $this->local['unique_label'] ) . '\' 
			height="65"
		></canvas>';
	}

	private function bcd__chart_title( $title, $icon, $tabs = '' ) {
		$tabs = '' === $tabs ? '' : '
		<div class="bcd__chart--tabs">
			' . $tabs . '
		</div><!-- .bcd__chart--tabs -->
		';

		$title = '
			<div class="bcd__chart--title">
				<div class="bcd__chart--heading">
					<div class="icon">' . wp_kses_post( $icon ) . '</div>
					<h3>' . esc_html( $title ) . '</h3>
				</div><!-- .bcd__chart--heading -->
				' . $tabs . '
			</div><!-- .bcd__chart--title -->
		';

		return $title;
	}

	private function bcd__large_chart( $title, $icon ) {
		$output = $this->bcd__chart_title( $title, $icon, '
			<ul class="nav nav-pills" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#chart-24h" role="tab">
						24 horas
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#chart-7days" role="tab">
						7 dias
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#chart-30days" role="tab">
						30 dias
					</a>
				</li>
			</ul>' 
		);
		$output .= '
		<div class="bcd__chart--content">
			<div class="tab-pane fade show active" id="chart-24h" role="tabpanel">
				' . $this->bcd__chart_period( 'lastday', 'visits-chart-24h' ) . '
			</div>
			<div class="tab-pane fade" id="chart-7days" role="tabpanel">
				' . $this->bcd__chart_period( 'lastweek', 'visits-chart-7d' ) . '
			</div>
			<div class="tab-pane fade" id="chart-30days" role="tabpanel">
				' . $this->bcd__chart_period( 'lastmonth', 'visits-chart-30d' ) . '
			</div>
		</div><!-- bcd__chart--content -->
		';

		$this->bcd__block( $output, 'bcd__chart' );
	}

	private function bcd__small_chart( $type, $title, $icon ) {
		// Set chart info.
		$this->bcd__chart_info( $type );

		$j = 0;
		foreach ( $this->type as $b ) {
			++$j;

			if ( $this->total > 4 ) {
				if ( $j <= 3 ) {
					$this->chart_data[] = $b['count'];
				} else {
					$this->other_data[] = $b['count'];
				}
			} else {

				$this->chart_data[] = $b['count'];
			}
		}

		$total_other_data  = array_sum( $this->other_data );
		$num_other_records = count( $this->other_data );

		if ( $num_other_records > 0 ) {
			$this->chart_data[] = $total_other_data;
		}

		$output = '
		<div class="bcd__chart--' . $type . '">
			' . $this->bcd__chart_title( $title, $icon ) . '
			<div class="bcd__chart--content">
				<div class="bcd__chart--data">
					<ul>
		';

		$i = 0;
		foreach ( $this->type as $item ) {
			++$i;

			// if ( $num_other_records > 0 ) {
			// 	if ( $i == 4 ) {
			// 		break;
			// 	}
			// }

			$item_name  = $item['name'];
			$item_count = $item['count'];

			if ( empty( $item_name ) ) {
				$item_name = esc_html__( 'Unknown', 'houzez' );
			}

			$count_label = 1 == $item_count ? $this->local['view_label'] : $this->count_label;

			$output .= '
			<li class="stats-data-' . $i . '">
				<i class="fa-regular fa-circle"></i>
				<strong>' . esc_attr( $item_name ) . '</strong> 
				<span>' . number_format_i18n( $item_count ) . ' <small>' . $count_label . '</small></span>
			</li>
			';
		}


		$num = '4';
		if ( $j <= 2 ) {
			$num = '3';
		}
		if ( $total_other_data == 1 ) {
			$this->count_label = $this->local['view_label'];
		}

		$output .= '
		<li class="stats-data-' . $num . '">
			<i class="fa-regular fa-circle"></i>
			<strong>' . esc_html__( 'Other', 'houzez' ) . '</strong> 
			<span>' . number_format_i18n( $total_other_data ) . ' <small>' . $this->count_label . '</small></span>
		</li>
		';
		
		$output .= '
				</ul>
			</div><!-- .bcd__chart--data -->';

		$output .= '
			<div class="bcd__chart--doughnut">
				<canvas 
					id="' . $type . '-doughnut-chart"
					data-chart=\'' . json_encode( $this->chart_data ) . '\' 
					width="100" height="100"
				></canvas>
			</div><!-- bcd__chart--doughnut -->
		</div><!-- .bcd__chart--content -->
	';

		$output .= '</div><!-- dashboard-statistic-block -->';

		$this->bcd__block( $output, 'bcd__chart half' );
	}
};
