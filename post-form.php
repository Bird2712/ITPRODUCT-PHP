<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $post_name = $_POST['post_name'];
    $myname = $_POST['myname'];
    $price = $_POST['price'];
    $tell = $_POST['tell'];
    $detail = $_POST['detail'];

    if (!empty($_FILES['profile_image']['name'])) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "upload_image/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                // Insert record
                $query = "UPDATE posts SET profile_image='$profile_image' WHERE id='$id'";
                mysqli_query($conn, $query);
            }
        }
    }

    if (empty($id)) {
        $query = "INSERT INTO posts (post_name, myname, price, tell, detail) VALUES ('$post_name', '$myname', '$price', '$tell', '$detail')";
    } else {
        $query = "UPDATE posts SET post_name='$post_name', myname='$myname', price='$price', tell='$tell', detail='$detail' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Post successfully saved!";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    header('location: post.php');
}
?>
``
