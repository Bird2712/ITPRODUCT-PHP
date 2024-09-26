<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['id'];
    $new_status = $_POST['status'];
    
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_status, $order_id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "สถานะได้รับการอัปเดตเรียบร้อยแล้ว";
    } else {
        $_SESSION['message'] = "เกิดข้อผิดพลาดในการอัปเดตสถานะ";
    }
    
    $stmt->close();
    $conn->close();
    
    header("Location: orders.php");
    exit();
}
?>
