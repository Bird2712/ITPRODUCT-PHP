<?php
session_start();
include 'config.php';

// Query to fetch all products
$query = mysqli_query($conn, "SELECT * FROM products");
$rows = mysqli_num_rows($query);

// Initialize product data if no ID is provided or invalid
$result = [
    'id' => '',
    'product_name' => '',
    'price' => '',
    'detail' => '',
    'profile_image' => '',
];

// If product ID is provided, fetch product details
if (!empty($_GET['id'])) {
    $query_product = mysqli_query($conn, "SELECT * FROM products WHERE id='{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_product);

    if ($row_product > 0) {
        $result = mysqli_fetch_assoc($query_product);
    } else {
        // Redirect to index page if product ID is invalid
        header('location: ' . $base_url . '/index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
</head>
<style>
body {
    background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
/* CSS */
.img-fluid {
    max-width: 100%;
    height: auto;
    width: 300px; /* Adjust this width as needed */
}

/* CSS */
.img-fluid {
    max-width: 100%;
    height: auto;
    width: 300px; /* Adjust this width as needed */
}

textarea {
    resize: none; /* Disable manual resizing */
    overflow: hidden; /* Hide scrollbar */
}

</style>
<body class="bg-body-tertiary">
    <div class="container" style="margin-top: 30px;">
        <div class="row g-5">
            <div class="col-md-8 col-sm-12">
                <form action="<?php echo $base_url; ?>/product-details.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="mb-3">
                    <label for="image" class="form-label"></label>
                    <?php if (!empty($result['profile_image'])): ?>
                        <img src="<?php echo $base_url; ?>/upload_image/<?php echo $result['profile_image']; ?>" class="img-fluid" alt="Product Image">
                    <?php else: ?>
                        <img src="<?php echo $base_url; ?>/assets/images/no-image.png" class="img-fluid" alt="No Image">
                    <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อสินค้า</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['product_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">ราคาสินค้า</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo number_format($result['price'], 2); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">รายละเอียดสินค้า</label>
                        <textarea class="form-control" id="detail" name="detail" rows="3" readonly><?php echo $result['detail']; ?></textarea>
                    </div>
                    <a href="<?php echo $base_url; ?>/product-list.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left me-1"></i> กลับ</a>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
        </div>
    </footer>

    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>
