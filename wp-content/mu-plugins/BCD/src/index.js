// SCSS import.
import "././scss/global.scss";
import "././scss/header.scss";
import "././scss/sidebar.scss";
import "././scss/content.scss";

// Scripts import.
import DashScripts from "./js/DashScripts";

jQuery(document).ready(() => {
	const dashScripts = new DashScripts();
});