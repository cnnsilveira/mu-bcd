// SCSS import.
import "./scss/global.scss";
import "./scss/header.scss";
import "./scss/sidebar.scss";
import "./scss/tables.scss";
import "./scss/charts.scss";

// Scripts import.
import BCD_Scripts from "./js/DashScripts";
import BCD_Chart from "./js/Chart";

jQuery(document).ready(() => {
	const dashScripts = new BCD_Scripts();
	const dashChart = new BCD_Chart();
});