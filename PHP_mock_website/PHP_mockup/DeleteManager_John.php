<?php
  $employeeEmail= "";
  $error = false;
  $loginOK = false;

  //login information validation and error checking
  if(isset($_POST["delete"])){
    if(isset($_POST["employeeEmail"])) $employeeEmail=$_POST["employeeEmail"];

    if(!empty($employeeEmail)) {
      $error=False;
    } 

    if(!$error){
      $loginOk=True;
      require_once("db.php");
      $sql = "DELETE FROM bit4444group27.employee WHERE employeeEmail= '$employeeEmail' "; 
        echo $sql;
      $result=$mydb->query($sql);
    }

        if ($loginOK=True){
        //set session variable to remember the employeeID
        session_start();  //Important when you login, Session starts.
        Header("Location:LandingPageMan_John.php"); //access php page session start.
      }
    }
 ?>


<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" href="loginPages.css">
  <title>Our Morning Doe</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="template.css">

  <style>
		body	{ background-color: lightyellow;}
		.one	{ color: lightsteelblue;
				  font-family: sans-serif;
				  font-variant: small-caps;
				  font-weight: 700;
				  font-size: 18pt; }
  </style>
</head>

<body>
<section id="1">
  <div class="container-fluid">
    <div class="theme">
      <img src="Logo.png" width=200px />
    </div>
    <br />
    <br />

    <!--navigation bar for entire webpage-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href= "template.html">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
            Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="OrderOnline">Order Online</a></li>
            <li><a href="Menu">Menu Items</a></li>
            <li><a href="OrderHistory">Order History</a></li>
          </ul>
        </li>
        <li><a href="#">Reviews</a></li>
        <li><a href="CustomerLoginPage.php">Customers</a></li>
        <li><a href="EmployeeLoginPage">Employees</a></li>
      </ul>
    </nav>
    <br />

    </div>
  </section>


  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  <h1 class="one">Delete Manager Account</h1>
  <p>Enter the email of the account you would like to delete.</p>
  <tr>
          <td>Email:</td>
          <td><input type="email" placeholder="john@website.com" name='employeeEmail' min="1" max="29" value="<?php
            if(!empty($employeeEmail)){ //if employeeEmail filled
              echo $employeeEmail; //echo employeeEmail that was typed in
            }
          ?>" /><?php if($error && empty($employeeEmail)) echo "<span class='errlabel'><br/> please enter a Manager Email</span>"; ?></td>
        </tr> <br>
<br> <br>
<form>
  <table class="submitButton">
    <p>Are your sure you want to delete this account?.</p>
      <tr>
        <td><input type="submit" name="delete" value="Confirm" /> </td>
        
      </tr>
      
    </table>
</form>
<a href="LandingPageMan_John.php">Return to Manager dashboard</a>
<br /> <br />
<footer class="foot">
        <br /><br /><br /><br />
  </footer>
</body>

    
</html>