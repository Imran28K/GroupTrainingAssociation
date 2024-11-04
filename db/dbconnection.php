<?php
    define ("DB_SERVER", "127.0.0.1") ;
    define ("DB_USERNAME", "root") ;
    define ("DB_PASSWORD", "") ;
    define ("DB_NAME", "gta_apprenticeships") ;

    $mysqli = new mysqli (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) ;

    /*
    if (!$mysqli){
        die("Error" . mysqli_connect_error());
    }
    else
    echo "Connection established"
    */
?>