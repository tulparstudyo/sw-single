/*
 * Custom sw-techie JS
 */
function loadLocaleImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
				let thumb = $(input).parents('.techie-img').find('.image');
				console.log(thumb);
                $(thumb).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

$(document).ready(function(){
	$('.htmleditor').each(function(){
		CKEDITOR.replace( this ,{allowedContent : true, removeFormatAttributes :''});
	});
	$.get( "/admin/default/jqadm/get/swordbros/techie/admin-bar", function( data ) {
		$('.app-menu').prepend(data);
	});
	$('body').on('change', '.techie-img .image-file', function(){
		loadLocaleImage(this);
	});

});
