<?php
  session_start(); 

  $userid   = "UserID";
  $username = "Username";
  $email    = "Email";

  if(isset($_SESSION['userid']) && isset($_SESSION['username']) && isset($_SESSION['email'])){
    $userid   = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $email    = $_SESSION['email'];
  }  

  if(isset($_SESSION['resetusernameerrors']) && !empty($_SESSION['resetusernameerrors'])){
    $err = $_SESSION['resetusernameerrors'];
      
      echo "<script>
               alert('" . $err . "');
            </script>";  
    
      unset($_SESSION['resetusernameerrors']); 
  }

  if(isset($_SESSION['resetemailerrors']) && !empty($_SESSION['resetemailerrors'])) {
      $err = $_SESSION['resetemailerrors'];
      
      echo "<script>
               alert('" . $err . "');
            </script>";  
    
      unset($_SESSION['resetemailerrors']); 
  }

  if(isset($_SESSION['resetpassworderrors']) && !empty($_SESSION['resetpassworderrors'])){
    $err = $_SESSION['resetpassworderrors'];
      
      echo "<script>
               alert('" . $err . "');
            </script>";  
    
      unset($_SESSION['resetpassworderrors']); 
  }
?>    

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Notes</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="styling.css" rel="stylesheet">
    
    <style type="text/css">
      #notecontainer {
        margin-top: 100px;
      }  

      #notepad, #allnotes, #done {
        display: none;
      }

      #textpad {
        width: 100%;
        max-width: 100%;
        min-width: 100%;
        font-size: 16px;
        font-weight: 12px;
        line-height: 1.5em;
        border-left-width: 20px;
        border-color: #34AEEA;
        color: #34AEEA;
        background-color: #FFF3F1;
        padding: 10px; 
      }

      .buttons {
        margin-bottom: 20px;
      }

      tr {
        cursor: pointer;    
      }
    </style>

  </head>
  
  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

  <body>
    <!-- Nav Bar -->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<a class="navbar-brand" href="#">Online Notes</a>

    			<button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
    				<span class="sr-only">Toggle Navigation</span>

    				<span class="icon-bar"></span>

    				<span class="icon-bar"></span>
    				
    				<span class="icon-bar"></span>
    			</button>
    		</div>

    		<div class="navbar-collapse collapse" id="navbarCollapse">
    			<ul class="nav navbar-nav">
    				<li class="active"><a href="#">Profile</a></li>
    				<li><a href="#">Help</a></li>
    				<li><a href="#">Contact Us</a></li>
            		<li><a href="mainpageloggedin.php">My Notes</a></li>
    			</ul>

    			<ul class="nav navbar-nav navbar-right">
            		<li><a href="#">Logged in as <b><?php echo $username ?></b></a></li>
    				<li><a href="logout.php">Logout</a></li>
    			</ul>
    		</div>
    	</div>
    </nav>

    <!-- Container -->
    <div class="container-fluid" id="notecontainer">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <h2>General Account Settings:</h2>
            
          <div class="table-responsive">
            <table class="table table-hover table-condensed table-bordered">
              <tr data-target="#updateusername" data-toggle="modal">
                <td>Username</td>
                  
                <td id="profileuser"><?php echo $username ?></td>
              </tr>
                          
              <tr data-target="#updateemail" data-toggle="modal">
                <td>Email</td>
                              
                <td id="profileemail"><?php echo $email ?></td>
              </tr>
                          
              <tr data-target="#updatepassword" data-toggle="modal">
                <td>Password</td>
                              
                <td>****</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    
	
	  <!--Update username-->    
    <form method="post" id="updateusernameform" action="resetusername.php">
      <div class="modal fade" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
                  
              <h4 id="myModalLabel">Edit Username:</h4>
            </div>
              
            <div class="modal-body">
              
              <!--update username message from PHP file-->
              <div id="updateusernamemessage"></div>
              
              <div class="form-group">
                <label for="username" >Username:</label>
                
                <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username ?>">
              </div>
            </div>
              
            <div class="modal-footer">
              <input class="btn green" name="updateusername" type="submit" value="Submit" id="resetuserbutton">
                
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
            </div>
          </div>
        </div>
      </div>
    </form>

    <!--Update email-->    
    <form method="post" id="updateemailform" action="resetemail.php">
      <div class="modal fade" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
                  
              <h4 id="myModalLabel">Enter new email:</h4>
            </div>
            
            <div class="modal-body">
                  
              <!--Update email message from PHP file-->
              <div id="updateemailmessage"></div>
                  
              <div class="form-group">
                <label for="email" >Email:</label>
                      
                <input class="form-control" type="email" name="email" id="resemail" maxlength="50" value="<?php echo $email ?>">
              </div>
            </div>
          
            <div class="modal-footer">
              <input class="btn green" name="updateusername" type="submit" value="Submit" id="resetemailbuttonn">
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
            </div>
          </div>
        </div>
      </div>
    </form>
      
    <!--Update password-->    
    <form method="post" id="updatepasswordform" action="resetpassword.php">
      <div class="modal fade" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
                  
              <h4 id="myModalLabel">Enter Current and New password:</h4>
            </div>
              
            <div class="modal-body">
                  
              <!--Update password message from PHP file-->
              <div id="updatepasswordmessage"></div>
              
              <div class="form-group">
                <label for="currentpassword" class="sr-only" >Your Current Password:</label>
                
                <input class="form-control" type="password" name="currentpassword" id="currentpassword" maxlength="30" placeholder="Your Current Password" required>
              </div>
                  
              <div class="form-group">
                <label for="password" class="sr-only" >Choose a password:</label>
                      
                <input class="form-control" type="password" name="password" id="rpassword" maxlength="30" placeholder="Choose a password" required>
              </div>
                  
              <div class="form-group">
                <label for="password2" class="sr-only" >Confirm password:</label>
                      
                <input class="form-control" type="password" name="password2" id="rpassword2" maxlength="30" placeholder="Confirm password" required>
              </div>
                  
            </div>
            
            <div class="modal-footer">
              <input class="btn green" name="updateusername" type="submit" value="Submit" id="resetpasswordbutton">
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
            </div>
          </div>
        </div>
      </div>
    </form>

  	<!--Footer-->
  	<div class="footer">
  		<div class="container-fluid">
  			<p>Copyright Sardar Vallabhbhai National Institute of Technology © 2015 - <?php echo date("Y") ?></p>
  		</div>
  	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
