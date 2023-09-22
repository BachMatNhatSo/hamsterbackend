<?php
  	include "connect.php";

   $tensanpham = $_POST['tensanpham'];
   $giasp = $_POST['giasp'];
   $hinhanh = $_POST['hinhanh'];
   $mota = $_POST['mota'];
   $loai = $_POST['loai'];


   $query = 'INSERT INTO `sanphammoi`(`tensanpham`, `giasp`, `hinhanh`, `mota`, `loai`) VALUES ("'.$tensanpham.'","'.$giasp.'","'.$hinhanh.'","'.$mota.'",'.$loai.')';
   $data =mysqli_query($conn,$query);
        if ($data == true){
            $arr = [
                'success' =>true,
                'message' => "add user success!!",

        ];
        }else{
            $arr= [
                'success' =>false,
                'message' => "add user failed!!",

        ];
    }

print_r(json_encode($arr));
?>