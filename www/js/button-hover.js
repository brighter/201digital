YUI().use("node",function(Y) {

    var	
    hoverButton = function(e) {
	
	var button = e.currentTarget.one(".home-button-hover");
	
	button.removeClass("dormant");
	
    },
    unHoverButton = function(e) {
	var button = e.currentTarget.one(".home-button-hover");
	button.addClass("dormant");
	
    };
    
    Y.one("#home-button-container").delegate("mouseover",hoverButton,"div.home-button-container");
    Y.one("#home-button-container").delegate("mouseout",unHoverButton,"div.home-button-container");
});