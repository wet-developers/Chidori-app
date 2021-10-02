
<?php
  $itemName="";
  $reviewText= "";
  $reviewRating= "";
  $date= date("y-m-d");
  $error = false;
  $loginOK = false;


  //login information validation and error checking
  if(isset($_POST["submit"])){
    if(isset($_POST['itemName'])) $itemName=$_POST['itemName'];
    if(isset($_POST["reviewText"])) $reviewText=$_POST["reviewText"];
    if(isset($_POST["reviewRating"])) $reviewRating=$_POST["reviewRating"];

    //echo ($customerEmail.".".$customerfone.".".$remember);
    if(empty($itemName) || empty($reviewText) || empty($reviewRating)) {
      $error=true;
    } 

    if(!$error){
      $loginOk=True;
      require_once("db.php");
      $sql = "INSERT INTO bit4444group27.review(itemName, reviewText, rating, dateOfReview)
      VALUES ('$itemName', '$reviewText','$reviewRating', '$date')";
      $result=$mydb->query($sql);
    }

      if($loginOK=true) {
        //set session variable to remember the customeremail
        session_start();  //Important when you login, Session starts.
        Header("Location:reviewPage_Andre.php"); //access php page session start.
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

  <title>Post Review</title>
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
  
  <nav>
    <table class="loginTable">
    <thead class="tableHead">
      <th colspan="2">
        Create Review
    </th>
    </thead>
      <tr>
        <td>Item Name</td>
        <td>    
            <label> &nbsp;&nbsp;
                <select name="itemName" id="menuDropDown" value="<?php echo $ItemDesc;?>">
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
      </tr>
      <tr>
        <td>Review</td>
        <td><input type="textarea" class="largeTextArea" placeholder="Leave your thoughts and comments here" name="reviewText">
      </tr>
      <tr>
        <td>Product Rating</td>
        <td><input type="number" name="reviewRating" min="1" max="10" /></td>
      </tr>
    </table>
    
    <br/>
    <table class="createReviewButtons">
        <tr>
            <td><input class="placeReview" type="submit" name="submit" value="Place Review" /></td></td>
        </tr>
        <tr>
            <td><p class="returnText"><a href="reviewPage_Andre.php">Return to reviews</a></p></td>
        </tr>
    </table>

  </form>
  </p>
    <footer class="foot">
        <br /><br /><br /><br />
  </footer>

</body>
</html>