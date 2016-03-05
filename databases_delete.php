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
    // 2 . perform databese query
    $query = "DELETE FROM subjects ";
    $query .= "WHERE id = {$id}";
    $query .= " LIMIT 1";

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