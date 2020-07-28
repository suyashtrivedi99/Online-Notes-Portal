<?php 
// Start session
session_start();

include('connection.php');

$queryerror 	    = " Error running the query! ";
$samepassword       = " Please enter a different password! ";
$wrongpassword      = " Wrong password! ";
$invalidpassword    = " Your password should be atleast 6 characters long and include one capital letter and one number! ";
$differentpassword  = " Passwords don\'t match! ";
$success 		    = " Password changed successfully! ";

$_SESSION['resetusernameerrors'] = "";

$sentpassword = $_POST["currentpassword"];
$password     = $_POST["password"];
$password2    = $_POST["password2"];
$email        = $_SESSION['email'];

//Checking the authenticity of the entered password
$sql = "SELECT * FROM users WHERE email = '$email' and password = '$sentpassword'";
$result = mysqli_query($link, $sql);

if(!$result){
    $_SESSION['resetpassworderrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$results = mysqli_num_rows($result);

if($results == 0){
    $_SESSION['resetpassworderrors'] .= $wrongpassword;
    header("Location: profile.php");
    exit();
}

//Validating the new password
if (!preg_match("/[A-Z]/",$password) || !preg_match("/[0-9]/",$password) || strlen($password) < 6) {
    $_SESSION['resetpassworderrors'] .= $invalidpassword;
    header("Location: profile.php");
    exit();  
}

//Checking for same password
$row = mysqli_fetch_assoc($result);
$actualpassword = $row["password"];

mysqli_free_result($result);

if($actualpassword == $password) {
    $_SESSION['resetpassworderrors'] .= $samepassword;
    header("Location: profile.php");
    exit();
}

//Confirming passwords
if($password != $password2) {
	$_SESSION['resetpassworderrors'] .= $differentpassword;
    
    /*echo "<script>
            console.log('NOT CONFIRM');
          </script>";*/
          
    header("Location: profile.php");
    exit();
}

//No errors, change password
$sql = "UPDATE users SET password = '$password'
WHERE email = '$email';";

if ($link->query($sql) === TRUE && empty($_SESSION['resetpassworderrors'])) {
    $_SESSION['resetpassworderrors'] = $success;
}

else {
    $_SESSION['resetpassworderrors'] .= $queryerror;
    header("Location: profile.php");
    exit();
}

$link->close();
header("Location: profile.php");

?>
