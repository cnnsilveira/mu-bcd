<?php
/**
 * This file generates the markup for the index page.
 *
 * @package BCD
 */

// Redirects, enqueues, body classes, etc.
$BCD__Reset = new BCD__Reset();

// Content.
$BCD__Home = new class() extends BCD__Template {
	public function __construct() {
		$this->bcd__start( $this->page_name );
		$this->bcd__block( 'Página principal da dashboard' );
		$this->bcd__chart();
		$this->bcd__end();
	}

	private $page_name = 'Dashboard';

	private function bcd__chart() {
		$insights       = new Fave_Insights();
		$insights_stats = $insights->fave_user_stats( get_current_user_id() );
		$houzez_local   = houzez_get_localization();

		$count_label = $houzez_local['views_label'];
		$chart_data  = array();
		$other_data  = array();
		$devices     = $insights_stats['others']['devices'];

		$total_devices = count( $devices );

		$j = 0;
		foreach ( $devices as $b ) {
			++$j;

			if ( $total_devices > 4 ) {
				if ( $j <= 3 ) {
					$chart_data[] = $b['count'];
				} else {
					$other_data[] = $b['count'];
				}
			} else {

				$chart_data[] = $b['count'];
			}
		}

		$total_other_data = array_sum( $other_data );

		$num_other_records = count( $other_data );
		if ( $num_other_records > 0 ) {

			$chart_data[] = $total_other_data;
		}

		$output = '
		<div class="dashboard-content-block dashboard-statistic-block">
			<h3><i class="fa-solid fa-mobile-screen"></i>Dispositivos</h3>';

		if ( ! empty( $devices ) ) {
			$output .= '
			<div class="d-flex align-items-center sm-column">
				<div class="statistic-doughnut-chart">
					<canvas id="devices-doughnut-chart" data-chart="' . json_encode( $chart_data ) . '" width="100" height="100"></canvas>
				</div><!-- mortgage-calculator-chart -->
				<div class="doughnut-chart-data flex-fill">
					<ul class="list-unstyled">
            ';

			$i = 0;
			foreach ( $devices as $device ) {
				++$i;

				if ( $num_other_records > 0 ) {
					if ( $i == 4 ) {
						break;
					}
				}

				$device_name  = $device['name'];
				$device_count = $device['count'];

				if ( empty( $device_name ) ) {
					$device_name = esc_html__( 'Unknown', 'houzez' );
				}

				if ( $device_count == 1 ) {
					$count_label = $houzez_local['view_label'];
				}

				$output .= '
                <li class="stats-data-' . $i . '">
                    <i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
                    <strong>' . esc_attr( $device_name ) . '</strong> 
                    <span>' . number_format_i18n( $device_count ) . ' <small>' . $count_label . '</small></span>
                </li>
                ';
			}

			if ( ! empty( $num_other_records ) ) {

				$num = '4';
				if ( $j <= 2 ) {
					$num = '3';
				}
				if ( $total_other_data == 1 ) {
					$count_label = $houzez_local['view_label'];
				}

				$output .= '
                <li class="stats-data-' . $num . '">
                    <i class="houzez-icon icon-sign-badge-circle mr-1"></i> 
                    <strong>' . esc_html__( 'Other', 'houzez' ) . '</strong> 
                    <span>' . number_format_i18n( $total_other_data ) . ' <small>' . $count_label . '</small></span>
                </li>
                ';
			}
			$output .= '		
					</ul>
				</div><!-- mortgage-calculator-data -->
			</div><!-- d-flex -->';
		}
		$output .= '</div><!-- dashboard-statistic-block -->';

		$this->bcd__block( $output );
	}
};
