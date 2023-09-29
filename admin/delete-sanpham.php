<?php
    
        if(isset($_GET['deleteid'])){
            $id=$_GET['deleteid'];
            $query = 'DELETE FROM `sanphammoi` WHERE `id` ='.$id;
            $result= mysqli_query($conn,$query);
            if($result){
                header('location:display-sanpham.php');
            }else{
                echo' xóa không thànhcông';
            }
        }
?>