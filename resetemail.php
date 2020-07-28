<?php 
// Start session
session_start();

include('connection.php');

$queryerror 	= " Error running the query! ";
$missingemail   = " Please enter an email! ";
$invalidemail   = " Please enter a valid email! ";
$sameemail 	    = " Please enter a different email! ";
$taken			= " This email has already been registered! ";  
$success        = " Email changed successfully! ";

$sentemail  = $_POST["email"];
$email      = $_SESSION['email'];

$_SESSION['resetemailerrors'] = "";

//Empty / invalid mail sent
if(empty($sentemail)) {
    $_SESSION['resetemailerrors'] .= $missingemail;
    header("Location: profile.php");
    exit();
}

 if(!filter_var($sentemail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['resetemailerrors'] .= $invalidemail;
    header("Location: profile.php");
    exit();
 }

//User entered the same email
if($email == $sentemail){
	$_SESSION['resetemailerrors'] .= $sameemail;
    header("Location: profile.php");
    exit();
}

//If email exists in the users table print error
$sql = "SELECT * FROM users WHERE email = '$sentemail'";
$result = mysqli_query($link, $sql);

if(!$result) {
    $_SESSION['resetemailerrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$results = mysqli_num_rows($result);

if($results) {
    $_SESSION['resetemailerrors'] .= $taken;
    header("Location: profile.php");
    exit();
}

//No errors, change email
$sql = "UPDATE users SET email = '$sentemail'
WHERE email = '$email';";

if ($link->query($sql) === TRUE && empty($_SESSION['resetemailerrors'])) {
    $_SESSION['resetemailerrors'] = $success; 
	$_SESSION['email'] = $sentemail;    		//Changing email
}

else {
    $_SESSION['resetemailerrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$link->close();
header("Location: profile.php");

?>
