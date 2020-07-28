<?php 
// Start session
session_start();

include('connection.php');

$loginerror = "Invalid email or password!";
$queryerror = " Error running the query! ";

$_SESSION['loginerrors'] = "";

$email    = $_POST["loginemail"];
$password = $_POST["loginpassword"];

$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
$result = mysqli_query($link, $sql);

if(!$result){
    $_SESSION['loginerrors'] .= $queryerror;
    header("Location: index.php");
    exit();
}

$results = mysqli_num_rows($result);

if($results == 0){
	$_SESSION['loginerrors'] .= $loginerror;
	header("Location: index.php");
    exit();
}

else{
	$row = mysqli_fetch_assoc($result);
    
    $_SESSION['userid'] = $row["user_id"];
    $_SESSION['username'] = $row["username"];
    $_SESSION['email'] = $row["email"];
    
    mysqli_free_result($result);
}

$link->close();
header("Location: mainpageloggedin.php");
?>
