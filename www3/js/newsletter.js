YUI.add(

    'newsletter',

    function(Y) {


	
	var newsletter = function(cfg) {
	    
	    newsletter.superclass.constructor.apply(this, arguments);
	};
	
	newsletter.NAME = 'newsletter';
	newsletter.NS   = 'newsletter';
	
	newsletter.ATTRS = {
	    
	    email : {
		value     : ''
	    },
	    validEmail : {
		value : false
	    },
	    status : {
		value     : ''
	    }
	};

	Y.extend(
	    newsletter,
	    Y.Base,
	    {

		_BEGIN    : "BEGIN",
		_PENDING  : "PENDING",
		_ACCEPTED : "ACCEPTED",
		_ERROR    : "ERROR",

		dom : {},

		// default options...
		config : {

		    defaultText : 'GET INDUSTRY NEWS AND REPORTS VIA EMAIL...',
		    hint        : 'CLICK TO ENTER YOUR EMAIL ADDRESS',
		    display     : this.defaultText,
		    panelNode   : "#signupFormContainer",
		    signupBox   : "#newsletter-signup",
		    signupScript: "signup.php"
		    
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
		    this.dom.signup = this.dom.panelBox.one("#newsletter-form");
		    this.dom.pending = this.dom.panelBox.one("#newsletter-pending");
		    this.dom.accepted = this.dom.panelBox.one("#newsletter-accepted");
		    this.dom.errormsg = this.dom.panelBox.one("#newsletter-error");
		    this.dom.newsletter = Y.one(this.config.signupBox);
		    this.dom.emailField = this.dom.newsletter.one("input");

		    // Set event handlers...

		    this.dom.newsletter.on("mouseover",this.highLightNewsletter, this);
		    this.dom.newsletter.on("mouseout",this.unHighLightNewsletter, this);
		    this.dom.newsletter.delegate("click",this.beginSignup,"input,button",this);		    
		    this.dom.panelBox.one(".control-group-buttons").delegate("click",this.completeSignup,"button",this);

		    this.on("statusChange",this.updateStatus);
		    this.on("validEmailChange",this.processEmail);
		    this.on("emailChange",this.updateEmail);

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

			var 
			emailText = this.dom.emailField.get("value"),
			myself = this,
			checkEmail = function(status,message,suggestion) {
			    
			    if(status < 0){
			
				// Incorrect syntax!
			
				if(suggestion){
				    
				    // But we might have a solution to this!
				    if(confirm("Did you mean " + suggestion + "?")) {
					
					myself.set("email", suggestion);
					myself.set("validEmail",true);
					
				    } else {
					
					alert("That is not a valid email address!");
					myself.set("validEmail",false);
					
				    }
				} else {
				    
				    myself.set("validEmail",false);
				}
				
			    } else {
				
				// Syntax looks great!
				
				if(suggestion){
				    
				    // But we're guessing that you misspelled something
				    if(confirm("Did you mean " + suggestion + "?")) {
					
					myself.set("email", suggestion);
					
				    }
				}    
				myself.set("validEmail",true);
			    }
			};

			this.veriMail.verify(emailText, checkEmail);

		    }
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

		// when the signup status changes, update the interactive signup panel...
		updateStatus : function(e) {
		    
		    if(e.newVal != e.prevVal) {
			
			if(e.newVal == this._BEGIN) {
			    
			    this.signupPanel.show();
			    this.dom.pending.setStyle("display","none");
			    this.dom.accepted.setStyle("display","none");
			    this.dom.errormsg.setStyle("display","none");
			    this.dom.signup.setStyle("display","");
			    
			} else if(e.newVal == this._ACCEPTED) {
			    
			    this.dom.signup.setStyle("display","none");
			    this.dom.pending.setStyle("display","none");
			    this.dom.errormsg.setStyle("display","none");
			    this.dom.accepted.setStyle("display","");

			} else if (e.newVal == this._PENDING) {

			    this.dom.signup.setStyle("display","none");
			    this.dom.accepted.setStyle("display","none");
			    this.dom.errormsg.setStyle("display","none");
			    this.dom.pending.setStyle("display","");
			    
			} else if (e.newVal == this._ERROR) {
			    
			    this.dom.pending.setStyle("display","none");
			    this.dom.accepted.setStyle("display","none");
			    this.dom.signup.setStyle("display","none");
			    this.dom.errormsg.setStyle("display","");

			}
		    }
		},
				
		completeSignup : function(e) {
		    
		    e.halt();
		    
		    if(e.currentTarget.get("type")=='reset') {

			this.dom.signup.reset();
			this.set("status",null);
			this.signupPanel.hide();

		    } else {
			
			// set up the io cfg obj

			var ioCfg = {
			    
			    sync : true,
			    form : {
				id : this.dom.signup
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
				},

				success: function(id,e) {
				    
				    var response;

				    this.dom.panelBox.delegate("click",this.signupPanel.hide,".");
				    
				    try {

					response = JSON.parse(e.responseText);

					if(response.status == "OK") {
					    
					    this.set("status", this._ACCEPTED);

					} else {
					    
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
		},
	    });

	Y.newsletter = newsletter;

    },'0.0.0.1', { requires : ["node","transition","panel","dd-plugin","io"] });