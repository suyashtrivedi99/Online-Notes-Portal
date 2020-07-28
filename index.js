//	Define error messages
var missingUsername 	= "<p><strong>Please enter a username!</strong></p>";
var missingEmail 		= "<p><strong>Please enter your email address!</strong></p>";
var invalidEmail 		= "<p><strong>Please enter a valid email address!</strong></p>";	
var missingPassword 	= "<p><strong>Please enter a password!</strong></p>";
var invalidPassword 	= "<p><strong>Your password should be atleast 6 characters long and include one capital letter and one number!</strong></p>";
var missingPassword2 	= "<p><strong>Please confirm your password!</strong></p>";
var differentPassword 	= "<p><strong>Passwords don't match!</strong></p>";

$("#signupbutton").click( function(event){
	
	//Prevent default PHP processing
	event.preventDefault();

	var errors = ""; 	//Variable that stores all errors

	var username 	= $('#username').val();
	var email 		= $('#email').val();
	var password 	= $('#password').val();
	var password2 	= $('#password2').val();
	
	/*
	console.log(username);
	console.log(email);
	console.log(password);
	console.log(password2);
	*/

	//Get username
	if(!username){
	    errors += missingUsername;
	}

	//Get email
	if(!email){
	    errors += missingEmail;   
	}

	else{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if(!regex.test(email)){
		 	errors += invalidEmail;
		}
	}
	

	//Get passwords
	if(!password){
	    errors += missingPassword; 
	}

	else{
		var regex1 = /[A-Z]/;
		var regex2 = /[0-9]/;

		if(! (regex1.test(password) && regex2.test(password) && password.length >= 6) ){
			errors += invalidPassword;
		}

		else
		{
			if(!password2){
				errors += missingPassword2;
			}

			else{
				if(password != password2){
					errors += differentPassword;
				}
			}
		}
	}

	if(errors){
		var errormsg = '<div class="alert alert-danger">' + errors + '</div>';
		
		$("#signupmessage").html(errormsg);
		//console.log(errors);
	}

	else{
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

	var errors = ""; 	//Variable that stores all errors

	var email = $('#resemail').val();
	console.log("LOL");

	//Get email
	if(!email){
	    errors += missingEmail;   
	}

	else{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if(!regex.test(email)){
		 	errors += invalidEmail;
		}
	}

	if(errors){
		var errormsg = '<div class="alert alert-danger">' + errors + '</div>';
		
		$("#updateemailmessage").html(errormsg);
		console.log(errors);
	}

	else{
		$("#updateemailmessage").html("");
		$("#updateemailform").submit();
	}
});

$("#resetpasswordbutton").click( function(event){
	
	//Prevent default PHP processing
	event.preventDefault();

	var errors = ""; 	//Variable that stores all errors

	var password 	= $('#rpassword').val();
	var password2 	= $('#rpassword2').val();

	//Get passwords
	if(!password){
	    errors += missingPassword; 
	}

	else{
		var regex1 = /[A-Z]/;
		var regex2 = /[0-9]/;

		if(! (regex1.test(password) && regex2.test(password) && password.length > 6) ){
			errors += invalidPassword;
		}

		else
		{
			if(!password2){
				errors += missingPassword2;
			}

			else{
				if(password != password2){
					errors += differentPassword;
				}
			}
		}
	}

	if(errors){
		var errormsg = '<div class="alert alert-danger">' + errors + '</div>';
		
		$("#updatepasswordmessage").html(errormsg);
		//console.log(errors);
	}

	else{
		$("#updatepasswordmessage").html("");
		$("#updatepasswordform").submit();
	}
});