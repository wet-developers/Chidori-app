<?php
    $orderID = 0;
    $email = "";
    $err = false;

    if(isset($_POST["delete"])){
        if(isset($_POST["orderID"])) $orderID = $_POST["orderID"];
        if(isset($_POST["email"])) $email = $_POST["email"];


    if (!empty($email)){
        $err = false;
    }else{
         $err = true;
    }

    if(!$err){
        require_once("db.php");
        $sql = "DELETE FROM bit4444group27.order WHERE customerEmail = '$email' AND orderID=$orderID";
        echo $sql;
        $result=$mydb->query($sql);
    
        header("HTTP/1.1 307 Temprary Redirect");
        header("Location: delete.html");
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>Delete Order</title>
        <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Our Morning Doe</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="template.css">
    </head>
<body>
<div class="container-fluid">
    <div class="theme">
    <div class="logoImage">
        <a><img src="Logo.png" width=200px /></a>
    </div>
      <h1>Our Morning Doe</h1>
      <p>Local Breakfast diner in the Blacksburg area</p>
    <br />

    <!--navigation bar-->
    <nav class="desc">
      <ul class="nav nav-pills">
        <li><a href="template.html">Home</a></li>
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
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <h3>Delete Order</h3>
    <label>Choose an Order ID: &nbsp;&nbsp;
        <select name="orderID" id="orderDropDown" value="<?php echo $orderID;?>">
            <?php
                require_once('db.php');
                $sql = "SELECT orderID FROM bit4444group27.order ORDER BY orderID ASC";
                $result = $mydb->query($sql);
                while($row=mysqli_fetch_array($result)){
                    echo "<option value='".$row["orderID"]."'>".$row["orderID"]."</option>";
                }
            ?>
        </select>

    </label><br/>

    <label>Email:
      <input type="text" name="email" value="<?php echo $email; ?>" />
      <?php
        if($err && empty($email)){
            echo "<label class = 'errlabel'>Error: Please enter an email.</label>";
        }
      ?>
    </label><br/>

    <input type="submit" name="delete" value="Delete Order" id="delete" />
  
    </form>
    
    <footer class="foot">
        <br /><a href="OrderOnlinePage_Ryan.php">Back to Order Page</a><br /><br />
        <a href="modifyItems_Ryan.php">Modify Order</a><br /><br />
    </footer>

</body>
</html>
