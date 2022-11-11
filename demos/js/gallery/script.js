function gallery(preview, num, withName = '') {
	if (num > 0) {
		var imgNames = ['bird', 'dubai', 'elephant', 'fall', 'lotus', 'nature', 'railroad-tracks'],
			containers = document.getElementsByClassName('container'),
			previewName = document.getElementsByClassName('previewName')[0];

		preview.src = 'images/' + imgNames[0] + '.jpg';
		previewName.textContent = imgNames[0];

		for (var i = 0; i < num; i++) {
			if (imgNames[i].includes(withName)) {
				var newCon = document.createElement('div'),
					conImgName = document.createElement('div'),
					conImg = document.createElement('img');

				newCon.className = 'container';
				if (i == 0) {
					newCon.style.background = '#4e7eb1';
				}
				conImgName.className = 'conImgName';
				conImgName.textContent = imgNames[i];
				conImg.className = 'conImg';
				conImg.src = 'images/' + imgNames[i] + '.jpg';
				conImg.alt = 'images/' + imgNames[i] + '.jpg';
				newCon.appendChild(conImgName);
				newCon.appendChild(conImg);
				document.getElementsByClassName('sideBar')[0].appendChild(newCon);
			}
		}
		for (let container of containers) {
			// hover effects
			container.addEventListener('mouseover', function() {
				container.style.background = '#4e7eb1';
				container.style.transition = 'background-color 0.65s';
			});
			container.addEventListener('mouseout', function() {
				if (container.lastChild.src != preview.src) {
					container.style.background = 'transparent';
				}
			});
			// click event
			container.addEventListener('click', function() {
				previewName.textContent = container.firstChild.textContent;
				preview.src = 'images/' + container.firstChild.textContent + '.jpg';
				for (let container of containers) {
					if (container.lastChild.src != preview.src) {
						container.style.background = 'transparent';
					}
				}
			});
		}
	} else {
		document.getElementsByClassName('leftZn')[0].style.display = 'none';
		document.getElementsByClassName('sideBar')[0].style.display = 'none';
		document.write('<div class="error">Invalid <span class="font-weight-bold">num</span> function parameter!</div>');
	}
}
