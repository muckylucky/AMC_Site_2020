$(function(){
	var images = $('img.shuffle');
	var imgArray = [];
	$(images).each(function(i) {
		var $this = $(this);
		$this.css('z-index', i);
		this.id= 'img_' + i;
		imgArray.push(this);
	});


	console.log(imgArray);
});