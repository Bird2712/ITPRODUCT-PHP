<?php
session_start();
include 'config.php';

// เช็คว่ามีการส่งค่า search มาหรือไม่
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    // สร้าง query สำหรับค้นหาชื่อลูกค้า
    $query = mysqli_query($conn, "SELECT * FROM orders WHERE fullname LIKE '%$search%'");
} else {
    // ถ้าไม่ได้ส่งค่า search มา ให้แสดงข้อมูลทั้งหมด
    $query = mysqli_query($conn, "SELECT * FROM orders");
}
$rows = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1492551557933-34265f7af79e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .white-text {
            color: white;
        }
        .form-status {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-status select, .form-status button {
            margin-left: 5px;
        }
    </style>
</head>
<body class="bg-body-tertiary">
<?php include 'include/menu.php'; ?>
    <div class="container" style="margin-top: 30px;">
        <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

       

        <div class="w3-container">
            <h2 class="black-text"><center>สถานะคำสั่งซื้อ</center></h2>
            <br>
        </div>

        <table class="w3-table-all">
            <tr class="w3-blue">
                <th>ลำดับ</th>
                <th>วันที่</th>
                <th>ชื่อลูกค้า</th>
                <th>ที่อยู่ลูกค้า</th>
                <th>ชื่อสินค้าที่สั่ง</th>
                <th>เบอร์โทรศัพท์</th>
                <th>สถานะ</th>
            </tr>
            <?php
            $counter = 1;
            foreach($query as $data) { ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $data['order_date']; ?></td>
                <td><?php echo $data['fullname']; ?></td>
                <td><?php echo $data['ad_dress']; ?></td>
                <td><?php echo $data['name_product']; ?></td>
                <td><?php echo $data['tel']; ?></td>
                <td><?php echo $data['status']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
