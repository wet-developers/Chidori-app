<?php
  $ItemName="";
  if(isset($_GET["itemName"])) $ItemName=$_GET["itemName"];

  require_once("db.php");

  $sql = "SELECT itemName, rating FROM bit4444group27.review WHERE itemName=$ItemName";

    $result = $mydb->query($sql);

    $data = array();
    for($x=0; $x<mysqli_num_rows($result);$x++){
      $data[] = mysqli_fetch_assoc($result);
    }

    echo json_encode($data);

 ?>