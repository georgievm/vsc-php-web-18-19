// loader
$(document).ready(function() {
    $(".loader").delay(0).fadeOut("slow");
    $("#overlayer").delay(0).fadeOut("slow");
});

// home ul
$(document).ready(function() {
	$('.home-ul li').css('line-height', String($('.home-img').height()/3) + 'px');
});
$(window).resize(function() {
    $('.home-ul li').css('line-height', String($('.home-img').height()/3) + 'px');
});

// success alert fade out effect
window.setTimeout(function() {
    $(".alert-fade").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);

//print gas stations in map result page
$(document).ready(function() {

	$('.radio').change(function() {
		var fuel = this.value;

		// $('.fuel').each(function() {
		// 	if ($(this).hasClass(fuel)) {
		// 		$(this).parent().css('display', 'block');
		// 		// $('.fuel').each(function());.css('display', 'none');
		// 		$(this).siblings().css('display', 'none');
		// 		$(this).css('display', 'block');
		// 	} else {
		// 		$(this).parent().css('display', 'none');
		// 	}
		// });

		$('.gas-st-group').each(function() {
			$(this).find('.fuel').each(function() {
				if ($(this).hasClass(fuel)) {
					$(this).css('display', 'block');
				} else {
					$(this).css('display', 'none');
				}
			});
		});
	});
});
