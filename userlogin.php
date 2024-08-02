<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userlogin.css">
</head>
<body>
    <div id="page1">
        <form id="productinsertbox" action="" method="POST">
            <h2>User Login</h2>
            <p>User Email:</p>
            <input class="input1" type="text" name="email" placeholder="Enter User Email">
            <p>User Password:</p>
            <input class="input1" type="text" name="pass" placeholder="Enter Password">
            <button type="submit" name="loginbtn">Login</button>
        </form>
    </div>

</body>
</html>

<?php
include("connection.php");
if (isset($_POST['loginbtn'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query="select * from users";
    $data=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($data)){
        if($row[1]==$email && $row[4]==$pass){
            header("Location:index.php");
        }
        else{
            ?>
            <script>alert("Login Failed or Register")</script>
            <?php
        }
    }

}
?>