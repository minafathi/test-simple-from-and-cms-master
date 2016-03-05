<?php require_once("./includes/databases.php");  ?>
<?php require_once("./includes/functions.php");  ?>
   <?php  
    // 2 . perform databese query
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    $result = mysqli_query($connetction, $query);
    // test if there was a query error
    if (!$result) {
        die("databese query faild");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Menu</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/public.css">
</head>
<body>
<div id="main">
  <div id="navigation">
 <ul>
                <?php
                    // 3. user returned data (if any)
                    while ($row = mysqli_fetch_assoc($result)) {
                            // output data from each row 
                        echo "<li>" . $row["menu_name"] . " " . "(" . $row['id'] . ")"  . "</br></li>";

                            //var_dump($row);
                            // echo "<li>" . $row["id"] . "</br></li>";
                            //echo "<li>" . $row["position"] . "</br></li>";
                            //echo "<li>" . $row["visible"] . "</br></li>"; 
                    }
                ?>
    </ul>

  </div>
  <div id="page">
    <h2>Admin Menu</h2>
    <p>Welcome to the admin area.</p>
    <ul>
      <li><a href="manage_content.php">Manage Website Content</a></li>
      <li><a href="manage_admins.php">Manage Admin Users</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>
 <?php 
                // 4. Relese returned data
                    mysqli_free_result($result);
 ?>

</body>
</html>

<?php  
    // 5. clese databese cpnnection
    mysqli_close($connetction);
?>




