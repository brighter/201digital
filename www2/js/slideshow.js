YUI().use("node",function(Y) {

    var 
    currentSlide = 1,
    
    currentTimer = null,
    changeSlide = function(toSlide) {
	
	if(!document.getElementById("slide"+toSlide)) {
	    toSlide=1;
	}
	Y.all(".slide").addClass("hidden")
	Y.one("#slide"+toSlide).removeClass("hidden");
	
	currentSlide = toSlide;

	currentTimer = setTimeout(function() {changeSlide(currentSlide+1)},6000);
    },
    
    switchSlide = function(e) {
	clearTimeout(currentTimer);
	var selectedSlide = e.currentTarget.get("id").slice(-1);
	changeSlide(parseInt(selectedSlide));
    };
    
    // start the slide show
    changeSlide(1);

    Y.one("#slide-buttons").delegate("click",switchSlide,".switch");
    Y.one("#button5").on("click",function(e) {if(currentTimer) { clearTimeout(currentTimer); } else {switchSlide(currentSlide)}});
});
 