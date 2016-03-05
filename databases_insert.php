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
    $menu_name = "Today's Widget Trivia";
    $position = (int) 4;
    $visible = (int) 1;

    // Escape all string (sql injection)
    $menu_name = mysqli_real_escape_string($connetction, $menu_name);
    // 2 . perform databese query

    $query = "INSERT INTO subjects (";
    $query .= "  menu_name, position, visible";
    $query .= ") VALUES (";
    $query .= "  '{$menu_name}', {$position},{$visible}";
    $query .= ")";
    $result = mysqli_query($connetction, $query);
    // test if there was a query error
    if ($result) {
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