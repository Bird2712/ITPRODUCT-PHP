<?php
session_start();
include 'config.php';

// Check if there is a search term submitted
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // SQL query to search for product name containing the search term
    $sql = "SELECT * FROM order_details WHERE product_name LIKE '%$searchTerm%'";
    $query = mysqli_query($conn, $sql);

    // Check if there are any results
    if(mysqli_num_rows($query) > 0) {
        $rows = mysqli_num_rows($query); // Update row count
    } else {
        $rows = 0; // Set row count to 0 if no results found
    }
} else {
    // If no search term, fetch all order details
    $query = mysqli_query($conn, "SELECT * FROM order_details");
    $rows = mysqli_num_rows($query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order And Details</title>
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
    </style>
</head> 
<body class="bg-body-tertiary">
    <?php include 'include/header_admin.php'; ?>
    <div class="container" style="margin-top: 30px;">
        <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- Search Form -->
        <form method="GET" action="" class="d-flex align-items-center">
            <input type="text" id="search" name="search" placeholder="ป้อนชื่อสินค้า" style="font-size: 15px; height: 30px;">
            <button type="submit" class="btn btn-primary" style="font-size: 15px; height: 30px;">ค้นหา</button>
        </form>

        <div class="w3-container">
            <h2 class="white-text"><center>สินค้าที่สั่งซื้อแล้ว</center></h2>
            <br>
        </div>

        <!-- Display Table of Order Details -->
        <table class="w3-table-all">
            <tr class="w3-blue">
                <th>ลำดับ</th>
                <th>หมายเลขสินค้า</th>
                <th>รายชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>ยอดรวม</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
            <?php
            $count = 1; // Initialize counter for row number
            while($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $data['product_id']?></td>
                <td><?php echo $data['product_name']?></td>
                <td><?php echo $data['price']?></td>
                <td><?php echo $data['quantity']?></td>
                <td><?php echo $data['total']?></td>
                <td><a href="edit_order_details.php?id=<?php echo $data['order_id']; ?>" class="btn btn-sm btn-primary">แก้ไข</a></td>
                <td><a href="delete_order_details.php?id=<?php echo $data['order_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?')">ลบ</a></td>
            </tr>
            <?php 
                $count++; // Increment row number counter
            } ?>

            <?php if($rows == 0): ?>
                <tr><td colspan='8'>ไม่พบผลลัพธ์</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
