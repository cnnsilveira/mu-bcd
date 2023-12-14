class BCD_Scripts {
	constructor() {
		this.events();
	}

	events() {
		jQuery(function($) {
			// Toggle props options.
			$('.bcd__table--item.actions button').click((e) => {
				$('.action-row[data-bcd__prop_id="'+$(e.target).closest('.content-row').data('bcd__prop_id')+'"]').toggleClass('visible');
			});

			$('.bcd__table .item-actions .edit').click((e) => {
				let updateBox = $(e.target).closest('td').find('.update-item');
				$(updateBox).addClass('active');
				setTimeout(() => {
					$(updateBox).find('input[type="text"]').focus();
				}, 205);
			});

			$('.bcd__table .update-item--cancel').click((e) => {
				$(e.target).closest('.update-item').removeClass('active');
			});

			$(window).on('load', () => {
				$('.bcd__table .update-item--form input[type="text"]').each((index, selector) => {
					$(selector).css('width', ($(selector).val().length + 2) + 'ch');
				});
			});
		});
	}
}

export default BCD_Scripts;