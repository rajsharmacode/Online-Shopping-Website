<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>
    <div id="page1">
        <form id="productinsertbox" action="" method="POST">
            <h2>Admin Login</h2>
            <p>Admin Email:</p>
            <input class="input1" type="text" name="username" placeholder="Enter User Email">
            <p>Admin Password:</p>
            <input class="input1" type="password" name="pass" placeholder="Enter Password">
            <button type="submit" name="loginbtn">Login</button>
    </form> 
    </div>

</body>
</html>

<?php
    if(isset($_POST['loginbtn'])){
        $username=$_POST['username'];
        $password=$_POST['pass'];

        if($username=="admin" && $password=="admin1234"){
            header("Location: adminpanel.php");
        }
    }
?>