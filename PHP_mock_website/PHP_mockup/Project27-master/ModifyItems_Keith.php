<?php
    $itemID = 0;
    $price = "";
    $ItemDesc = "";
    $err = false;

    if(isset($_POST["update"])) {
        if(isset($_POST["ItemDesc"])) $ItemDesc = $_POST["ItemDesc"];
        if(isset($_POST["itemID"])) $itemID = $_POST["itemID"];
        if(isset($_POST["price"])) $price = $_POST["price"];
    

    if (!empty($price) && !empty($ItemDesc)){
        $err = false;
    }else{
        $err = true;
    }

    if(!$err){
        require_once("db.php");
        $sql = "UPDATE bit4444group27.item SET ItemDesc = '$ItemDesc', itemPrice= $price WHERE itemID =$itemID";
        echo $sql;
        $result=$mydb->query($sql);

        header("HTTP/1.1 307 Temprary Redirect");
        header("Location: LandingPageEmp_Keith.php");
    }
}
?>

<!doctype html>
<html>
<head>
  <title>Modify Items</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
        <li><a href="AboutUs.php">About Us</a></li>
        <li role="presentation" class="dropdown">
          <a <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- haspopup="true" aria-expanded="false">
            Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="OrderOnlinePage_Ryan.php">Order Online</a></li>
            <li><a href="ItemDescsPage_Ryan.html">Menu Items</a></li>
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
</div>

<h3>Modify Item Form</h3>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">

<label> Select itemID: &nbsp;&nbsp;
      <select name="itemID" id="orderDropDown" value="<?php echo $itemID;?>">
        <?php
        require_once("db.php");
        $sql = "SELECT itemID FROM bit4444group27.item ORDER BY itemID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["itemID"]."'>".$row["itemID"]."</option>";
        }
        ?>
      </select>
    </label> <br />

    <!-- check order table. -->
  <label>price:
  <input type='number' name="price" step='0.01' placeholder='0.00' value="<?php echo $price; ?>" />
      <?php
        if($err && empty($price)){
            echo "<label class = 'errlabel'>Error: Please enter a valid price.</label>";
        }

      ?>
    </label><br/>


    <label> Enter item description: &nbsp;&nbsp;
      <input type = "text" name="ItemDesc" id="menuDropDown" value="<?php echo $ItemDesc;?>">
        <?php
        if($err && empty($menuDropDown)){
            echo "<label class = 'errlabel'>Error: Please enter a valid item description.</label>";
        }
        
        ?>
      </select>
    </label> <br />

        
    
       <input type="submit" name="update" value="Submit"/>

       <br/>
       
     </form>
        <br/>
        <footer class="foot">
        <br /><p><a href="LandingPageEmp_Keith.php">Back to dashboard</a></p><br />
     <br />
    </footer>
</body>
</html>


