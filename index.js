//	Define error messages
const missingUsername   = "<p><strong>Please enter a username!</strong></p>",
	  missingEmail      = "<p><strong>Please enter your email address!</strong></p>",
	  invalidEmail      = "<p><strong>Please enter a valid email address!</strong></p>",
	  missingPassword   = "<p><strong>Please enter a password!</strong></p>",
	  invalidPassword 	= "<p><strong>Your password should be atleast 6 characters long and include one capital letter and one number!</strong></p>",
	  missingPassword2 	= "<p><strong>Please confirm your password!</strong></p>",
	  differentPassword = "<p><strong>Passwords don't match!</strong></p>";

$("#signupbutton").click(function(event) {
	
	//Prevent default PHP processing
	event.preventDefault();

	let errors = "", 	//Variable that stores all errors
		username 	= $('#username').val(),
		email 		= $('#email').val(),
		password 	= $('#password').val(),
		password2 	= $('#password2').val();
	
	/*
	console.log(username);
	console.log(email);
	console.log(password);
	console.log(password2);
	*/

	//Get username
	if (!username) {
	    errors += missingUsername;
	}

	//Get email
	if (!email) {
	    errors += missingEmail;   
	} else {
		let regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if (!regex.test(email)) {
		 	errors += invalidEmail;
		}
	}
	

	//Get passwords
	if (!password) {
	    errors += missingPassword; 
	} else {
		let regex1 = /[A-Z]/,
			regex2 = /[0-9]/;

		if (!(regex1.test(password) && regex2.test(password) && password.length >= 6)) {
			errors += invalidPassword;
		} else {
			if(!password2){
				errors += missingPassword2;
			} else {
				if (password !== password2) {
					errors += differentPassword;
				}
			}
		}
	}

	if (errors) {
		let errormsg = '<div class="alert alert-danger">' + errors + '</div>';

		$("#signupmessage").html(errormsg);
		//console.log(errors);
	} else {
		$("#signupmessage").html("");
		$("#signupform").submit();
	}
	/*
	//Collect user info
	var datatopost = $(this).serializeArray();
	console.log(datatopost);

	//Send this info to signup.php using AJAX
	$.ajax({
		url: "signup.php",
		type: "POST",
		data: datatopost,
		success: function(data){
			if(data){
				$("#signupmessage").html(data);
			}
		},
		error: function(){
			$("#signupmessage").html("<div class='alert alert-danger'>There was an error with the AJAX Call. Please try again later.</div>");
		}    
	});
	*/
});

// NOT WORKING
$("#resetemailbuttonn").click( function(event){
	//Prevent default PHP processing
	event.preventDefault();

	let errors = "", 	//Variable that stores all errors
		email = $('#resemail').val();

	//Get email
	if (!email) {
	    errors += missingEmail;   
	} else {
		const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if (!regex.test(email)) {
		 	errors += invalidEmail;
		}
	}

	if (errors) {
		let errormsg = '<div class="alert alert-danger">' + errors + '</div>';
		
		$("#updateemailmessage").html(errormsg);
		console.log(errors);
	} else {
		$("#updateemailmessage").html("");
		$("#updateemailform").submit();
	}
});

$("#resetpasswordbutton").click(function(event) {
	
	//Prevent default PHP processing
	event.preventDefault();

	let errors    = "", 	//Variable that stores all errors
		password  = $('#rpassword').val(),
		password2 = $('#rpassword2').val();

	//Get passwords
	if (!password) {
	    errors += missingPassword; 
	} else {
		const regex1 = /[A-Z]/,
			  regex2 = /[0-9]/;

		if (!(regex1.test(password) && regex2.test(password) && password.length > 6) ) {
			errors += invalidPassword;
		} else {
			if (!password2) {
				errors += missingPassword2;
			} else {
				if (password !== password2) {
					errors += differentPassword;
				}
			}
		}
	}

	if (errors) {
		let errormsg = '<div class="alert alert-danger">' + errors + '</div>';
		
		$("#updatepasswordmessage").html(errormsg);
		//console.log(errors);
	} else {
		$("#updatepasswordmessage").html("");
		$("#updatepasswordform").submit();
	}
});