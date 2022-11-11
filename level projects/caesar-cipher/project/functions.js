function submitText() {
	var text = $('textarea').val();
	if (text.trim().length === 0) {
		alert('Empty field!');
	} else if (!text.match(/[a-zA-Z]/g)) {
		alert('The text must includes LETTERS!');
	} else {
		$('textarea').val(text.trim());
		$('.container-zone').css('display', 'block').html('');
		decodeText(text);
	}
}
function decodeText(text) {
	var alph = 'abcdefghijklmnopqrstuvwxyz'.split(''),
		mostFreq = findMostFreq(text),
		shift,
		shiftedAlph,
		result;

	$('.most-freq')
		.css('display', 'block')
		.html('<u>Most Frequent Symbol:</u> '+'<span style="color: #fff; text-shadow: 1.5px 1.5px 1px #404040;">'+mostFreq+' ['+alph.indexOf(mostFreq)+']</span>');
	for (var i = 0; i < alph.length; i++) {
		result = '';
		shift = alph.indexOf(alph[i]) - alph.indexOf(mostFreq);
		shiftedAlph = shiftAlph(alph, shift);
		
		// create new variant
		for (var j = 0; j < text.length; j++) {
			if (text[j].match(/[a-zA-Z]/g)) {
				if (text[j] == text[j].toLowerCase()) {
					result += alph[shiftedAlph.indexOf(text[j])];
				} else {
					result += alph[shiftedAlph.indexOf(text[j].toLowerCase())].toUpperCase();
				}
			} else {
				result += text[j];
			}
		}
		// create new container
		$('.container-zone').append($('<div>')
			.addClass('container ' + alph[i])
			.append($('<div>')
				.addClass('con-info')
				.html('<span class="con-info-bold">'+alph[i]+', SHIFT: '+shift+'</span> '+'('+alph[0]+' &#8658; '+shiftedAlph[0]+')'))
			.append($('<div>')
				.addClass('con-result')
				.text(result))
		);
	}
	// make only e/t/h containers visible
	$('.container').css('display', 'none');
	$('.container').each(function () {
		if ($(this).hasClass('e') || $(this).hasClass('h') || $(this).hasClass('t')) {
			$(this).css('display', 'block');
		}
	});
	$('.btn-show-all').css('display', 'block');
	$('.btn-top').css('display', 'none');
	$('html, body').animate({scrollTop: $('textarea').offset().top + (-25)}, 1600);
}
function findMostFreq(text) {
	text = text.toLowerCase().replace(/ /g, '');
	var max = 0, 
		mostFreq,
		counter = 0,
		current;
	for (var i = 0; i < text.length; i++) {
		current = text[i];
		for (var j = 0; j < text.length; j++) {
			if (current == text[j]) {
		    	counter++;
			}
		}
		if (max < counter) {
			max = counter;
			mostFreq = current;
		}
		counter = 0;
	}
	return mostFreq;
}
function shiftAlph(alph, shift) {
	if (shift > 0) {
		alph = alph.concat(alph.slice(0, shift)); // concatenate the elements for shifting (...xyzabc)
		alph = alph.slice(shift); // remove them from the beginning (def...)
	} else if (shift < 0) { // the opposite
		alph = (alph.slice(shift)).concat(alph); // (xyzabc...)
		alph = alph.slice(0, shift); // (...uvw)
	}
	return alph;
}
function showAllContainers() {
	$('html, body').animate({scrollTop: $('.most-freq').offset().top + (-15)}, 1600);
	$('.container').css('display', 'block');
	$('.btn-show-all').css('display', 'none');
	$('.btn-top').css('display', 'block');
}