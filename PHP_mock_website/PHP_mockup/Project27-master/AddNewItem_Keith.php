<?php
  $itemDesc = "";
  $itemPrice = 0;
  $err = false;

  if (isset($_POST["submit"])) {
    
    if(isset($_POST["itemDesc"])) $itemDesc = $_POST["itemDesc"]; 
    if(isset($_POST["itemPrice"])) $itemPrice = $_POST["itemPrice"];

    if (!empty($itemPrice) 
        && !empty($itemDesc) && $itemPrice >= 0  ) {
      header("HTTP/1.1 307 Temprary Redirect");
      header("Location: inputsuccess_Keith.php");
    } else {
      $err = true;
    }
  }
?>

<!doctype html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Our Morning Do</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="template.css">
  <style>
    .errlabel {color:red;}
    
		body	{ background-color: lightyellow;}
		.one	{ color: lightsteelblue;
				  font-family: sans-serif;
				  font-variant: small-caps;
				  font-weight: 700;
				  font-size: 18pt; }
  </style>
  
</head>
<body>
<div class="container-fluid">
    <div class="theme">
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>

    <br />

    <!--navigation bar-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href="template.html">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li role="presentation" class="dropdown">
          <a <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
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
    <br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <h3>Add Item Form</h3>

    <br />
    <label>Item Description:
      <input type="text" name="itemDesc" value="<?php echo $itemDesc; ?>" />
      <?php
        if ($err && empty($itemDesc)) {
          echo "<label class='errlabel'>Error: Please enter a item description/name.</label>";
        }
      ?>
    </label>
    <br />

      </select>

      <label>Item Price:
      <input type='number' name="itemPrice" step='0.01' placeholder='0.00' value="<?php echo $itemPrice; ?>" /> 
      <?php
        if ($err && ($itemPrice=="" || $itemPrice<0)) {
          echo "<label class='errlabel'>Error: Please enter a valid price.</label>";
        }
      ?>
    </label>
    <br />
    <input type="submit" name="submit" value="Submit" />
    <br /><br />
    <footer class="foot">
        <br /><p><a href="LandingPageEmp_Keith.php">Back to dashboard</a></p><br />
     <br />
    </footer>
</body>