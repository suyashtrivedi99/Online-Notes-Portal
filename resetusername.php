<?php 
// Start session
session_start();

include('connection.php');

$queryerror 	= " Error running the query! ";
$missingusername= " Please enter a username! ";
$sameusername 	= " Please enter a different username! ";
$taken			= " This username has already been taken! ";  
$success 		= " Username changed successfully! ";

$sentusername 	= $_POST["username"];
$username 		= $_SESSION['username'];

$_SESSION['resetusernameerrors'] = "";

//Empty username sent
if(empty($sentusername)) {
    $_SESSION['resetusernameerrors'] .= $missingusername;
    header("Location: profile.php");
    exit();
}

//User entered the same name
if($username == $sentusername){
	$_SESSION['resetusernameerrors'] .= $sameusername;
    header("Location: profile.php");
    exit();
}

//If username exists in the users table print error
$sql = "SELECT * FROM users WHERE username = '$sentusername'";
$result = mysqli_query($link, $sql);

if(!$result) {
    $_SESSION['resetusernameerrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$results = mysqli_num_rows($result);

if($results) {
    $_SESSION['resetusernameerrors'] .= $taken;
    header("Location: profile.php");
    exit();
}

$sql = "UPDATE users SET username = '$sentusername'
WHERE username = '$username';";

if ($link->query($sql) === TRUE && empty($_SESSION['resetusernameerrors'])) {
    $_SESSION['resetusernameerrors'] = $success; 
	$_SESSION['username'] = $sentusername;    		//Changing username
}

else {
    $_SESSION['resetusernameerrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$link->close();
header("Location: profile.php");

?>
