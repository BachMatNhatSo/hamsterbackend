<?php 
   // include "../connect.php";
?>
<?php
    	
        $id = $_GET['updateid'];
        if(isset($_POST['submit'])){
            $tensanpham = $_POST['tensanpham'];
            $giasp = $_POST['giasp'];
            $hinhanh = $_POST['hinhanh'];
            $mota = $_POST['mota'];
            $loai = $_POST['loai'];


   $query = 'UPDATE `sanphammoi` SET `tensanpham`="'.$tensanpham.'",`giasp`="'.$giasp.'",`hinhanh`="'.$hinhanh.'",`mota`="'.$mota.'",`loai`='.$loai.' WHERE `id`='.$id;
            $result= mysqli_query($conn,$query);
            if($result){
                echo 'thêm thành công ';
            }else{
                echo 'thêm không thành công ';
            }
        }
?>

<!DOCTYPE html>
<html>

<body>
    <h2>HTML Forms</h2>
    <form method="post">
        <div class="form-group">
            <label>Tên sản Phẩm</label>
            <input type="text" placeholder="Nhập Tên Sản phẩm" name="tensanpham" />
        </div>
        <div class="form-group">
            <label>Giá sản Phẩm</label>
            <input type="text" placeholder="Nhập Giá Sản phẩm" name="giasp" />
        </div>
        <div class="form-group">
            <label>Ảnh sản Phẩm</label>
            <input type="text" placeholder="Nhập Link Sản phẩm" name="hinhanh" />
        </div>
        <div class="form-group">
            <label>Mô tả sản Phẩm</label>
            <input type="text" placeholder="Nhập Mô Tả Sản phẩm" name="mota" />
        </div>
        <div class="form-group">
            <label>Loại sản Phẩm</label>
            <input type="text" placeholder="Nhập Loại Sản phẩm" name="loai" />
        </div>

        <button type="submit" name="submit"> Update</button>
    </form>


</body>

</html>