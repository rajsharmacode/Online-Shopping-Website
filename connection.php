<?php

$host="localhost";
$user="root";
$pass="";
$db="product_db";

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    ?>
        <script>
            alert("Database Connection Failed!");
        </script>
    <?php
}

?>