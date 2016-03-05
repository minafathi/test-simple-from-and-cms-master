<?php
// 1. creat a databse connetction 

    $dbhost     = "localhost";
    $dbuser     = "root";
    $dbpass    ="";
    $dbname   ="form";
    $connetction = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // test if for connect
    if (mysqli_connect_errno()) {
        die("databeses connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
            );
    }
?>

<?php  
    //often these are from values in $_POST
    $id = 5;
    $menu_name = "Delete me";
    $position = 4;
    $visible = 1;

    // 2 . perform databese query

    $query = "UPDATE subjects SET ";
    $query .= "menu_name = '{$menu_name}', ";
    $query .= "position = {$position}, ";
    $query .= "visible = {$visible} ";
    $query .= "WHERE id = {$id}";
    $result = mysqli_query($connetction, $query);
    // test if there was a query error
    if ($result && mysqli_affected_rows($connetction) == 1) {
        // redirect_to("somepage.php");
       echo "success !!";
    } else {
        die("databeses query failled. " . mysqli_error($connetction));
    }
?>

<html>
    <head>
        <title>databse connect</title>
    </head>
    <body>
    </body>
</html>

<?php  
    // 5. clese databese cpnnection
    mysqli_close($connetction);
?>