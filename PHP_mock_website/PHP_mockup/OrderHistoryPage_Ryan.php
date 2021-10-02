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
  <script src="https://d3js.org/d3.v4.min.js"></script>

  <link rel="stylesheet" href="template.css">


  <script>
    

    

    //ajax in jQuery
    $(function(){
      $("#productDropDown").change(function(){
        $.ajax({
          url:"displayProducts.php?id=" + $("#productDropDown").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>
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

    <form method='get' action='showOrders_Ryan.php'>
      <p><i>Click Here to view Recent Orders of Products<i></p><br/>
    <input name='submit' type='submit' /><br /><br />

  </form>

 
  <label> Search for Order with Identification: &nbsp;&nbsp;
    <select name="productid" id="productDropDown">
      <?php
        require_once("db.php");
        $sql = "SELECT orderID from bit4444group27.order ORDER BY orderID";
        $result = $mydb->query($sql);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["orderID"]."'>".$row["orderID"]."</option>";
        }
      ?>
    </select>
  </label><br />
  <div id="contentArea">&nbsp;</div>
   
    <footer class="foot">
        <br /><br /><br /><br />
    </footer>
</body>

</html>