<?php
    // start_session();
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'test');


    $conn=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(mysqli_connect_errno())
    {
        echo 'Error: Cannot connect to database. Please try again!';
        exit;
    }

?>