<?php
  $id = 0;
  if(isset($_GET['id'])) $id=$_GET['id'];

  require_once("db.php");

  $sql = "";
  if($id==0)
    $sql ="SELECT * FROM bit4444group27.employee";
  else {
    $sql ="SELECT * FROM bit4444group27.employee WHERE employeeID=".$id;
    }
  $result = $mydb->query($sql);

  echo "<table>";
  echo "<thead>";
  echo "<th>Employee ID</th><th>Employee Email</th>";
  echo "</thead>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["employeeID"]."</td><td>".$row["employeeEmail"]."</td>";
      echo "</tr>";
    }

  ?>

