<?php

//connection to database
$servername="localhost";
$username="root";
$password="";
$database="withyouDB";

//create a connection
$con=mysqli_connect($servername, $username, $password,$database) or die("Could not connect");

//Die if connection was not successful
/*if(!$con){
    die("unsuccessful connection: ".mysqli_connect_error());
}
else{
    echo "Successful connection <br>";
}*/

?>