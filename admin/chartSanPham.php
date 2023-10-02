<?php
	//include "../connect.php";
	$query = "SELECT sanphammoi.tensanpham, SUM(chitietdonhang.soluong) AS SoLuongDaBan
    FROM chitietdonhang
    INNER JOIN sanphammoi ON sanphammoi.id = chitietdonhang.idsp
    INNER JOIN donhang ON donhang.id = chitietdonhang.iddonhang
    WHERE donhang.trangthai = 4
    GROUP BY chitietdonhang.idsp";
	$data= mysqli_query($conn,$query);
	 
    $tenspArray = array();
    $soluongArray = array();
	
    while($row = mysqli_fetch_assoc($data)) {
        $tenspArray[] = $row['tensanpham'];
        $soluongArray[] = $row['SoLuongDaBan'];
    }

    $tensp = json_encode($tenspArray);
    $soluong = json_encode($soluongArray);

	 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê sản phẩm bán ra:
    </title>
</head>

<body>
    <h3>Số sản phẩm đã bán: <?php
        $queryTong = "SELECT SUM(SoLuongDaBan) AS TongSoLuongDaBan
        FROM (
            SELECT SUM(chitietdonhang.soluong) AS SoLuongDaBan
            FROM chitietdonhang
            INNER JOIN sanphammoi ON sanphammoi.id = chitietdonhang.idsp
            INNER JOIN donhang ON donhang.id = chitietdonhang.iddonhang
            WHERE donhang.trangthai = 4
            GROUP BY chitietdonhang.idsp
        ) AS subquery";
        $dataTong = mysqli_query($conn, $queryTong);
        $rowTong = mysqli_fetch_assoc($dataTong);
        echo $rowTong['TongSoLuongDaBan'];
        ?></h3>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const labels = <?php echo $tensp ?>;
    const data = {
        labels: labels,
        datasets: [{
            axis: 'y',
            label: 'Số Lượng Đã Bán Ra',
            data: <?php echo $soluong ?>,
            fill: false,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data,
        options: {
            indexAxis: 'y',
        }
    };
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script>
</body>

</html>