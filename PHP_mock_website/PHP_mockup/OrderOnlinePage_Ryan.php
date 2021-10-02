<?php
$email = "";
$date = "";
$ItemDesc = "";
if (isset($_POST["submit"])) {
      if(isset($_POST["email"])) $email=$_POST["email"];
      if(isset($_POST["date"])) $date=$_POST["date"];
      if(isset($_POST["menuItem"])) $ItemDesc=$_POST["menuItem"];


      if(!empty($email) && !empty($date) && !empty($ItemDesc)) {
        header("HTTP/1.1 307 Temprary Redirect"); 
        header("Location: OrderSummaryPage_Ryan.php");
      } else {
        $err = true; 
      }
  }

?>
<!doctype html>
<html>
<head>
  <title>Our Morning Doe</title>
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
<?php
    require_once("db.php");

    $sql = "SELECT itemPrice FROM bit4444group27.item WHERE ItemDesc='$ItemDesc'";
    $result=$mydb->query($sql);
      $row=mysqli_fetch_array($result);



    $itemPrice = $row['itemPrice'];
    if (!empty($email)) {
      $sql = "INSERT INTO bit4444group27.order(dateOfPurchase, customerEmail, itemDesc, price)
              VALUES('$date', '$email', '$ItemDesc', '$itemPrice')";
      $result=$mydb->query($sql);
      if ($result==1) {
        echo "<p>You have checked out successfully.</p>";
      }

    }
  ?>

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

    

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">


<table class="orderForm"> 
  <h2>Online Order Form</h2>
  <p>Provide Order Contact Information</p>
  <label>Email:</label> 
      <input type="text" name="email" value="<?php echo $email; ?>" /><br/>
      

    <label>Date: (Year-Month-Day)</label> 
      <input type="date" name="date" value="<?php echo $date; ?>" /><br/>
    

  <p>Select items to place in cart</p>

    <label> Choose a Menu Item: &nbsp;&nbsp;
      <select name="menuItem" id="menuDropDown" value="<?php echo $ItemDesc;?>">
        <?php
        require_once("db.php");
        $sql = "SELECT ItemDesc FROM item ORDER BY itemID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["ItemDesc"]."'>".$row["ItemDesc"]."</option>";
        }
        ?>
      </select>
    </label> <br />

    
       <input type="submit" name="submit" value="Submit"/>
  </table>
     </form>

     

     <footer class="foot">
        <br /><p><a href="modifyItems_Ryan.php">Modify Order</a></p><br />
     <p><a href="deleteItems_Ryan.php">Delete Order</a></p><br /><br />
      </footer>

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
</body>
</html>

