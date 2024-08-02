<?php

ob_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
        <nav id="navbar" >
            <div id="navbarsec-1">
                <div id="navright">
                    <img src="assets/web_logo.png" alt="">
                    <h3>E-commerce<h3>
                </div>
                <ul id="navleft">
                    <li><i class="fa-solid fa-user"></i>&nbsp;&nbsp;hello ,&nbsp; admin |</li>
                    <li><a href="index.php" style="text-decoration: none;color:aliceblue;"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;log out |</a></li>
                    <li><a href="index.php" style="text-decoration: none;color:aliceblue;">switch-User</a></li>
                </ul>
            </div>
            <div id="navbarsec-2" >
                <ul>
                    <li ><a href="#page1">Add Product</a></li>
                    <li ><a href="#page2">Show Product</a></li>
                </ul>
             
            </div>
        </nav>
    <div id="page1">
        <form action="" method="POST" enctype="multipart/form-data" id="productinsertbox">
            <h2>product details</h2>
            <p>Product Name:</p>
            <input class="input1" type="text" name="pname" placeholder="Enter Product Name">
            <p>Product Price:</p>
            <input class="input1" type="number" name="pprice" placeholder="Enter Product Price">
            <p>Product Image:</p>
            <input type="file" name="pimg" id="ffile">
            <p>Select Product Category:</p>
            <select name="pcategory" id="">
                <option value="Laptop">Laptop</option>
                <option value="Cloth">Cloth</option>
                <option value="Bage">Bages</option>
            </select>
            <button type="submit" name="uplodebtn">Upload</button>
        </form>
    </div>
    <form id="page2" action="" method="POST">
        <table>
            <tr>
                <th>id</th>
                <th>NAME</th>
                <th>price</th>
                <th>image</th>
                <th>category</th>
                <th>update</th>
                <th>delete</th>
            </tr>

            <?php
            $query = "select * from product";
            $data = mysqli_query($conn, $query);
            $result = mysqli_num_rows($data);
            if ($result > 0) {
                while ($row = mysqli_fetch_array($data)) {
            ?>

                    <tr>
                        <td>
                            <p><?php echo ($row[0]); ?></p>
                        </td>
                        <td>
                            <p><?php echo ($row[1]); ?></p>
                        </td>
                        <td>
                            <p><?php echo ($row[2]); ?></p>
                        </td>
                        <td>
                            <div><img src="<?php echo ($row[3]); ?>" alt=""></div>
                        </td>
                        <td>
                            <p><?php echo ($row[4]); ?></p>
                        </td>
                        <td><form action="" method="POST"><button name="updatebtn" type="submit" value="<?php echo ($row[0]); ?>">Update</button></form></td>
                        <td><button name="deletebtn" type="submit" value="<?php echo $row[0]."raj"; ?>">Delete</button></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Product Not Show..");
                </script>
            <?php
            }

            ?>



        </table>

    </form>
    <!-- <script> -->
                <!-- let toastmsg = document.querySelector("#toastmsg");
                toastmsg.innerHTML = "Record Deleted Successfully";
                gsap.from("#toastmsg", {
                    opacity: 1,
                    delay: 3,
                }) -->
                <!-- </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>

<?php
if (isset($_POST['uplodebtn'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];

    // global $ppimg;
    // $ppimg=$_File['pimg'];
    $imgname = $_FILES['pimg']['name'];
    $imgtmpname = $_FILES['pimg']['tmp_name'];
    // echo $imgname." ".$imgtmpname;
    $folder = "assets/productimg/" . $imgname;
    move_uploaded_file($imgtmpname, $folder);


    $query = "select * from product";
    $data = mysqli_query($conn, $query);
    $result = mysqli_num_rows($data);
    // echo "<h1>$result</h1>";
    $pcategory = $_POST['pcategory'];
    $query = "INSERT INTO product VALUES (NULL,'$pname', '$pprice', '$folder', '$pcategory');";
    $data = mysqli_query($conn, $query);
    if ($data) {
?>
        <script>
             alert("Product Uploded Successfully"); 
        </script> 

        <!-- <script> -->
                <!-- let toastmsg = document.querySelector("#toastmsg"); -->
                <!-- toastmsg.innerHTML = "Record Deleted Successfully"; -->
                <!-- gsap.from("#toastmsg", { -->
                    <!-- opacity: 1, -->
                    <!-- delay: 3, -->
                <!-- }) -->
        <!-- </script> -->
    <?php
    } else {
    ?>
        <script>
            alert("Product Uploded Failed");
        </script>
<?php
    }
}
?>

<?php


if (isset($_POST['deletebtn'])) {
    $pid=$_POST['deletebtn'];
    $query="delete from product where pid='$pid'";
    $data=mysqli_query($conn,$query);
    if($data){

        // echo '<script>alert("Product Uploaded Successfully");</script>';
        ?>


<script>alert("Product Deleted Successfully");</script>
        <!-- <script> -->
                <!-- let toastmsg = document.querySelector("#toastmsg"); -->
                <!-- toastmsg.innerHTML = "Record Deleted Successfully"; -->
                <!-- gsap.from("#toastmsg", { -->
                    <!-- opacity: 1, -->
                    <!-- delay: 3, -->
                <!-- }) -->
                <!-- </script> -->
    <?php
        header("Location: adminpanel.php?msg=Product_Deleted_Successfully");

    //    exit();
    }
    else{
        ?>
        <script>
            alert("Product Deletion Failed");
        </script>
    <?php
    }
    
}
if(isset($_POST['updatebtn'])){
    $id=$_POST['updatebtn'];
    // print_r($ppimg);
    header("Location: update.php?msg=$id&msg2=$rr");
}


ob_end_flush();
?>