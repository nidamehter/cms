/* Sayfada başka işlem yapılmasını 2.5 saniye engellem */
$('#block-page').on('click', function() {
	$.blockUI({
			message: 'Lütfen Bekleyiniz...<i class="icon-spinner4 spinner"></i><br/><img src="/cms/views/public/src/image/wait.jpg" />',
			timeout: 3000,
			overlayCSS: {
				backgroundColor: '#1b2024',
				opacity: 0.8,
				cursor: 'wait'
			},
			css: {
				border: 0,
				color: '#fff',
				padding: 0,
				backgroundColor: 'transparent'
				}
			});
});