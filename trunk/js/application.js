

window.addEvent('domready', function(){


$('menuList').getElements('li').each(function(element, index){
	element.addEvents({
		'mouseenter': function(){
			// Always sets the duration of the tween to 1000 ms and a bouncing transition
			// And then tweens the height of the element
				//this.removeClass('current')
			$('menuList').getElements('li').each(function(element2, index2){
				
				element2.removeClass('current');
				
				$('contentList').getElements('li[class^="content"]').each(function(element3, index3){
																				   
																				   
												
											if(index == index3){
												element3.setStyle('display', 'block');
											}else{
												element3.setStyle('display', 'none');
											}
															   });
			});
			this.addClass('current');
		//	this.set('tween', {
		//		duration: 1000,
		//		transition: Fx.Transitions.Bounce.easeOut // This could have been also 'bounce:out'
		//	}).tween('height', '150px');
		},
		'mouseleave': function(){
			// Resets the tween and changes the element back to its original size
			//this.set('tween', {}).tween('height', '20px');
		}
	});
});


									 });

