<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tutorial</title>
    <link rel="stylesheet" href="style.css">

   
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }
    .wrapper {
        margin: 0 auto;
        width: 1000px;
        display: flex;
        justify-content: center; /* จัดให้อยู่ตรงกลางในแนวนอน */
        align-items: center; /* จัดให้อยู่ตรงกลางในแนวดิ่ง */
        flex-direction: column; /* จัดเรียงเนื้อหาในแนวดิ่ง */
    }

    .img-qrcodem {
        width: 550px;
        height: 600px;
    }

   

    .button-container a {
        display: inline-block; /* ทำให้ปุ่มเป็นบล็อกเลือนไปอยู่ข้างล่าง */
        padding: 12px 30px; /* กำหนดขนาดของปุ่ม */
        border: none;
        border-radius: 5px;
        text-decoration: none; /* เอาชนะเพื่อน จะไม่มีขีดเส้นใต้ลิงก์ */
        cursor: pointer;
        font-size: 18px; /* กำหนดขนาดตัวอักษร */
    }

   

    .button-container .btn-info {
        background-color: #03B613; /* สีฟ้า */
        color: #fff;
    }

    body {
          background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3');
            background-size: cover;
        }

</style>

<body>
    <div class="wrapper">
        <br><img  class="img-qrcodem" src="img/qrcodem.jpg" alt="my qrcodem">
        <div class="button-container">
             <br><a href="http://localhost/shoppingcart/php-blob/index.php" class="btn btn-info">ส่งสลิปการโอนเงิน</a>
        </div>

        
    </div>
</body>
<script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</html>
