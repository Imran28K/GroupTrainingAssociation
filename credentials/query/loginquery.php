<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email . "<br>";
    echo $password . "<br>";
}

?>

i will do login query - imran