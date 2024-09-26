<?php 
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
          background-image: url('https://img.freepik.com/premium-photo/computer-notebook-laptop-table-electronics-store-shopping-mall-abstract-blur-defocused-background_1045533-1257.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head> 
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="index2.php" class="navbar-brand d-flex align-items-center" style="height: 70px;">
            <strong>Home</strong>
        </a>
      
    </div>
  </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
     
<div class="px-4 py-5 my-5 text-center">
<h1 class="display-5 fw-bold text-body-emphasis text-white">Welcome To BBIT Shop</h1>


    <div class="col-lg-5 mx-auto">
    <p class="lead mb-4 text-Black" style="color: black; font-size: 22px;">ยินดีต้อนรับสู่ร้านค้าบีบีไอที เลือกสรรค์อุปกรณ์และบริการที่มีคุณภาพในราคาที่เหมาะสม เพื่อลูกค้าทุกท่านที่มาใช้บริการ เราจัดจำหน่ายพร้อมให้บริการสินค้าไอที และคำแนะนำต่างๆ อย่างมั่นใจ</p> <br>

            <button type="button" class="btn btn-primary gap-3"><p><a href="product-list.php" class="text-white">Shop Now</a></p></button>
            <button type="button" class="btn btn-danger gap-3"><p><a href="http://localhost/shoppingcart/index.php" class="text-white">Logout</a></p></button>

        </div>
    </div>
</div>



<body>
     <!-- Notification Message -->
     <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                  ?>
             </h3>
        </div>
     <?php endif ?>

    <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p class="welcome-message">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <!--<p><a href="index2.php?logout='1'" style="color: red;">Logout</a></p>-->
        <?php endif ?>
    </div>

    <style>
    .welcome-message {
        text-transform: uppercase;
        font-size: 45px; /* เปลี่ยนขนาดตัวอักษรเป็น */
        text-align: center; /* ทำให้ข้อความตรงกลาง */
        color: black; /* เปลี่ยนสีข้อความเป็นสีดำ */
    }
</style>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>