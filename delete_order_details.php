<?php
session_start();
include 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $order_id = $_GET['id'];
    
    // คำสั่ง SQL ในการลบข้อมูล
    $delete_query = "DELETE FROM order_details WHERE order_id = $order_id";
    
    if(mysqli_query($conn, $delete_query)) {
        $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
    } else {
        $_SESSION['message'] = "เกิดข้อผิดพลาดในการลบข้อมูล: " . mysqli_error($conn);
    }
}

header('Location: order_details.php');
exit();
?>
