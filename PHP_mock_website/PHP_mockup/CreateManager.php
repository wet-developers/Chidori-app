<?php
  $manangeruser="";
  $manpassword= "";
  $error = false;
  $loginOK = null;

  if(isset($_POST["submit"])){
    if(isset($_POST["manangeruser"])) $manangeruser=$_POST["manangeruser"];
    if(isset($_POST["manangerpass"])) $manpassword=$_POST["manangerpass"];

    //echo ($manangeruser.".".$manpassword.".".$remember);
    if(empty($manusername) || empty($manpassword)) {
      $error=true;
    }

    if(!empty($manangeruser)){
      setcookie("manangeruser", $manusername, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }
    if(!empty($manpassword)){
      setcookie("manangerpass", $manpassword, time()+60*60*24*2, "/");
    //setcookie(variableName, value, expirationTime, cookieStored?(root folder))
    }


    if(!$error){
      //check manangeruser and company name with the database record
      require_once("db.php");
      $sql = "SELECT manangerpass FROM customer WHERE manangeruser='$manangeruser'";
      $result = $mydb->query($sql);

      $row=mysqli_fetch_array($result);
      if ($row){
        if(strcmp($manpassword, $row["manangerpass"]) ==0 ){
          $loginOK=true;
        } else {
          $loginOK = false;
        }
      }

      if($loginOK) {
        //set session variable to remember the manangeruser
        session_start();  //Important when you login, Session starts.

        $_SESSION["manangeruser"] = $manangeruser; //access one of the array elements.
        $_SESSION["manangerpass"] = $manpassword;
        $_COOKIE["logintime"] = $logintime;
        Header("Location:template.html"); //access php page session start.
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
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>
      <h1>Our Morning Doe</h1>
      <p>Local Breakfast diner in the Blacksburg, Virginia</p>
    </div>
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


  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  <h1 class="one">Creat a Manager Account</h1>
  <p>Please enter the following information to create your account.</p>
    <table>
    <tr>
        <td>First Name</td>
      </tr>
      <tr>
        <td><input type="text" name="firstname" min="1" max="20" value="<?php 
        if(!empty($manpassword)) echo $manpassword; ?>" /><?php 
        if($error && empty($manpassword)) echo "<span class='errlabel'> please enter your first name</span>"; ?></td>
      </tr>
      <tr>
        <td>Last Name</td>
      </tr>
      <tr>
        <td><input type="text" name="lastname" min="1" max="20" value="<?php 
        if(!empty($manpassword)) echo $manpassword; ?>" /><?php 
        if($error && empty($manpassword)) echo "<span class='errlabel'> please enter your last name</span>"; ?></td>
      </tr>
      <td>Enter Your Email</td>
      </tr>
      <tr>
        <td><input type="email" name="manangeruser" min="1" max="30" value="<?php
          if(!empty($manangeruser)) 
            echo $manangeruser; 
          else if(isset($_COOKIE['manangeruser'])) {
            echo $_COOKIE['manangeruser']; 
          }
        ?>" /><?php if($error && empty($manangeruser)) echo "<span class='errlabel'> please enter an email</span>"; ?></td>
      </tr>

      
        <td>Create a Manager Username</td>
      </tr>
      <tr>
        <td><input type="text" name="manangeruser" min="1" max="20" value="<?php
          if(!empty($manangeruser)) 
            echo $manangeruser; 
          else if(isset($_COOKIE['manangeruser'])) {
            echo $_COOKIE['manangeruser']; 
          }
        ?>" /><?php if($error && empty($manangeruser)) echo "<span class='errlabel'> please enter a valid username</span>"; ?></td>
      </tr>
      <tr>
        <td>Create a Manager Password</td>
      </tr>
      <tr>
        <td><input type="text" name="managerpassword" value="<?php 
        if(!empty($manpassword)) echo $manpassword; ?>" /><?php 
        if($error && empty($manpassword)) echo "<span class='errlabel'> please enter a valid password</span>"; ?></td>
      </tr>
    </table>
    <br>


    <table>
      <tr>
        <td><?php if(!is_null($loginOK) && $loginOK==false) echo "<span class='errlabel'>Manager login does not match.</span>"; ?></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" value="Create Account" /> </td>
      </tr>
    </table>
  </form>

</body>
<br>

    <!--Carousal-->
    <div id="carousel1" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/bagels2.jpg">
          <div class="carousel-caption">
            <h2>Homemade Bagels</h2>
          </div>
        </div>

        <div class="item">
          <img src="images/egg_benedict2.jpg">
          <div class="carousel-caption">
            <h2>Scrumptious Eggs Benedict</h2>
          </div>
        </div>

        <div class="item">
          <img src="images/pancake2.jpg">
          <div class="carousel-caption">
            <h2>Fresh Pancakes</h2>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</html>