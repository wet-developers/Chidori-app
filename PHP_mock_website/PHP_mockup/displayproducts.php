<?php
  $id = 0;
  if(isset($_GET['id'])) $id=$_GET['id'];

  require_once("db.php");

  $sql = "";
  if($id==0)
    $sql ="SELECT * FROM bit4444group27.order";
  else {
    $sql ="SELECT * FROM bit4444group27.order WHERE orderID=".$id;
    }
  $result = $mydb->query($sql);

  echo "<table>";
  echo "<thead>";
  echo "<th>Order ID</th><th>Date Of Purchase</th><th>Customer Email</th><th>Item Description</th><th>Order Price</th>";
  echo "</thead>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["orderID"]."</td><td>".$row["dateofPurchase"]."</td><td>".$row["customerEmail"]."</td>
      <td>".$row["itemDesc"]."</td><td>".$row["price"]."</td>";
      echo "</tr>";
    }

  ?>



