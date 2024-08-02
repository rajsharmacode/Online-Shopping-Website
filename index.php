<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online E-commerce site</title>
    <link rel="icon" href="assets/web_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="maincontainer" >
        <nav id="navbar">
            <div id="navbarsec-1">
                <div id="navright">
                    <img src="assets/web_logo.png" alt="">
                    <h3>E-commerce<h3>
                </div>
                <ul id="navleft">
                    <li><a href="index.php" style="text-decoration: none;color:aliceblue;"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;home |</a></li>
                    <li><a href="mycart.php" style="text-decoration: none;color:aliceblue;"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;cart |</a></li>
                    <li><i class="fa-solid fa-user"></i>&nbsp;&nbsp;hello, User |</li>
                    <li><a href="loginask.php" style="text-decoration: none;color:aliceblue;"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;login |</a></li>
                    <li><a href="adminlogin.php" style="text-decoration: none;color:aliceblue;">switch-admin</a></li>
                </ul>
            </div>
            <div id="navbarsec-2">
                <ul>
                    <li>laptop</li>
                    <li>bag</li>
                    <li>cloths</li>
                </ul>
                <div id="searchsec">
                    <input type="text" name="searchtext2"  placeholder="Search hear..">
                    <form action="" method="POST"><button id="bb" type="submit" name="serchbtn4" >Search</button></form>
                </div>
            </div>
        </nav>

        <div id="navbarinvisible">

        </div>
        <form id="productbody" action="" method="POST">

            <?php
            include("connection.php");
            $query = "select * from product";
            $data = mysqli_query($conn, $query);
            $result = mysqli_num_rows($data);

            if ($result > 0) {
                while ($row = mysqli_fetch_array($data)) {

            ?>
                    <div id="productbox">
                        <div><img src="<?php echo $row['pimg']; ?>" alt="cloth1"></div>
                        <h2><?php echo $row['pname']; ?></h2>
                        <h3><?php echo "₹ " . $row['pprice']; ?></h3>
                        <input type="number" placeholder="AddToCart Quantity.." for="h1" name="<?php echo $row[0]; ?>">
                        <button id="h1" type="submit" name="cartbtn" value="<?php echo $row[0]; ?>">Add To Cart</button>
                    </div>

            <?php


                }
            }

            ?>


        </form>
        <div id="footer">
            <p>copyright @ 2024 coding with Raj</p>
        </div>

    </div>
</body>

</html>

<?php

    if(isset($_POST['cartbtn'])){
        $pid=$_POST['cartbtn'];
        $qnt1=$_POST[$pid];
        // $qnt=10;
        // echo "<h1 style='height='100vh;z-index=99''>$qnt1.'fyug'</h1><br>";
        // echo "<h1 style='height='100vh;z-index=99''>$pid.'fyug'</h1>";
        $query = "select * from product where pid='$pid'";
        $data = mysqli_query($conn, $query);
        $result = mysqli_num_rows($data);
        // print_r($result);
        if ($result > 0) {
            $row = mysqli_fetch_array($data);
            $pname=$row['pname'];
            $pprice=$row['pprice'];
        }
        $total1=($pprice*$qnt1);
        $query="INSERT INTO `mycart`(`cid`,`cname`, `cprice`, `cqnt`, `ctotal`) VALUES ('$pid','$pname','$pprice','$qnt1','$total1')";
        $data=mysqli_query($conn,$query);

    }


    if(isset($_POST['serchbtn4'])){
        // $sertext=$_POST['searchtext2'];
        // $query="select * from product where pname='$sertext'";

        // header("LOCATION: sertext.php?msg='$sertext'");
        // header("LOCATION:ertext.php");
        $sertext = $_POST['searchtext2'];
        header("Location: sertext.php?msg=" . urlencode($sertext));
        exit(); 


    }
?>