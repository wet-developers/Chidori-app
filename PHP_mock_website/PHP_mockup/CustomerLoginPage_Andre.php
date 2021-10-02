<?php
  $customerEmail="";
  $customerPassword= "";
  $error = false;
  $loginOK = null;

  require_once("db.php");

  //login information validation and error checking
  if(isset($_POST["submit"])){
    if(isset($_POST["customeremail"])) $customerEmail=$_POST["customeremail"];
    if(isset($_POST["customerPassword"])) $customerPassword=$_POST["customerPassword"];

    //echo ($customerEmail.".".$customerPassword.".".$remember);
    if(empty($customerEmail) || empty($customerPassword)) {
      $error=true;
    }

    //SET SET SET cookies for remembering the supplier ID
    if(!empty($customerEmail)){
      setcookie("customeremail", $customerEmail, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }
    if(!empty($customerPassword)){
      setcookie("customerPassword", $customerPassword, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }

    if(!$error){
      //check customeremail and company name with the database record
      require_once("db.php");
      $sql = "SELECT customerPassword FROM customer WHERE customerEmail='$customerEmail'";
      $result = $mydb->query($sql);

      $row=mysqli_fetch_array($result);
      if ($row){
        if(strcmp($customerPassword, $row["customerPassword"]) ==0 ){
          $loginOK=true;
        } else {
          $loginOK = false;
        }
      }

      if($loginOK) {
        //set session variable to remember the customeremail
        session_start();  //Important when you login, Session starts.

        $_SESSION["customeremail"] = $customerEmail; //access one of the array elements.
        $_SESSION["customerPassword"] = $customerPassword;
        $_COOKIE["logintime"] = $logintime;
        Header("Location:landingPageCustomer_Andre.php"); //access php page session start.
      }
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

  <title>Customer Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="loginPages.css">

  <style>
    .errlabel {color:red};
    
  </style>
</head>

<body>
  <section id="1">
  <div class="container-fluid">
    <div class="theme">
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>
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
      </ul>
    </nav>
    <br />

    </div>
  </section>

  <!-- This is where you display the finalized order information. -->
  <!-- This is sent to the Order history page and the payment card.-->
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  
  <nav>
    <table class="loginTable">
    <thead>
    <th colspan="2" width="40">
        Login
      </th>
   </thead>
      <tr>
        <td>Customer Email</td>
        <td><input type="email" placeholder="john@website.com" name="customeremail" min="1" max="29" value="<?php //USE THIS TO SAVE NAMES FOR REVIEW PAGE
          if(!empty($customerEmail)) //if customeremail filled
            echo $customerEmail; //echo customeremail that was typed in
          else if(isset($_COOKIE['customeremail'])) {//if customeremail is empty, but set cookie
            echo $_COOKIE['customeremail']; // echo that customeremail value set in that cookie.
          }
        ?>" /><?php if($error && empty($customerEmail)) echo "<span class='errlabel'> please enter a Customer Email</span>"; ?></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" placeholder="*********" name="customerPassword" value="<?php if(!empty($customerPassword)) echo $customerPassword; ?>" /><?php if($error && empty($customerPassword)) echo "<span class='errlabel'> please enter a password</span>"; ?></td>
      </tr>
    </table>

    <?php if(!is_null($loginOK) && $loginOK==false) echo "<span class='errlabel'>Customer Email and password do not match.</span>"; ?>

    <table class="submitButton">
      <tr>
        <td><input type="submit" name="submit" value="Login" /></td>
        <td class="space"></td>
        <td>Don't have an account?  </td>
        <td class="createAccountButton"><input type="submit" name="createAccount" value="Create Account" /></td>
      </tr>
    </table>
    

  </form>

  </p>
    <footer class="foot">
        <br /><br /><br /><br />
    </footer>

</body>

</html>