YUI().use("node",function(Y) {

    var 
    currentSlide = 1,
    redItems = Y.all(".red"),
    blueItems = Y.all(".blue"),
    yellowItems = Y.all(".yellow"),
    purpleItems = Y.all(".purple"),
    
    currentTimer = null,
    changeSlide = function(toSlide) {
	
	if(toSlide>4) {
	    toSlide = 1;
	}
	Y.one("#button"+currentSlide).removeClass("active");
	
	switch(toSlide) {

	case 1:
	    yellowItems.removeClass("hidden");
	    redItems.addClass("hidden");
	    blueItems.addClass("hidden");
	    purpleItems.addClass("hidden");
	    break;
	    
	case 2:
	    yellowItems.addClass("hidden");
	    redItems.removeClass("hidden");
	    blueItems.addClass("hidden");
	    purpleItems.addClass("hidden");
	    break;
	    
	case 3:
	    yellowItems.addClass("hidden");
	    redItems.addClass("hidden");
	    blueItems.removeClass("hidden");
	    purpleItems.addClass("hidden");
	    break;

	case 4:
	    yellowItems.addClass("hidden");
	    redItems.addClass("hidden");
	    blueItems.addClass("hidden");
	    purpleItems.removeClass("hidden");
	    break;
	    
	}
	currentSlide = toSlide;
	Y.one("#button"+currentSlide).addClass("active");
	
	currentTimer = setTimeout(function() {changeSlide(currentSlide+1)},7000);
    },
    
    switchSlide = function(e) {
	clearTimeout(currentTimer);
	var selectedSlide = e.currentTarget.get("id").slice(-1);
	changeSlide(parseInt(selectedSlide));
    };
    
    // start the slide show
    changeSlide(1);

    Y.one("#slide-buttons").delegate("click",switchSlide,".slide-button");
    
});
 