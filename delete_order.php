<!-- delete_order.php -->
<?php
session_start();
include 'config.php';

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    
    // คำสั่ง SQL ในการลบข้อมูล
    $delete_query = "DELETE FROM orders WHERE id = $id";
    
    if(mysqli_query($conn, $delete_query)) {
        $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
    } else {
        $_SESSION['message'] = "เกิดข้อผิดพลาดในการลบข้อมูล: " . mysqli_error($conn);
    }
}

header('Location: orders.php');
exit();
?>
