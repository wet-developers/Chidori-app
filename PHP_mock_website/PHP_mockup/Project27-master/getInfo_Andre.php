<!doctype html>
<html>
<head>
  <title> Php Ajax</title>
</head>
<body>
  <?php
    $id = 0;
    if(isset($_GET['id'])) $id=$_GET['id'];

    require_once("db.php");

    $sql="SELECT itemDesc FROM item WHERE itemID=".$id;
    $result = $mydb->query($sql);

    if($row=mysqli_fetch_array($result)){
      echo "This product is ".$row["itemDesc"];
    } else {
      echo "Your item name cannot be found.";
    }

  ?>
</body>
</html>
