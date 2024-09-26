<?php
session_start();
include 'config.php';

// ฟังก์ชันเพื่อตรวจสอบรูปแบบของชื่อและนามสกุล (ภาษาอังกฤษและไทย)
function isValidFullName($name) {
    return mb_ereg_match('^[A-Za-zก-๙]+ [A-Za-zก-๙]+$', $name);
}

$search = '';
$rows = 0;
$query = null;

// ตรวจสอบว่ามีการค้นหาหรือไม่
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // ตรวจสอบว่าเป็นชื่อที่ถูกต้องหรือไม่
    if (!empty($search) && isValidFullName($search)) {
        // สร้าง query เพื่อค้นหาชื่อ
        $query = mysqli_query($conn, "SELECT * FROM orders WHERE fullname LIKE '%$search%'");
    } else {
        $error_message = 'กรุณากรอกชื่อและนามสกุลในรูปแบบที่ถูกต้อง';
    }
}

$rows = ($query) ? mysqli_num_rows($query) : 0; // ตรวจสอบจำนวนแถว
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
        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .search-form {
            display: flex;
            align-items: center;
            width: 35%;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .search-form input[type="text"] {
            flex: 1;
            font-size: 15px;
            height: 30px;
            border: none;
            outline: none;
            padding: 0 10px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        .search-form button[type="submit"] {
            font-size: 15px;
            height: 30px;
            margin-left: 10px;
            border: none;
            outline: none;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 0 15px;
        }
        .search-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body class="bg-body-tertiary">
<?php include 'include/menu.php'; ?>
    <div class="container">
        <div class="search-container">
            
        </div>

        <?php if(!empty($error_message)): ?>
<div class="alert alert-danger" role="alert" style="font-size: 18px; text-align: center;">
    <?php echo $error_message; ?>
</div>
<?php endif; ?>


        <?php if($query !== null && $rows > 0): ?>
        <div class="w3-container">
            <h2 class="black-text"><center><br>สถานะคำสั่งซื้อ</center></h2>
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
            while($data = mysqli_fetch_assoc($query)) { ?>
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
        <?php elseif($query !== null && $rows === 0): ?>
        <div class="alert alert-warning" role="alert">
            ไม่พบข้อมูลที่ค้นหา
        </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 CREATE BY BIRD</p>
    </footer>
</body>
</html>
