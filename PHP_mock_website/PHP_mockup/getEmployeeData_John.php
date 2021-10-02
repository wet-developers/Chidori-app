<?php
  $employeeEmail="";
  if(isset($_GET["employeeEmail"])) $employeeEmail=$_GET["employeeEmail"];

  require_once("db.php");

  $sql = "SELECT employeeEmail, employeeAge FROM bit4444group27.employee WHERE employeeEmail=$employeeEmail";

    $result = $mydb->query($sql);

    $data = array();
    for($x=0; $x<mysqli_num_rows($result);$x++){
      $data[] = mysqli_fetch_assoc($result);
    }

    echo json_encode($data);

 ?>