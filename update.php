<?php
include("connection.php");
$id=$_GET['msg'];

$query="select * from product where pid='$id'";
$data=mysqli_query($conn,$query);
$resul=mysqli_num_rows($data);
if($resul>0){
    while($row=mysqli_fetch_array($data)){
         $id=$row[0];
         $name=$row[1];
         $price=$row[2];
         $img=$row[3];
         $category=$row[4];
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div id="page1">
        <form action="" method="POST" enctype="multipart/form-data" id="productinsertbox">
            <h2>product details</h2>
            <p>Product Name:</p>
            <input value="<?php echo $name; ?>" class="input1" type="text" name="pname" placeholder="Enter Product Name">
            <p>Product Price:</p>
            <input value="<?php echo $price; ?>" class="input1" type="number" name="pprice" placeholder="Enter Product Price">
            <p>Product Image:</p>
            <input value="<?php echo $img; ?>"  type="file" name="pimg" id="ffile">
            <p>Select Product Category:</p>
            <select name="pcategory" id="">
                <option value="<?php echo $category; ?>"><?php echo $category; ?>   </option>
                <option value="Laptop">Laptop</option>
                <option value="Cloth">Cloth</option>
                <option value="Bage">Bages</option>
            </select>
            <button type="submit" name="uplodebtn1" value="<?php echo $id; ?>">Update Product</button>
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['uplodebtn1'])){
    $pid=$_POST['uplodebtn1'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];

    // global $ppimg;
    // $ppimg=$_File['pimg'];
    $imgname = $_FILES['pimg']['name'];
    $imgtmpname = $_FILES['pimg']['tmp_name'];
    // echo $imgname." ".$imgtmpname;
    $folder = "assets/productimg/" . $imgname;
    move_uploaded_file($imgtmpname, $folder);

    $pcategory = $_POST['pcategory'];

    $query = "UPDATE `product` SET `pname`='$pname',`pprice`='$pprice',`pimg`='$folder',`pcategory`='$pcategory' WHERE pid='$pid'";
    $data = mysqli_query($conn, $query);
    // $result = mysqli_num_rows($data);
    // echo "<h1>$result</h1>";
    // $pcategory = $_POST['pcategory'];
    // $query = "INSERT INTO product VALUES (NULL,'$pname', '$pprice', '$folder', '$pcategory');";
    $data = mysqli_query($conn, $query);
    if ($data) {
        header("Location:adminpanel.php?msg=Update_succeessfully");
        
    }
}

?>