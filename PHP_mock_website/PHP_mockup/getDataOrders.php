<?php
  $ItemDesc="";
  if(isset($_GET["itemDesc"])) $ItemDesc=$_GET["itemDesc"];

  require_once("db.php");

  $sql = "SELECT itemDesc, price FROM bit4444group27.order WHERE itemDesc=$ItemDesc";

    $result = $mydb->query($sql);

    $data = array();
    for($x=0; $x<mysqli_num_rows($result);$x++){
      $data[] = mysqli_fetch_assoc($result);
    }

    echo json_encode($data);

 ?>