<?php
  $employeeEmail="";
  $employeePassword= "";
  $error = false;
  $loginOK = null;

  require_once("db.php");

  //login information validation and error checking
  if(isset($_POST["submit"])){
    if(isset($_POST["employeeEmail"])) $employeeEmail=$_POST["employeeEmail"];
    if(isset($_POST["employeePassword"])) $employeePassword=$_POST["employeePassword"];

    //echo ($employeeEmail.".".$employeePassword.".".$remember);
    if(empty($employeeEmail) || empty($employeePassword)) {
      $error=true;
    }

    //SET SET SET cookies for remembering the supplier ID
    if(!empty($employeeEmail)){
      setcookie("employeeemail", $employeeEmail, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }
    if(!empty($employeePassword)){
      setcookie("employeePassword", $employeePassword, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }

    if(!$error){
      //check employeeEmail and company name with the database record
      require_once("db.php");
      $sql = "SELECT employeeEmail FROM employee WHERE employeePassword='$employeePassword' AND employeeType = 'manager'";
      $result = $mydb->query($sql);
      $row=mysqli_fetch_array($result);
      if ($row){
          $loginOK=true;}
         else {
          $loginOK = false;
        }
      }

      if($loginOK) {
        //set session variable to remember the employeeEmail
        session_start();  //Important when you login, Session starts.

        $_SESSION["employeeEmail"] = $employeeEmail; //access one of the array elements.
        $_SESSION["employeePassword"] = $employeePassword;
        $_COOKIE["logintime"] = $logintime;
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

  <title>Manager Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="loginPages.css">

  <style>
		body	{ background-color: lightyellow;}
		.one	{ color: lightsteelblue;
				  font-family: sans-serif;
				  font-variant: small-caps;
				  font-weight: 700;
				  font-size: 18pt; }
  .errlabel {color:red};
  </style>

</head>

<body>
  <section id="1">
  <div class="container-fluid">
    <div class="theme">
      <img src="Logo.png" width=200px />
    </div>
    <br />

    <!--navigation bar for entire webpage-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href= "template.html">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
            Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="OrderOnlinePage_Ryan.php">Order Online</a></li>
            <li><a href="MenuItemsPage_Ryan.html">Menu Items</a></li>
            <li><a href="OrderHistoryPage_Ryan.php">Order History</a></li>
          </ul>
        </li>
          <li><a href="createReview_Andre.php">Reviews</a></li>
          <li><a href="CustomerLoginPage_Andre.php">Customers</a></li>
          <li><a href="EmployeeLoginPage_Keith.php">Employees</a></li>
          <li><a href="ManagerLogin_John.php">Managers</a></li>
      </ul>
    </nav>
    <br />

    </div>
  </section>

  <!-- This is where you display the finalized order information. -->
  <!-- This is sent to the Order history page and the payment card.-->
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  

  <nav>
  <h1 class="one">Welcome to Our Morning Doe!</h1>
  <p>Please provide your username and password to login.</p>
  <p>To create an account, <a href="CreateManager_John.php">click here</a> </p>
    <table class="loginTable">
    <thead>
    <th width="40">
        Login
      </th>
   </thead>
      <tr>
        <td>Manager Email</td>
        <td><input type="email" placeholder="john@website.com" name="employeeEmail" min="1" max="29" value="<?php //USE THIS TO SAVE NAMES FOR REVIEW PAGE
          if(!empty($employeeEmail)) //if employeeEmail filled
            echo $employeeEmail; //echo employeeEmail that was typed in
          else if(isset($_COOKIE['employeeEmail'])) {//if employeeEmail is empty, but set cookie
            echo $_COOKIE['employeeEmail']; // echo that employeeEmail value set in that cookie.
          }
        ?>" /><?php if($error && empty($employeeEmail)) echo "<span class='errlabel'> please enter a Customer Email</span>"; ?></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" placeholder="*********" name="employeePassword" value="<?php if(!empty($employeePassword)) echo $employeePassword; ?>" /><?php if($error && empty($employeePassword)) echo "<span class='errlabel'> please enter a password</span>"; ?></td>
      </tr>
    </table>
<br>
    <table class="submitButton">
      <tr>
        <td><?php if(!is_null($loginOK) && $loginOK==false) echo "<span class='errlabel'>Email and password do not match.</span>"; ?></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" value="Login" /></td>
        <td class="space"></td>
      
    </table>
    

  </form>

  </p>
    <footer class="foot">
        <br /><br /><br /><br />
    </footer>

</body>

</html>
