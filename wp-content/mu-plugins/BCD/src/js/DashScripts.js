class DashScripts {
	constructor() {
		this.events();
	}

	events() {
		jQuery(function($) {
			// Toggle props options.
			$('.bcd__props_table--item.actions button').click((e) => {
				$('.action-row[data-bcd__prop_id="'+$(e.target).closest('.content-row').data('bcd__prop_id')+'"]').toggleClass('visible');
			});
		});
	}
}

export default DashScripts;