<?php
session_start();
include 'config.php';

//product all
$query = mysqli_query($conn, "SELECT * FROM products");
$rows = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
</head>
<style>
        body {
          background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        body {
    font-family: 'Roboto', sans-serif; /* เลือกฟอนต์ที่ต้องการ */
    font-size: 16px; /* กำหนดขนาดฟอนต์หลัก */
    line-height: 1.6; /* กำหนดระยะห่างบรรทัด */
}
h4 {
    font-size: 1.5rem; /* กำหนดขนาดฟอนต์สำหรับหัวข้อ h4 */
}
footer {
    background: #1E2023;
    padding: 1rem;
    text-align: center;
    color: #fff;
}

.btn-outline-info {
    color: #17a2b8;
    border-color: #17a2b8;
}

.btn-outline-info:hover {
    background-color: #17a2b8;
    color: #fff;
    border-color: #17a2b8;
}

.card {
    height: 475px; /* กำหนดความสูงของการ์ด */
}

.card-img-top {
    object-fit: cover; /* ทำให้ภาพที่ปรากฏในการ์ดตรงกับขนาด */
    height: 200px; /* กำหนดความสูงของภาพ */
    width: 100%; /* กำหนดความกว้างของภาพเต็ม */
}
.card-title {
    font-size: 1rem; /* กำหนดขนาดฟอนต์สำหรับชื่อสินค้า */
    margin-bottom: 1rem; /* กำหนดระยะห่างของข้อความ */
}

.card-text {
    font-size: 0.9rem; /* กำหนดขนาดฟอนต์สำหรับราคาสินค้า */
}
    </style>
<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>    

            <h4>รายการสินค้าทั้งหมด</h4>
            
            <div class="row d-flex justify-content-center">
            <?php if($rows > 0): ?>
                <?php while($product = mysqli_fetch_assoc($query)): ?>
                    <div class="col-3 mb-3">
        <div class="card" style="width: 18rem;">
        <?php if(!empty($product['profile_image'])): ?>
            <img src="<?php echo $base_url; ?>/upload_image/<?php echo $product['profile_image']; ?>" class="card-img-top" style="width: 286px; height: 300px;" alt="Product Image">
        <?php else: ?>
            <img src="<?php echo $base_url; ?>/assets/images/no-image.png" class="card-img-top" style="width: 286px; height: 180px;" alt="Product Image">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
            <p class="card-text text-success fw-bold mb-0"><?php echo number_format($product['price'], 2); ?> บาท</p>
            
            <a href="http://localhost/shoppingcart/login/login2.php" class="btn btn-primary w-100"><i class="fa-solid fa-cart-shopping me-1"></i> Add Cart</a>
            <a href="<?php echo $base_url; ?>/product-details3.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-info w-100 mt-2"><i class="fa-solid fa-info-circle me-1"></i> รายละเอียดสินค้า</a>

        </div>
    </div>
</div>

                <?php endwhile; ?>
        
            <?php else: ?>
                <div class="col-12"> 
                    <h4 class="text-danger">ไม่มีรายการสินค้า</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <br>
    <footer>
        <p>&copy; 2024 CREATE BY BIRD</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>