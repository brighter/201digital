YUI().use("node",function(Y) {

    var	
    subNav = Y.one("#services-navigation-container"),
    servicesLink = Y.one("#services-link"),
    subNavOn = function(e) {
	servicesLink.addClass("navon");
	subNav.removeClass("hidden");
    },
    subNavOff = function(e) {
	servicesLink.removeClass("navon");
	subNav.addClass("hidden");
    };
    
    Y.one("#services-link").on("mouseover",subNavOn);
    subNav.on("mouseout",subNavOff);
    subNav.on("mouseover",subNavOn);

});