<?php

$connection = mysqli_connect("localhost:3306", "root", "", "gta_apprenticeship");

if(!$connection){
    die("Error" . mysqli_connect_error());
}
else
echo 'connection established';



?>