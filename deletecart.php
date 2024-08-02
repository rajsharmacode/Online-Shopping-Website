<?php
include("connection.php");

if(isset($_POST['removebtn'])){
    $id=$_POST['removebtn'];
    $query="delete from mycart where cid='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        header("LOCATION: mycart.php");
?>
        <script>
            alert("Card Rmove");
        </script>
        <?php
    }

}
?>