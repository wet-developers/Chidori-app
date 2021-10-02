<?php
  $id = 0;
  if(isset($_GET['id'])) $id=$_GET['id'];

  require_once("db.php");

  $sql = "";
  if($id==0)
    $sql ="SELECT * FROM bit4444group27.item";
  else {
    $sql ="SELECT * FROM bit4444group27.item WHERE itemID=".$id;
    }
  $result = $mydb->query($sql);

  echo "<table border = 1>";
  echo "<thead>";
  echo "<th>ItemID</th><th>Item Description</th><th>Price</th>";
  echo "</thead>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["itemID"]."</td><td>".$row["ItemDesc"]."</td><td>".$row["itemPrice"]."</td>";
      echo "</tr>";
    }

  ?>



