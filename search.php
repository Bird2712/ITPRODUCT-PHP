<?php
session_start();
include 'config.php';

if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // คิวรี่ฐานข้อมูลเพื่อค้นหาสินค้าที่มีชื่อหรือรายละเอียดใกล้เคียงกับคำค้นหา
    $query = mysqli_query($conn, "SELECT * FROM products WHERE product_name LIKE '%$keyword%' OR detail LIKE '%$keyword%'");
    $rows = mysqli_num_rows($query);
} else {
    // ถ้าไม่มีการส่งคำค้นหา ให้กลับไปที่หน้าแรกหรือหน้าสินค้าทั้งหมด
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
</head>

<style>
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
    <?php include 'include/menu.php'; ?>
    <div class="container" style="margin-top: 30px;">
        <h4><?php echo $keyword; ?></h4>

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
            
            <a href="<?php echo $base_url; ?>/cart-add.php?id=<?php echo $product['id']; ?>" class="btn btn-primary w-100"><i class="fa-solid fa-cart-shopping me-1"></i> Add Cart</a>
            <a href="<?php echo $base_url; ?>/product-details.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-info w-100 mt-2"><i class="fa-solid fa-info-circle me-1"></i> รายละเอียดสินค้า</a>

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

