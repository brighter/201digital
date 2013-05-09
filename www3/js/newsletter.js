YUI.add(

    'newsletter',

    function(Y) {
	

	
	var newsletter = function(cfg) {
	    
	    newsletter.superclass.constructor.apply(this, arguments);
	};
	
	newsletter.NAME = 'newsletter';
	newsletter.NS   = 'newsletter';
	
	newsletter.ATTRS = {
	    
	    status : {
		value     : ''
	    }
	};

	Y.extend(
	    newsletter,
	    Y.Base,
	    {
		
		_INACTIVE   : "INACTIVE",
		_PENDING    : "PENDING",
		_ACCEPTED  : "ACCEPTED",
		_ERROR       : "ERROR",

		email : '',
		suggestion : '',
		emailValid : '',
		
		dom : {},

		// default options...
		config : {

		    defaultText  : 'GET INDUSTRY NEWS AND REPORTS VIA EMAIL...',
		    hint             : 'CLICK TO ENTER YOUR EMAIL ADDRESS',
		    display         : this.defaultText,
		    panelNode    : "#signupFormContainer",
		    signupBox    : "#newsletter-signup",
		    signupScript : "signup.php"
		    
		},
		
		// object initializer...
		initializer : function(config) {
		    
		    // Copy over existing options...
		    for (key in config) {
			if (config.hasOwnProperty(key)) {
			    this.config[key] = config[key];
			}
		    }

		    // create a veriMail object for checking email (needs to be pre-loaded on the page)...
		    this.veriMail = new Comfirm.AlphaMail.Verimail();
		    
		    // create the interactive signup panel...
		    this.signupPanel = new Y.Panel({
			srcNode: this.config.panelNode,
			centered:true,
			zIndex:10000,
			width:500,
			plugins      : [Y.Plugin.Drag],
			modal:true}).render().hide();
		    
		    // remove the display none from the signup panel once yui has a hold of it...
		    Y.one(this.config.panelNode).removeAttribute("style");

		    // register the dom elements for use later...
		    this.dom.panelBox = this.signupPanel.get("contentBox");
		    this.dom.signupForm = this.dom.panelBox.one("#newsletter-form");
		    this.dom.pending = this.dom.panelBox.one("#newsletter-pending");
		    this.dom.accepted = this.dom.panelBox.one("#newsletter-accepted");
		    this.dom.errormsg = this.dom.panelBox.one("#newsletter-error");
		    this.dom.suggestionValid = this.dom.panelBox.one("#newsletter-suggestion-valid");
		    this.dom.suggestionInvalid = this.dom.panelBox.one("#newsletter-suggestion-invalid");
		    this.dom.emailInvalid = this.dom.panelBox.one("#newsletter-email-invalid");
		    this.dom.newsletter = Y.one(this.config.signupBox);
		    this.dom.emailField = this.dom.newsletter.one("input");

		    // Set event handlers...

		    this.dom.newsletter.on("mouseover",this.highLightNewsletter, this);
		    this.dom.newsletter.on("mouseout",this.unHighLightNewsletter, this);
		    this.dom.newsletter.delegate("click",this.beginSignup,"input,button",this);		    
		    this.dom.panelBox.delegate("click",this.processSignup,".click-handler",this);

		    this.on("statusChange",this.updateSignupStatus);
		},

		updateEmail : function(e) {

		    if(e.newVal != e.prevVal) {
			this.dom.emailField.set("value",e.newVal);
		    }
		},

		processEmail : function(e) {
		    
		    if(e.newVal) {
			
			this.set("status",this._BEGIN);
		    }
		},

		// user has clicked on the newsletter signup box
		// have they clicked to enter or submit email...
		beginSignup : function(e) {
		    
		    var  target = e.currentTarget.get("type");
		    
		    // want to enter email addresss...
		    if(target=='email') {
			
			// clear the email box for the user...
			if(this.dom.emailField.get("value") == this.config.hint) {
			    this.dom.emailField.set("value","");
			}
			
		    } else if (target == 'submit') {

			// want to submit email address
			// start the signup process
			this.completeSignup();
		    }
		},

		completeSignup : function() {
		    
		    var  myself = this;
		    
		    // reset the process...
		    this.resetSignup();

		    // verify email
		    this.veriMail.verify(this.dom.emailField.get("value"), function(status,message,suggestion) {
			
			if(suggestion){
			    
			    myself.suggestion=suggestion;
			    
			}

			if(status < 0) {
			    
			    // Incorrect syntax!	
			    myself.validEmail=false;
			    
			} else {
			    
			    // Syntax looks great!
			    myself.validEmail=true;
			}
		    });
		    
		    // decide on the panel content
		    this.setPanel();

		    // show the panel
		    this.signupPanel.show();
		    
		},

		resetSignup : function(e) {
		    
		    this.suggestion="";
		    this.email="";
		    this.validEmail=false;
		    this.errorMsg = '';
		    this.dom.signupForm.reset();
		    this.set("status", this._INACTIVE);
		    this.dom.suggestionValid.all(".email-suggestion").setContent("");
		    this.dom.suggestionInvalid.all(".email-suggestion").setContent("");
		    this.dom.errormsg.one(".error-message").setContent("");
		},
		    
		highLightNewsletter : function(e) {
    
		    var input = e.currentTarget.one("input");

		    // transition the input text box...
		    input.transition({
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
		    
		    // update the text in the box...
		    if(input.get("value") == this.config.defaultText) {
			input.set("value",this.config.hint);
		    }
		    
		    // transition the 'outer' container...
		    e.currentTarget.transition({
			backgroundColor : {
			    duration:.5,
			    value:'#505'
			},
			borderColor: {
			    duration:.5,
			    value:'#f0f'}
		    }
					      )
		},
		
		
		unHighLightNewsletter : function(e) {
		    
		    var 
		    input = e.currentTarget.one("input"),
		    defaultText = this.config.defaultText,
		    hint = this.config.hint;

		    // transition the input text box...
		    input.transition(
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

			    if ( this.get("value") == '' || this.get("value") == hint) {
	    			this.set("value",defaultText);
				this.blur();
			    }
			}
		    );
		    
		    // transition the 'outer' container
		    e.currentTarget.transition({
			backgroundColor : {
			    duration:1,
			    value:'transparent'},
			borderColor : {
			    duration:1,
			    value:'#444'}
		    })
		},
		
		// set the panel content depending on the stage of the process
		setPanel : function() {
		    
		    // turn all (sub) panels 'off'
		    this.dom.panelBox.all(".interactive-panel").setStyle("display","none");

		    // depending on the email and any suggestion...
		    if(this.validEmail) {
			
			if(this.suggestion) {
			    
			    // valid email but may be misspelt...
			    this.dom.suggestionValid.one(".original").set("innerHTML",this.dom.emailField.get("value"));
			    this.dom.suggestionValid.one(".suggestion").set("innerHTML",this.suggestion);

			    this.dom.suggestionValid.setStyle("display","");
			    
			} else {
			    
			    // collect some other user data...
			    this.dom.signupForm.setStyle("display","");
			}
		    } else {
			
			if(this.suggestion) {
			    
			    // invalid email but may have a suggestion
			    this.dom.suggestionInvalid.one(".original").set("innerHTML",this.dom.emailField.get("value"));
			    this.dom.suggestionInvalid.one(".suggestion").set("innerHTML",this.suggestion);
			    this.dom.suggestionInvalid.setStyle("display","");

			} else {
			    
			    // invalid email and no suggestions...
			    this.dom.emailInvalid.setStyle("display","");
			}
		    }
		},

		processSignup : function(e) {

		    e.halt();

		    if(e.currentTarget.hasClass("close-panel")) {
			    
			    this.signupPanel.hide();
			
		    } else if (e.currentTarget.hasClass("dont-correct-email")) {
			
			this.suggestion='';
			this.setPanel();

		    } else if (e.currentTarget.hasClass("correct-email")) {
			
			this.email=this.suggestion;
			this.validEmail = true;
			this.dom.emailField.set("value",this.email);
			this.suggestion='';
			this.setPanel();

		    } else if (e.currentTarget.hasClass("complete-registration")) {

			this.contactServer();
		    }
		},

		updateSignupStatus : function(e) {
		    
		    if(e.newVal != this._INACTIVE) {
			
			this.dom.panelBox.all(".interactive-panel").setStyle("display","none");
			
			if(e.newVal == this._PENDING) {

			    this.dom.pending.setStyle("display","");

			} else if (e.newVal == this._ACCEPTED) {
			    
			    this.dom.accepted.setStyle("display","");

			} else if (e.newVal == this._ERROR) {
			    
			    this.dom.errormsg.one(".error-message").set("innerHTML",this.errorMsg);
			    this.dom.errormsg.setStyle("display","");
			}
		    }
		},
		    
		contactServer : function() {
		    
		    // set up the io cfg obj
		    
		    var ioCfg = {
			
			form : {
			    id : this.dom.signupForm
			},
			data : { 
			    email : this.dom.emailField.get("value")
			},
			context : this,
			method : "POST",
			
			on : {
			    start : function() {
				this.set("status",this._PENDING);
			    },
			    
			    failure : function() {
				this.set("status", this._ERROR);
				this.errorMsg = "Could not contact Mail Server";
			    },
			    
			    complete: function(id,e) {
				
				var response;
				
				this.dom.panelBox.delegate("click",this.signupPanel.hide,".");
				
				try {
				    
				    response = JSON.parse(e.responseText);
				    
				    if(response.status == "OK") {
					
					this.set("status", this._ACCEPTED);
					
				    } else {

					this.errorMsg = response.message;
					this.set("status", this._ERROR);

				    }
				    
				} catch (x) {
				    console.log(x);
				}
			    }
			}
		    }
		    
		    Y.io(this.config.signupScript, ioCfg );
		    
		}
		
	    });

	Y.newsletter = newsletter;

    },'0.0.0.1', { requires : ["node","transition","panel","dd-plugin","io"] });
