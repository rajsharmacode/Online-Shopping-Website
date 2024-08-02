<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online E-commerce site</title>
    <link rel="icon" href="assets/web_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="mycart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="maincontainer">
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
                    <li><i class="fa-solid fa-cart-shopping"></i></li>
                    <li>My Cart</li>
                </ul>
            </div>
        </nav>

        <!-- <div id="navbarinvisible">

        </div> -->
        <div id="page2">
            <table>
            <tr>
                    <th>Serial No.</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th>remove</th>
                    <th>totalprice</th>
                </tr>

                <?php

                include("connection.php");
                $query="SELECT cid,cname,cprice,sum(cqnt) from mycart group by cid;";
                $data=mysqli_query($conn,$query);
                $result=mysqli_num_rows($data);
                if($result>0){
                    $i=1;
                    $tot=0;
                    while($row=mysqli_fetch_array($data)){
                        $temp=($row[2]*$row[3]);
                        $tot=$tot+$temp;
                        ?>
                           <tr>
                    <td><p><?php  echo($i++); ?></p></td>
                    <td><p><?php echo $row[1]; ?></p></td>
                    <td><p><?php echo $row[2]; ?></p></td>
                    <td><p><?php echo $row[3]; ?></p></td>
                    <td><form action="deletecart.php" method="POST"><button type="submit" name="removebtn" value="<?php echo $row[0]; ?>">Remove</button></form></td>
                    <td><p><?php echo($row[2]*$row[3]); ?></p></td>
                </tr>
    
                        
                        <?php
                    }
                }

                ?>


             



            </table>

            <div id="carttotal"> 
                <h2>total</h2>
                <h2><?php echo "₹ ".$tot; ?></h2>
            </div>
            
        </div>
        

    </div>
    <div id="footer">
        <p>copyright @ 2024 coding with Raj</p>
    </div>
</body>
</html>

