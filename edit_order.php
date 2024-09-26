<!-- edit_order.php -->
<?php
session_start();
include 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // คิวรี่ข้อมูลจากฐานข้อมูล
    $query = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
}

// ตรวจสอบการบันทึกข้อมูลแก้ไข
if(isset($_POST['save_changes'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $product_name = $_POST['product_name'];
    $tel = $_POST['tel'];
    
    // ทำการอัปเดตข้อมูล
    $update_query = "UPDATE orders SET fullname = '$fullname', ad_dress = '$address', name_product = '$product_name', tel = '$tel' WHERE id = $id";
    mysqli_query($conn, $update_query);
    
    $_SESSION['message'] = "อัปเดตข้อมูลสำเร็จ";
    header('Location: orders.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
        }
        h2 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

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
<body>
<br><br><br> <div class="form-container">
        <h2>แก้ไขข้อมูลการสั่งซื้อ</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="fullname">ชื่อลูกค้า</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $data['fullname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">ที่อยู่ลูกค้า</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['ad_dress']; ?>" required>
            </div>
            <div class="form-group">
                <label for="product_name">ชื่อสินค้าที่สั่ง</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $data['name_product']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tel">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $data['tel']; ?>" required>
            </div>
            <button type="submit" name="save_changes" class="btn btn-primary btn-block">บันทึกการเปลี่ยนแปลง</button>
        </form>
    </div>
</body>
</html>
