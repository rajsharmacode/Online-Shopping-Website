<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userregister.css">
</head>
<body>
    <div id="page1">
        <form id="productinsertbox" action="" method="POST">
            <h2>User Registration</h2>
            <p>Name:</p>
            <input class="input1" type="text" name="name" placeholder="Enter User Name">
            <p>Email:</p>
            <input class="input1" type="text" name="email" placeholder="Enter User Email">
            <p>Phone Number:</p>
            <input class="input1" type="number" name="pno" placeholder="Enter Phone Number">
            <p>Password:</p>
            <input class="input1" type="text" name="pass" placeholder="Enter Password">
            
            <button type="submit" name="registerbtn">Register</button>
</form>
    </div>

</body>
</html>
<?php
    if(isset($_POST['registerbtn'])){
        include("connection.php");
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pno=$_POST['pno'];
        $pass=$_POST['pass'];
        echo $name;
        $query="INSERT INTO `users` (`uid`, `name`, `email`, `pno`, `password`) VALUES (NULL, '$name', '$email', '$pno', '$pass');";
        $data=mysqli_query($conn,$query);
        if($data){
            header("Location:loginask.php");
        }

    }
?>
