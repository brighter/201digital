YUI(
    {
	modules : {
	    "newsletter" : 
	    {
		fullpath : "js/newsletter.js"
	    }
	}
    }).use("node","transition","newsletter","event-mouseenter",function(Y) {

	var 

	contentNavigation = Y.one("ul.content-navigation"),
	slideContainer = Y.one("#power-content"),
	pausedSlide = Y.one("#paused-slide-container"),
	slideButtons = Y.one("#slide-buttons"),    
	pauseButton = Y.one(".pause-button"),
	leadership = Y.one("#leadership-photos"),
	slideBackground = Y.one("#power-content .slide-background"),
	
	showSlideBackground = function() {

	    slideBackground.transition({
		top : {
		    duration : 1,
		    value : "0px"
		},
		on : {
		    start : function() {
			this.setStyle("opacity","");
		    }
		}
	    })
	},

	hideSlideBackground = function(secs) {
	    
	    if(typeof secs == 'undefined') {
		secs = 0;
	    }
	    slideBackground.transition({
		opacity : {
		    delay: secs,
		    duration: 1,
		    value:0
		},
		on : {
		    end : function() {
			this.setAttribute("style","");
		    }
		}
	    });
	},
	
	slideTransitionType1 = {
	    
	    top : {
		duration: 1.5,
		value: 0 
	    },
	    opacity: {
		delay: 3,
		duration: 1,
		value: 0
	    },
	    on : {
		start : function() {
		    hideSlideBackground();
		    this.setAttribute("style","");
		}
	    }
	},

	slideTransitionType2 = {
	    
	    top : {
		duration: 1.5 ,
		value: 0 
	    },
	    left : {
		delay:5,
		duration:0,
		value:"1px",
	    },
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    showSlideBackground();
		}
		
	    }
	},
    	
	slideTransitionType3 = {
	    left : {
		duration: 1,
		easing:'ease-out',
		value: "-100%" 
	    },
	    top : {
		delay:6,
		duration:0.5,
		value:"1px"
	    },
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    this.setStyle("left","0");
		    this.setStyle("top","0");
		    showSlideBackground();
		}
	    }
	},
	slideTransitionType4 = {
	    left : {
		duration: 1,
		easing:'ease-out',
		value: "-200%" 
	    },
	    top : {
		delay:6,
		duration:0,
		value:"1px"
	    },
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    this.setStyle("left","-100%");
		    this.setStyle("top","0");
		    showSlideBackground();
		}
	    }
	},
	slideTransitionType5 = {
	    left : {
		duration: 1,
		easing:'ease-out',
		value: "-300%" 
	    },
	    top : {
		delay:6,
		duration:0,
		value:"1px"
	    },
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    this.setStyle("left","-200%");
		    this.setStyle("top","0");
		    showSlideBackground();
		}
	    }
	},

	slideTransitionType6 = {
	    left : {
		duration: 1,
		easing:'ease-out',
		value: "-400%" 
	    },
	    top : {
		delay:6,
		duration:0,
		value:"1px"
	    },
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    this.setStyle("left","-300%");
		    this.setStyle("top","0");
		    showSlideBackground();
		}
	    }
	},

	slideTransitionType7 = {
	    left : {
		duration: 1,
		easing:'ease-out',
		value: "-500%" 
	    },
	    opacity: {
		delay:10,
		duration:1,
		value:0
	    },
	    top : {
		delay:11,
		duration:1,
		value:"1px"
	    },
	    
	    on : {
		start : function() {
		    this.setAttribute("style","");
		    this.setStyle("left","-400%");
		    this.setStyle("top","0");
		    showSlideBackground();
		    hideSlideBackground(11);
		}
	    }
	},
	
	slideShow = {
	    
	    currentSlide : -1,
	    paused : false,

	    slide : [
		Y.one("#slide1"),
		Y.one("#slide2"),
		Y.one("#slide3"),
		Y.one("#slide4"),
		Y.one("#slide4"),
		Y.one("#slide4"),
		Y.one("#slide4"),
		Y.one("#slide4"),
		Y.one("#slide4")
	    ],
	    
	    transition : [
		slideTransitionType1,
		slideTransitionType1,
		slideTransitionType1,
		slideTransitionType2,
		slideTransitionType3,
		slideTransitionType4,
		slideTransitionType5,
		slideTransitionType6,
		slideTransitionType7
	    ],
    	    
	    
	    pause : function(e,node) {

		var
		clonedSlide = '',
		currentSlide = this.slide[this.currentSlide];

		if(this.paused) {
		    currentSlide.setStyle("visibility","visible");
		    node.setHTML("II&nbsp;");
		    this.paused = false;
		    this.resetSlides();
		    setTimeout(Y.bind(this.nextSlide,this),"1000");
		    pausedSlide.transition({
			opacity : {
			    duration:1,
			    value:0
			},
			on : {
			    end : function() {
				this.empty();
				this.setStyle("opacity",".9");
			    }
			}
		    });
		    
		} else {
		    // need to make sure the current slide goes into 'shown' state
		    // duplicate current slide and place as 'placeholder'

		    clonedSlide = this.slide[this.currentSlide].cloneNode(true).set("id","paused-slide");
		    currentSlide.setStyle("visibility","hidden");

		    pausedSlide.prepend(clonedSlide.setStyle("top","0").setStyle("opacity",".9"));
		    this.paused = true;
		    node.setHTML("&#9658");

		}
	    },
	    
	    resetSlides : function() {
		for(var i = 0; i< this.slide.length; i++) {
		    this.slide[i].setAttribute("style","");
		    this.slide[i].transition({});
		}
		Y.one(".slide-background").setAttribute("style","");
	    },
	    
	    switchSlide : function(e) {

		if(this.paused) {
		    return;
		}
		this.resetSlides();
		
		switchTo = e.currentTarget.one("input").get("value");
		this.currentSlide = switchTo - 2;
		this.nextSlide();
	    },
	    
	    nextSlide : function() {
		
		if(this.paused) {
		    return;
		}
		this.currentSlide++;
		
		if(this.currentSlide == this.slide.length) {
		    this.currentSlide=0;
		} 
		Y.one("#slide-buttons").all(".slide-button").removeClass("active");
		if(Y.one("#slide-buttons").one("#button"+(this.currentSlide+1))) {
		    Y.one("#slide-buttons").one("#button"+(this.currentSlide+1)).addClass("active");
		}
		this.slide[this.currentSlide].transition(this.transition[this.currentSlide],Y.bind(this.nextSlide,this));
	    }
	};

	if(slideContainer) {
	    slideShow.nextSlide();
	    pauseButton.on("click",slideShow.pause,slideShow,pauseButton);
	    Y.one("#slide-buttons").delegate("click",slideShow.switchSlide,".switch",slideShow);
	}


	if(leadership) {

	    var 
	    bioList = Y.all(".bio-container"),
	    showBio = function(e) {

		bioList.addClass("hidden");
		leadership.all("img").addClass("fade");
		e.currentTarget.one("img").removeClass("fade");
		Y.one("#"+e.currentTarget.one("input").get("value")).removeClass("hidden");
	    };

	    leadership.delegate("click",showBio,".leadership-item");
	    
	}

	var expandContact = function(e) {

	    e.currentTarget.set("src",e.currentTarget.get("src").replace("_off","_on"));
	    e.currentTarget.get("parentNode").get("parentNode").one(".contact-details").removeClass("collapsed");
	    
	}
	var contractContact = function(e) {
	    
	    if(e.currentTarget.get("src")) {
		
		e.currentTarget.set("src",e.currentTarget.get("src").replace("_on","_off"));
		e.currentTarget.get("parentNode").get("parentNode").one(".contact-details").addClass("collapsed");

	    } else {

		e.currentTarget.next().one("img").set("src",e.currentTarget.next().one("img").get("src").replace("_on","_off"));
		e.currentTarget.addClass("collapsed");
	    }
	}
	
	var contactIcons = Y.one("#contact-icons");
	
	contactIcons.delegate("mouseenter",expandContact,"img");

	contactIcons.delegate("mouseleave",contractContact,".contact-details");

	

	
	var navigationContainer = Y.one("#navigation-container");
	var navigation =  navigationContainer.one(".main-navigation");
	var aboutSub = navigationContainer.one("#about-subnavigation");
	var servicesSub = navigationContainer.one("#services-subnavigation");
	var hideSubTimeout = null;
	
	aboutSub.on("mouseover",function() {
	    clearTimeout(hideSubTimeout);
	    hideSubTimeout = null;
	});
	servicesSub.on("mouseover",function() {
	    clearTimeout(hideSubTimeout);
	    hideSubTimeout = null;
	});
	
	var showSubNavigation = function(e) {
	    
	    clearTimeout(hideSubTimeout);
	    hideSubTimeout = null;
	    
	    aboutSub.setStyle("display","none");
	    servicesSub.setStyle("display","none");
	    if(contentNavigation) {
		contentNavigation.transition({
		    opacity:.1,
		    duration:.5
		});
	    }
	    if(slideContainer) {
		slideContainer.transition({
		    opacity:.1,
		    duration:.5
		});
	    }
	    if(e.currentTarget.hasClass("about-navigation")) {
		aboutSub.setStyle("display","");
	    } else if (e.currentTarget.hasClass("services-navigation")) {
		servicesSub.setStyle("display","");
	    } 
	}


	var hideSubNavigation = function(e) {
	    hideSubTimeout = setTimeout(function() {
		aboutSub.setStyle("display","none");
		servicesSub.setStyle("display","none");
		if(contentNavigation) {
		    contentNavigation.transition({
			opacity:1,
			duration:.5
		    });
		}
		if(slideContainer) {
		    slideContainer.transition({
			opacity:1,
			duration:.5
		    });
		}
		
	    },"200");
	}

	newsletter = new Y.newsletter();

	//  aboutSub.on("mouseout",hideSubNavigation);
	//    servicesSub.on("mouseout",hideSubNavigation);
	
	
	//  navigation.delegate("mouseover",showSubNavigation,"li");
	//  navigation.delegate("mouseout",hideSubNavigation,"li");


	
	
    });

