$(document).ready(function(e){
	bgHeight();
	$(".model_list li a").click(function(e){
		$(".model_list li a").removeClass("active");
		$(this).addClass("active");
	});
	$(".delete_profile").click(function(e){
		e.preventDefault();
		$(".delete_overlay,.delete_box").addClass("active");
	});
	$(".edit_profile_hed a.delete_profile").click(function(e){
		e.preventDefault();
		$(".delete_overlay,.delete_box").addClass("active");
	});
	$(".box-body .no,.box-header i").click(function(e){
		e.preventDefault();
		$(".delete_overlay,.delete_box").removeClass("active");
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$(".addPicture").hide();
				$(".edirPicture").show();
				$('#imagePreview').css('background-image', 'url('+e.target.result +')');
				$('#imagePreview').hide();
				$('#imagePreview').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload").change(function() {
		readURL(this);
	});


});
$(window).resize(function(e){
	bgHeight();
});
function bgHeight(){
	var windowHeight = $(window).height();
	$(".main_bg").css("min-height",windowHeight);
}
'use strict';
;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));

(function ($) {
	$(document).ready(function () {
		// uploadImage()
		function uploadImage() {
			var button = $('.images .pic')
			var uploader = $('<input type="file" accept="image/*" />')
			var images = $('.images')
			button.on('click', function () {
				// $("#uploadModal").modal('show');
				uploader.click()
			});
			uploader.on('change', function () {
				var reader = new FileReader()
				reader.onload = function(event) {
					var totalImage = $( ".images div" ).length;
					if(totalImage < 8){
						if(totalImage > 2){
							$(".images .pic").before('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
						}
						else{
							images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>')
						}
					}
					else{
						alert("You can add maximum 6 pictures.")
					}
				}
				reader.readAsDataURL(uploader[0].files[0])
			});
			images.on('click', '.img', function () {
				$(this).remove()
			});
		}
	})
})(jQuery);