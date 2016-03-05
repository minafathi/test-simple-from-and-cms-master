<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "form");

  // 1. Create a database connection
  $connetction = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // test if for connect
    if (mysqli_connect_errno()) {
        die("databeses connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
            );
    }
?>