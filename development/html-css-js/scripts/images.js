$(function(){
	var images = $('img.shuffle');
	var imgArray = [];

	$(images).each(function(i) {
		var $this = $(this);
		$this.css('z-index', i+1000);
		this.id= 'img_' + i;
		imgArray.push(this);
	});

	var zIndex = function(clicked) {
		//images.empty();
		var l = imgArray.length;
		var currentZ = $(clicked).css('z-index');
		console.log($(clicked).css('z-index'));
		$(clicked).css('z-index',currentZ -l);
		/*$(imgArray).each(function(i){
			var z = $(this).css('z-index');
			$(this).css('z-index', z+1);
		});*/
	}

	$(imgArray).on('click', function(event) {
		//var index = parseInt(this.id.slice(4));
		//imgArray.splice(index, 1);
		//imgArray.unshift(this);

		zIndex(this);
	});

	

});