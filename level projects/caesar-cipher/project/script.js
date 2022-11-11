$('.btn-try-it').on('click', function() {
	$('.decode-pnl').css('display', 'block');
	$('html, body').animate({scrollTop: $('.decode-pnl').offset().top + (-25)}, 2000);
	$('textarea').focus();
});
$('.btn-decode').on('click', function(e) {
	e.preventDefault();
	submitText();
});
$('.btn-top').on('click', function() {
	$('html, body').animate({scrollTop: $('textarea').offset().top + (-25)}, 500);
});