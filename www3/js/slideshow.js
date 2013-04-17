YUI().use("node","transition",function(Y) {

    var 
    slideContainer = Y.one("#power-content"),
    pausedSlide = Y.one("#paused-slide-container"),
    slideButtons = Y.one("#slide-buttons"),
    pauseButton = Y.one(".pause-button"),
    newsletterSignup = Y.one("#newsletter-signup");

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
		setTimeout("1000",this.nextSlide);
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


    var newsLetterTextDefault = 'GET INDUSTRY NEWS AND REPORTS VIA EMAIL';
    var newsLetterTextMsg = "CLICK TO ENTER YOUR EMAIL ADDRESS";
    var newsLetterText = newsLetterTextMsg;

    newsletterSignup.on("click",function(e) {
	if(newsLetterText!='') {
	    newsLetterText = '';
	    this.one("input").set("value","");
	}
    });

    newsletterSignup.on("mouseover",function(e) {

	this.one("input").transition({
	    backgroundColor : {
		duration:1,
		value:'#a5a'
	    },
	    color: {
		duraton:1,
		value:"#fff"
	    },
	    borderColor: {
		duration:.5,
		value:'#fff'}})

	if(newsLetterText!='') {
	    this.one("input").set("value",newsLetterText);
	};
	
	this.transition({
	    backgroundColor : {
		duration:.5,
		value:'#505'
	    },
	    borderColor: {
		duration:.5,
		value:'#f0f'}})});

    newsletterSignup.on("mouseout",function(e) {
	
	this.one("input").transition(
	    {
		backgroundColor : {
		    duration:1,
		    value:'#333'
		},
		color: {
		    duration:1,
		    value:"#888"
		},
		borderColor: {
		    duration:1,
		    value:'#666'}},
	    
	    function() {
		if(this.get("value")=='' || this.get("value")==newsLetterTextMsg) {
	    	    this.set("value",newsLetterTextDefault);
		    newsLetterText = newsLetterTextMsg;
		    this.blur();
		}
	    }
	);
	
	this.transition({
	    backgroundColor : {
		duration:1,
		value:'transparent'},
	    borderColor : {
		duration:1,
		value:'#444'}
	})
    });
    
});
 
