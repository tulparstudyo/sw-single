/**
 * Specific JS for the elegance theme
 * 
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2014
 */
var techie = {
	"hello": function () {
		console.log('0128ef49ef21c9f96dff2a318284342b');
	},
	"getURLVar": function (key, url) {
		var value = [];
		var query = String(url).split('?');
		if (query[1]) {
			var part = query[1].split('&');
			for (i = 0; i < part.length; i++) {
				var data = part[i].split('=');
				if (data[0] && data[1]) {
					value[data[0]] = data[1];
				}
			}

			if (value[key]) {
				return value[key];
			} else {
				return '';
			}
		}
	},
	"loadLocaleImage": function (input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				let thumb = $(input).parents('techie-img').find('.image');
				$(thumb).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
}
$(document).ready(function () {
	techie.hello();
	$('body').on('click', '.locale-select-language a', function (e) {
		e.preventDefault();
		document.cookie = "locale=" + techie.getURLVar('locale', $(this).attr('href')) + ";  Path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT";
		window.location.reload();
	});
	$('body').on('click', '.locale-select-currency a', function (e) {
		e.preventDefault();
		document.cookie = "currency=" + techie.getURLVar('currency', $(this).attr('href')) + ";  Path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT";
		window.location.reload();
	});
});

