<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Checkout Successful</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="template.css">
  <style type="text/css">
      table, th, td{
        border: 1px solid black;
        padding: 5px;
      }
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
        <li><a href="AboutUs.php">About Us</a></li>
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

    <!--navigation bar for menu items-->

    <br />
    </div>
  </section>

<!--Php output from OrderOnlinePage_Test.php -->
<?php
    $email = "";
    $date = "";
    $ItemDesc = "";
    $itemPrice = 0;
    $err = false;
    $productID = 0;

        if(isset($_POST["menuItem"])) $ItemDesc = $_POST["menuItem"];
        
        if(isset($_POST["email"])) $email = $_POST["email"];
        if(isset($_POST["date"])) $date = $_POST["date"];
?>
<?php
require_once("db.php");
  //For the newly added product record, the database will assign a
      //unique productID value. The code here is tring to query the database
      //for the latest ProductID
      $sql = "SELECT MAX(orderID) AS orderID, ItemDesc, price, customerEmail, dateofPurchase FROM bit4444group27.order WHERE orderID = orderID GROUP BY orderID desc";
      $result = $mydb->query($sql);
      $row=mysqli_fetch_array($result);
      $productID = $row["orderID"]; //maxpid is the column name in the sql result table
      $ItemDesc = $row["ItemDesc"];
      $email = $row["customerEmail"];
      $date = $row["dateofPurchase"];
      $price = $row["price"]
?>
<?php
    //display the record in a table format
    echo "<table border = 1 padding: 15px>";
    echo "<thead>";
    echo "<th>Order ID</th><th>Menu Item</th><th>Customer Name</th><th>Menu Price</th><th>Date</th>";
    echo "</thead>";
    echo "<tbody><td>$productID</td><td>$ItemDesc</td><td>$email</td><td>$$price</td><td>$date</td>";
    echo "</tbody></table>";
    echo "<p>Your order price is: $$price</p>";
    echo "<p>You have checked out successfully.</p>";


  ?>

  <p>Thank you for your order at Our Morning Doe!</p>
  <footer class="foot">
        <br /><a href="modifyItems_Ryan.php">Modify Order</a><br />
        <a href="deleteItems_Ryan.php">Delete Order</a><br />
        <a href="template.html">HomePage</a><br />
  <br /><br />
    </footer>

</body>

</html>
