<?php
session_start();
include 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $order_id = $_GET['id'];
    
    // คิวรี่ข้อมูลจากฐานข้อมูล
    $query = mysqli_query($conn, "SELECT * FROM order_details WHERE order_id = $order_id");
    $data = mysqli_fetch_assoc($query);
}

// ตรวจสอบการบันทึกข้อมูลแก้ไข
if(isset($_POST['save_changes'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    
    // ทำการอัปเดตข้อมูล
    $update_query = "UPDATE order_details SET product_name = '$product_name', quantity = '$quantity', total = '$total' WHERE order_id = $order_id";
    mysqli_query($conn, $update_query);
    
    $_SESSION['message'] = "อัปเดตข้อมูลสำเร็จ";
    header('Location: order_details.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลการสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<br><br><br><br> <div  class=" form-container">
        <h2>แก้ไขข้อมูลการสั่งซื้อ</h2>
        <form method="POST" action="">
            <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
            <div class="form-group">
                <label for="product_name">ชื่อสินค้า</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $data['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">จำนวน</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $data['quantity']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total">ยอดรวม</label>
                <input type="text" class="form-control" id="total" name="total" value="<?php echo $data['total']; ?>" required>
            </div>
            <button type="submit" name="save_changes" class="btn btn-primary btn-block">บันทึกการเปลี่ยนแปลง</button>
        </form>
    </div>
</body>
</html>
