<?php
$itemID = 0;

if (isset($_POST["delete"])) {
    if (isset($_POST["itemID"])) $itemID = $_POST["itemID"];
    require_once("db.php");
    $sql = "DELETE FROM bit4444group27.item WHERE itemID=$itemID";
    echo $sql;
    $result = $mydb->query($sql);
    header("HTTP/1.1 307 Temprary Redirect");
    header("Location: LandingPageEmp_Keith.php");
}
?>
<!doctype html>
<html>

<head>
    <title>Delete Item</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Our Morning Do'</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="template.css">
    <script>
        //ajax in jQuery
        $(function() {
            $("#productDropDown").change(function() {
                $.ajax({
                    url: "displayItems.php?id=" + $("#productDropDown").val(),
                    async: true,
                    success: function(result) {
                        $("#contentArea").html(result);
                    }
                })
            })
        })
    </script>
    <style>
        body {
            background-color: lightyellow;
        }

        .one {
            color: lightsteelblue;
            font-family: sans-serif;
            font-variant: small-caps;
            font-weight: 700;
            font-size: 18pt;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 110%;
            width: auto;
            overflow: auto;
            text-align: left;
            border-color: black;
            border-width: 1px;
            border-style: solid;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="theme">
            <div class="logoImage">
                <a><img src="Logo.png" width=200px /></a>
            </div>
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

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h3>Delete Item</h3>


            </label><br />
            <label> Select item to delete: &nbsp;&nbsp;
                <select name="itemID" id="productDropDown">
                    <?php
                    require_once("db.php");
                    $sql = "SELECT itemID from bit4444group27.item ORDER BY itemID";
                    $result = $mydb->query($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["itemID"] . "'>" . $row["itemID"] . "</option>";
                    }
                    ?>
                </select>
            </label><br />
            <div id="contentArea">&nbsp;</div>



            <input type="submit" name="delete" value="Delete Order" id="delete" />

        </form>
        <br />
        <footer class="foot">
            <br />
            <p><a href="LandingPageEmp_Keith.php">Back to dashboard</a></p><br />
            <br />
        </footer>

</body>

</html>