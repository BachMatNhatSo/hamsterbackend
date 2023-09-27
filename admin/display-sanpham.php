<?php
    	include "../connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .product-image {
        max-width: 100px;
        max-height: 100px;
    }
    </style>
</head>

<body>

    <h2>HTML Table</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Link Ảnh</th>
            <th>Mô Tả</th>
            <th>Loại</th>
            <th>Tương Tác</th>
        </tr>
        <?php
        $query = "SELECT  * FROM `sanphammoi`";
          $result= mysqli_query($conn,$query);
          if($result){
          while(  $row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $tensanpham=$row['tensanpham'];
            $giasp=$row['giasp'];
            $hinhanh=$row['hinhanh'];
            $mota=$row['mota'];
            $loai=$row['loai'];
            echo ' 
            <tr>
                <td>' . $id . '</td>
                <td>' . $tensanpham . '</td>
                <td>' . $giasp . '</td>
                <td>';

            // Kiểm tra nếu hình ảnh là liên kết
            if (strpos($hinhanh, 'https') === 0) {
                echo '<img class="product-image" src="' . $hinhanh . '" alt="Hình ảnh">';
            } else {
                echo '<img class="product-image" src="../images/' . $hinhanh . '" alt="Hình ảnh">';
            }

            echo '</td>
                  <td>' . $mota . '</td>
                  <td>' . $loai . '</td>
                 <td> <button><a href="update-sanpham.php?updateid='.$id.'">Update</a></button>
                 <button><a href="delete-sanpham.php?deleteid='.$id.'">Delete</a></button></td>
            </tr>';
          }
        }
        ?>

    </table>

</body>

</html>