<?php
  $employeeAddress= "";
  $employeeEmail= "";
  $employeePhone= "";
  $employeeType= "";
  $employeeDOB= "";
  $employeePassword= "";
  $error = false;
  $loginOK = false;

  //login information validation and error checking
  if(isset($_POST["submit"])){
    if(isset($_POST["employeeAddress"])) $employeeAddress=$_POST["employeeAddress"];
    if(isset($_POST["employeeEmail"])) $employeeEmail=$_POST["employeeEmail"];
    if(isset($_POST["employeePhone"])) $employeePhone=$_POST["employeePhone"];
    if(isset($_POST["employeeType"])) $employeeType=$_POST["employeeType"];
    if(isset($_POST["employeeDOB"])) $employeeDOB=$_POST["employeeDOB"];
    if(isset($_POST["employeePassword"])) $employeePassword=$_POST["employeePassword"];

    //echo ($employeeID.".".$customerfone.".".$remember);
    if(!empty($employeeAddress) && !empty($employeeEmail) && !empty($employeePhone) && !empty($employeeType) && !empty($employeeDOB) && !empty($password)) {
      $error=true;
    } 

    if(!$error){
      $loginOk=True;
      require_once("db.php");
      $sql = "INSERT INTO bit4444group27.employee(employeeAddress, employeeEmail, employeePhone, employeeType, employeeDOB, employeePassword)
      VALUES ('$employeeAddress', '$employeeEmail', '$employeePhone', '$employeeType', '$employeeDOB', '$employeePassword')";
      $result=$mydb->query($sql);
    }

      if($loginOK=true) {
        //set session variable to remember the employeeID
        session_start();  //Important when you login, Session starts.
        Header("Location:ManagerLogin_John.php"); //access php page session start.
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

  <title>Create Manager Account</title>
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
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>
      <h1>Our Morning Doe</h1>
      <p>Local Breakfast diner in the Blacksburg area</p>
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
            <li><a href="OrderOnlinePage_Test.php">Order Online</a></li>
            <li><a href="OrderOnlinePage_Ryan.html">Menu Items</a></li>
            <li><a href="OrderHistoryPage_Ryan.html">Order History</a></li>
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
  
  <nav>
  <h1 class="one">Create a Manager Account</h1>
  <p>Please enter the following information to create your account.</p>

    <table class="loginTable">
      <thead class="tableHead">
        <tr>
          <th>
            Create Manager Account
          </th>
        </tr>
      </thead>
        <tr>
          <td>Manager Address</td>
          <td><input type="text" name="employeeAddress" placeholder="XXXX Name St." value="<?php if(!empty($employeeAddress)) echo $employeeAddress; ?>" /><?php if($error && empty($employeeAddress)) echo "<span class='errlabel'><br/> please enter your Address</span>"; ?></td>
        </tr>
        <tr>
          <td>Manager Email</td>
          <td><input type="email" placeholder="john@website.com" name='employeeEmail' min="1" max="29" value="<?php
            if(!empty($employeeEmail)){ //if employeeEmail filled
              echo $employeeEmail; //echo employeeEmail that was typed in
            }
          ?>" /><?php if($error && empty($employeeEmail)) echo "<span class='errlabel'><br/> please enter a Manager Email</span>"; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><input type="text" placeholder="XXX-XXX-XXXX" name="employeePhone" value="<?php
            if(!empty($employeePhone)){ //if employeePhone filled
              echo $customerEmail; //echo employeePhone that was typed in
            }
          ?>" /><?php if($error && empty($employeePhone)) echo "<span class='errlabel'><br/> please enter a phone number</span>"; ?></td>
        </tr>
        <tr>
          <td>Employee Type</td>
          <td><input type="text" name="employeeType" placeholder="manager/employee" value="<?php if(!empty($employeeType)) echo $employeeType; ?>" /><?php if($error && empty($employeeType)) echo "<span class='errlabel'><br/> please enter a State</span>"; ?></td>
        </tr>
        <tr>
          <td>Date of Birth</td>
          <td><input type="date" name="employeeDOB" placeholder="1999-05-09" value="<?php if(!empty($employeeDOB)) echo $employeeDOB; ?>" /><?php if ($error && empty($employeeDOB)) echo" <span class='errlabel'><br/> please enter a date of birth</span>"; ?></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="employeePassword" placeholder="********" value="<?php if(!empty($employeePassword)) echo $employeePassword; ?>" /><?php if($error && empty($employeePassword)) echo "<span class='errlabel'><br/> please enter a password</span>"; ?></td>
        </tr>
      </table>

      <br />
      <input class="submitButton" type="submit" name="submit" value="Create Account" />
      <br />
  </form>

  </p>
    <footer class="foot">
        <br /><br /><br /><br />
  </footer>

</body>
</html>