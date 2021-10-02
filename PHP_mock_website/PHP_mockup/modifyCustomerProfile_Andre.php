<?php
    $customerEmail="";
    $customerfone= "";
    $customerAllergies= "";
    $customerFName= "";
    $customerLName= "";
    $customerStreet= "";
    $customerCity= "";
    $customerState= "";
    $customerDOB= "";
    $customerPassword= "";
    $error = false;
    $loginOK = false;

  //login information validation and error checking
  if(isset($_POST["update"])){
    if(isset($_POST['customeremail'])) $customerEmail=$_POST['customeremail'];
    if(isset($_POST["customerphone"])) $customerfone=$_POST["customerphone"];
    if(isset($_POST["customerAllergies"])) $customerAllergies=$_POST["customerAllergies"];
    if(isset($_POST["customerFName"])) $customerFName=$_POST["customerFName"];
    if(isset($_POST["customerLName"])) $customerLName=$_POST["customerLName"];
    if(isset($_POST["customerStreet"])) $customerStreet=$_POST["customerStreet"];
    if(isset($_POST["customerCity"])) $customerCity=$_POST["customerCity"];
    if(isset($_POST["customerState"])) $customerState=$_POST["customerState"];
    if(isset($_POST["customerDOB"])) $customerDOB=$_POST["customerDOB"];
    if(isset($_POST["customerPassword"])) $customerPassword=$_POST["customerPassword"];

    if(!empty($customerEmail) && !empty($customerfone) && !empty($customerFName) && !empty($customerLName) && !empty($customerStreet) && !empty($customerCity) && !empty($customerState) && !empty($customerDOB) && !empty($customerPassword)) {
      $error=False;
    } 

    if(!$error){
      $loginOk=True;
      require_once("db.php");
      $sql = "UPDATE bit4444group27.customer SET customerphone= '$customerfone', customerAllergies= '$customerAllergies',
       customerFirstName= '$customerFName', customerLastName='$customerLName', shippingStreetAddress= '$customerStreet', customerCity= '$customerCity', customerState= '$customerState', customerDOB= '$customerDOB', customerPassword= '$customerPassword'
       WHERE customeremail= '$customerEmail' "; 
       echo $sql;
      $result=$mydb->query($sql);
    }

        if ($loginOK=True){
        //set session variable to remember the customerID
        session_start();  //Important when you login, Session starts.
        Header("Location:landingPageCustomer_Andre.php"); //access php page session start.
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

  <title>Modify Customer Account</title>
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
  <h1 class="one">Modify your Customer Account</h1>
  <p>Please enter the following information to update your account.</p>


  <table class="loginTable">
      <thead>
        <tr>
          <th colspan="2">
            Change Customer Account
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Customer Email</td>
          <td><input type="email" placeholder="john@website.com" name='customeremail' min="1" max="29"<?php if($error && empty($customerEmail)) echo "<span class='errlabel'><br/> please enter a Customer Email</span>"; ?></td>
        </tr>
        <tr>
          <td>Change Phone</td>
          <td><input type="text" placeholder="XXX-XXX-XXXX" name="customerphone" <?php if($error && empty($customerEmail)) echo "<span class='errlabel'><br/> please enter a phone number</span>"; ?></td>
        </tr>
        <tr>
          <td>Allergies</td>
          <td><input type="text" name="customerAllergies" placeholder="*leave blank if no allergies" value="<?php if(!empty($customerAllergies)) echo $customerAllergies; ?>" /></td>
        </tr>
        <tr>
          <td>Change First Name</td>
          <td><input type="text" name="customerFName" placeholder="John" value="<?php if(!empty($customerFName)) echo $customerFName; ?>" />
          <?php 
                if($error && empty($customerFName)) echo "<span class='errlabel'><br/> please enter your first name</span>"; 
          ?></td>
        </tr>
        <tr>
          <td>Change Last Name</td>
          <td><input type="text" name="customerLName" placeholder="Smith" value="<?php if(!empty($customerLName)) echo $customerLName; ?>" /><?php if($error && empty($customerLName)) echo "<span class='errlabel'><br/> please enter your last name</span>"; ?></td>
        </tr>
        <tr>
          <td>New Street</td>
          <td><input type="text" name="customerStreet" placeholder="10 Bridge Street" value="<?php if(!empty($customerStreet)) echo $customerStreet; ?>" /><?php if($error && empty($customerStreet)) echo "<span class='errlabel'><br/> please enter a street name</span>"; ?></td>
        </tr>
        <tr>
          <td>New City</td>
          <td><input type="text" name="customerCity" placeholder="Seattle" value="<?php if(!empty($customerCity)) echo $customerCity; ?>" /><?php if($error && empty($customerCity)) echo "<span class='errlabel'><br/> please enter a City</span>"; ?></td>
        </tr>
        <tr>
          <td>New State</td>
          <td><input type="text" name="customerState" placeholder="WA" value="<?php if(!empty($customerState)) echo $customerState; ?>" /><?php if($error && empty($customerState)) echo "<span class='errlabel'><br/> please enter a State</span>"; ?></td>
        </tr>
        <tr>
          <td>Change Date of Birth</td>
          <td><input type="date" name="customerDOB" placeholder="1999-05-09" value="<?php if(!empty($customerDOB)) echo $customerDOB; ?>" /><?php if ($error && empty($customerDOB)) echo" <span class='errlabel'><br/> please enter a date of birth</span>"; ?></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="customerPassword" placeholder="********" value="<?php if(!empty($customerPassword)) echo $customerPassword; ?>" /><?php if($error && empty($customerPassword)) echo "<span class='errlabel'><br/> please enter a password</span>"; ?></td>
        </tr>
          </tbody>
      </table>

      <br />
      <input class="submitButton" type="submit" name="update" value="Update Account" />
      <br />
  </form>
  <a href="landingPageCustomer_Andre.php">Return to Customer dashboard</a>

  </p>
  <br /> <br />
    <footer class="foot">
        <br /><br /><br /><br />
  </footer>

</body>
</html>