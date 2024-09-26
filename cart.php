<?php
session_start();
include 'config.php';

$productIds = [];
foreach(($_SESSION['cart'] ?? []) as $cartId => $cartQty) {
    $productIds[] = $cartId;
}

$ids = 0;
if(count($productIds) > 0) {
    $ids = implode(',', $productIds);
}

//product all
$query = mysqli_query($conn, "SELECT * FROM products WHERE Id IN($ids)");
$rows = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
    
</head>
<style>
    body {
        background-image: url('https://img.freepik.com/premium-photo/computer-notebook-laptop-table-electronics-store-shopping-mall-abstract-blur-defocused-background_1045533-1257.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40; /* Example background color */
            color: white;
            text-align: center;
            padding: 10px 0;
        }
</style>
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

        <h4>Cart</h4>
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $base_url; ?>/cart-update.php" method="post">
                    <table class="table table-bordered border-info">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Image</th>
                                <th>Product Name</th>
                                <th style="width: 200px;">Price</th>
                                <th style="width: 100px;">Quantity</th>
                                <th style="width: 200px;">Total</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>         
                            <?php if($rows > 0): ?>
                                <?php while($product = mysqli_fetch_assoc($query)): ?>
                                    <tr>
                                        <td>
                                            <?php if(!empty($product['profile_image'])): ?>
                                                <img src="<?php echo $base_url; ?>/upload_image/<?php echo $product['profile_image']; ?>" width="100" alt="Product Image">
                                            <?php else: ?>
                                                <img src="<?php echo $base_url; ?>/assets/images/no-image.png" width="100" alt="Product Image">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo $product['product_name']; ?>
                                            <div>
                                                <small class="text"><?php echo ($product['detail']);?></small>
                                            </div>
                                        </td>
                                        <td><?php echo number_format($product['price'], 2);?></td>
                                        <td><input type="number" name="product[<?php echo $product['id']; ?>][quantity]" value="<?php echo $_SESSION['cart'][$product['id']]?>" class="form-control"></td>
                                        <td><?php echo number_format($product['price'] * $_SESSION['cart'][$product['id']], 2)?></td>
                                        <td>
                                            <?php if (!isset($_SESSION['ordered'])): ?>
                                                <a onclick="return confirm('Are you sure ?');" role="button" href="<?php echo $base_url; ?>/cart-delete.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash me-1"></i>Delete</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <button type="submit" class="btn btn-lg btn-success">Update Cart</button>
                                        <a href="<?php echo $base_url; ?>/checkout.php" class="btn btn-lg btn-primary">Checkout Order</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6"><h4 class="text-center text-danger">ไม่มีรายการสินค้าในตะกร้า</h4></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 CREATE BY BIRD</p>
    </footer>
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>
