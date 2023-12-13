// SCSS import.
import "./scss/styles.scss";

// Scripts import.
import BCD_Scripts from "./js/DashScripts";
import BCD_Chart from "./js/Chart";

jQuery(document).ready(() => {
	const dashScripts = new BCD_Scripts();
	const dashChart = new BCD_Chart();
});