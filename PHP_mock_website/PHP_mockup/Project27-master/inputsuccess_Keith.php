<!doctype html>
<html>
<head>
  <title>InputSuccess</title>
</head>
<body>
  <?php
  $itemid = 0;
  $menuItem = "";
  $itemPrice = 0;
  $err = false;

  if (isset($_POST["submit"])) {
    if(isset($_POST["itemDesc"])) $itemDesc = $_POST["itemDesc"]; 
    if(isset($_POST["itemPrice"])) $itemPrice = $_POST["itemPrice"];
  ?>
  <!-- display form data -->

  <table border="1">
  <thead>
      <tr>
        <th>Item Description</th><th>Item Price</th>
      </tr>
  </thead>
  <tbody>
      <tr>
        <td><?php echo $itemDesc; ?></td>
        <td><?php echo $itemPrice; ?></td> 
      </tr>
  </tbody>
  </table>

  <?php
    //add a new employee record if emptype is new. otherwise, modify the existing employee record
    require_once("db.php");

    if(empty($prodID)) {
      $sql = "INSERT INTO item(itemDesc, itemPrice) VALUES('$itemDesc', $itemPrice)";

      $result=$mydb->query($sql);

      if ($result==1) echo "<p>A new item record has been created</p>";

    } else {
      //modify the item record...
        $sql = "UPDATE bit4444group27.item SET itemid=$itemid, itemDesc='$itemDesc', itemPrice=$itemPrice WHERE itemid=$itemid";
        $result=$mydb->query($sql);

        if($result==1) echo "<p>A item record has been updated</p>";
    }
  }
  ?>
  <br />
  <br />
  <br />

<form method="get" action="AddNewItem_Keith.php">
    <button type="submit">Continue</button>
</form>
</body>
</html>