<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
        if(isset($_GET['deleteid'])){
            $id=$_GET['deleteid'];
            $query = 'DELETE FROM `sanphammoi` WHERE `id` ='.$id;
            $result= mysqli_query($conn,$query);
            if($result){
                echo '<script>window.location.href = "show-sanpham.php";</script>';
                exit;
            }else{
                echo' xóa không thànhcông';
            }
        }
?>