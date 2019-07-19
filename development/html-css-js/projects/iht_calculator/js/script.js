$(function() {
	function popup(){
		var modals = $('.popup_content'); //Store all pop-up content into array
		var triggers = $('.popup_trigger'); //Same with their respective links
		var closeLink = '<a href="#" id="modal_close"></a>';
		
		$(modals).remove().appendTo('body');
		/*Run through each link in array and assign unique ID via the hash in href */
		/* Note that while popups do not have to be directly after their respective links, the links & popups MUST be in the same order to match-up */
		triggers.each(function(i){
			var $this = $(this);
			$this.attr('href', '#' + i);
			
		});
		
		/*run through each pop-up and assign unique ID to match respective links above ^^ */
		modals.each(function(i){
			var $this = $(this);
			$this.hide().attr('id', 'content_' + i);
			
		});
		
		
		/*initiate link click behaviour */
		triggers.click(function(e){
			e.preventDefault();
			var id = this.hash.slice(1); 					//use hash function to grab unique id to reference with popup content
			var maskHeight = $(document).height();			//Set mask width to browser window
			var maskWidth = $(window).width();				//You get the idea
			var winH = $(window).height();  				//Will use this to determine mid-point on screen for popup
			var winW = $(window).width(); 					//Same for width
			var offset = $(window).scrollTop();				//Get the offset if window is scrolled
			$('#mask').css({'width':maskWidth,'height':maskHeight, 'top':0, 'left':0})		//Set height and width to mask to fill up the whole screen
							.fadeTo(100, 1)
							.fadeTo(300, 0.6, function(){
												/*Callback function to bring in popup after mask has finished animating */ 																				
											   $('#content_' + id).append(closeLink);
											   $('#content_' + id).css({'top': winH/2-($('#content_' + id).height()/2) + offset , 'left': winW/2-($('#content_' + id).width()/2)})
											   .fadeIn(200); 
										})
							.on('click', function() { //Object not 'live' yet so use "on" to add click behaviour
											$(this).fadeOut(200);
											$('#content_' + id).fadeOut(100); // !!Use fadeOut NOT Remove, otherwise cannot re-use function
											$('#modal_close').remove();
								});
							
			
			$(document).on('click', '#modal_close, #inline_close', function(){
								$('.popup_content').fadeOut(100);
								$('#mask').fadeOut(200);
								return false;
			});	
		
		
		}); // End CLICK Function
		
		
	} // End Function
	
	popup();
	
	
});