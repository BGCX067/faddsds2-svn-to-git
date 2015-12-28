jQuery.fn.doFade = function(settings) {

    // if no paramaters supplied...
	settings = jQuery.extend({
		fadeColor: "black",
		duration: 200,
		fadeOn: 0.95,
		fadeOff: 0.5
	}, settings);

    var duration = settings.duration;
    var fadeOff = settings.fadeOff;
    var fadeOn = settings.fadeOn;
    var fadeColor = settings.fadeColor;
        
    $(this).hover(function(){
	  $(this)
	      .stop()
	      .data("origColor", $(this).css("background-color"))
	      .animate({
	          opacity: fadeOn,
	          backgroundColor: fadeColor
	      }, duration)
	}, function() {
	  $(this)
	      .stop()
	      .animate({
	          opacity: fadeOff,
	          backgroundColor: $(this).data("origColor")
	      }, duration)
	});

};

$(function(){

   $("#stage ul").css("opacity", "0.5");
   
   $("#stage ul").doFade({ fadeColor: "#94B3C5" });
   $("#stage ul ul").doFade({ fadeColor: "#2A3B63" });
   $("#stage ul ul ul").doFade({ fadeColor: "#304531" });
   $("#stage ul ul ul ul").doFade({ fadeColor: "#72352d" });

});