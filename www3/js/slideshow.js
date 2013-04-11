YUI().use("node","transition",function(Y) {

    var 
    currentSlide = 1,
    
    currentTimer = null,
    changeSlide = function(toSlide) {
	
	if(!document.getElementById("slide"+toSlide)) {
	    toSlide=1;
	} 
	Y.one("#slide"+currentSlide).transition({
	    duration:1,
	    opacity:0,
	    on : {
		end : function() {
		    this.addClass("hidden");
		    Y.one("#slide"+toSlide).removeClass("hidden");
		    Y.one("#slide"+toSlide).setStyle("opacity",'.9');
		},
	    }
	});
	
	    currentSlide = toSlide;
	    currentTimer = setTimeout(function() {changeSlide(currentSlide+1)},4000);
	
    }
    
    switchSlide = function(e) {
	clearTimeout(currentTimer);
	var selectedSlide = e.currentTarget.get("id").slice(-1);
	changeSlide(parseInt(selectedSlide));
    };
    
    // start the slide show
    Y.one("#slide1").removeClass("hidden");
    currentTimer = setTimeout(function() {changeSlide(2)},3000);

    Y.one("#slide-buttons").delegate("click",switchSlide,".switch");
    Y.one("#button5").on("click",function(e) {if(currentTimer) { clearTimeout(currentTimer); } else {switchSlide(currentSlide)}});
});
 
