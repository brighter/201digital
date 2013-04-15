YUI().use("node","transition",function(Y) {

    var 
    slideContainer = Y.one("#power-content"),
    pausedSlide = slideContainer.one("#paused-slide-container"),
    slideButtons = Y.one("#slide-buttons"),
    pauseButton = slideButtons.one(".pause-button"),
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
		    this.setStyle("opacity",".3");
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
		    this.setStyle("top","-400px");
		}
	    }
	});
    },
    
    slideTransitionType1 = {
	
	top : {
	    duration: 1,
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
	    },
	    end : function() {
		this.setStyle("top","-400px");
		this.setStyle("opacity",".9");
	    }
	}
    },

    slideTransitionType2 = {
	
	top : {
	    duration: 1.5 ,
	    value: "1px" 
	},
	left : {
	    delay:5,
	    duration:0,
	    value:"1px",
	},
	on : {
	    start : function() {
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
		this.setStyle("top","0px");
		showSlideBackground();
	    },
	    end : function() {
		this.setStyle("top","0px");
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
		showSlideBackground();
		this.setStyle("top","0px");
	    },
	    end : function() {
		this.setStyle("top","0px");
	    }
	}
    },

    slideTransitionType5 = {
	left : {
	    duration: 1,
	    easing:'ease-out',
	    value: "-300%" 
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
		showSlideBackground();
		this.setStyle("top","0px");
		hideSlideBackground(10);
	    },
	    end : function() {
		this.setStyle("top","-400px");
		this.setStyle("opacity",".9");
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
	    Y.one("#slide4")
	],
	
	transition : [
	    slideTransitionType1,
	    slideTransitionType1,
	    slideTransitionType1,
	    slideTransitionType2,
	    slideTransitionType3,
	    slideTransitionType4,
	    slideTransitionType5
	],
    	
	
	pause : function(e,node) {

	    var
	    clonedSlide = '',
	    currentSlide = this.slide[this.currentSlide];

	    if(this.paused) {
		currentSlide.setStyle("visibility","visible");
		node.setHTML("II&nbsp;");
		this.paused = false;
		
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
		}, Y.bind(this.nextSlide,this));
		
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
	
	switchSlide : function(e) {
	    for(var i = 0; i< this.slide.length; i++) {
		if(this.slide[i].transition.destroy) {
		    this.slide[i].transition.destroy();
		}
		this.slide[i].setStyle("top","-400px");
		this.slide[i].setStyle("left","0px");
		this.slide[i].setStyle("opacity",".9");
	    }
	    Y.one(".slide-background").setStyle("top","-400px");
	    Y.one(".slide-background").setStyle("opacity",".3");

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

    slideShow.nextSlide();
    pauseButton.on("click",slideShow.pause,slideShow,pauseButton);
    Y.one("#slide-buttons").delegate("click",slideShow.switchSlide,".switch",slideShow);


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
 
