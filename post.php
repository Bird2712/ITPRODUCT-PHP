<?php
session_start();
include 'config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $post_name = $_POST['post_name'];
    $myname = $_POST['myname'];
    $price = $_POST['price'];
    $tell = $_POST['tell'];
    $detail = $_POST['detail'];
    $profile_image = '';

    if (!empty($_FILES['profile_image']['name'])) {
        $target_dir = "upload_image/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
        $profile_image = $_FILES["profile_image"]["name"];
    }

    if (!empty($id)) {
        // Update the existing post
        $query = "UPDATE posts SET post_name='$post_name', myname='$myname', price='$price', tell='$tell', detail='$detail'";
        if ($profile_image) {
            $query .= ", profile_image='$profile_image'";
        }
        $query .= " WHERE id='$id'";
        mysqli_query($conn, $query);
        $_SESSION['message'] = "Post updated successfully!";
    } else {
        // Insert new post
        $query = "INSERT INTO posts (post_name, myname, price, tell, detail, profile_image) VALUES ('$post_name', '$myname', '$price', '$tell', '$detail', '$profile_image')";
        mysqli_query($conn, $query);
        $_SESSION['message'] = "Post added successfully!";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch all posts
$query = mysqli_query($conn, "SELECT * FROM posts");
$rows = mysqli_num_rows($query);

//var product form
$result = [
    'id' => '',
    'post_name' =>'',
    'myname' =>'',
    'price' =>'',
    'tell' =>'',
    'detail' =>'',
    'product_image' =>'',
];

// Post select edit
if (!empty($_GET['id'])) {
    $query_post = mysqli_query($conn, "SELECT * FROM posts WHERE id='{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_post);

    if ($row_product == 0) {
         header('location:'. $base_url .'/post_admin.php');
    }

    $result = mysqli_fetch_assoc($query_post);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>

    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet"> 
    <link href="<?php echo $base_url; ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet"> 
</head>
<style>
        body {
          background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
<body class="bg-body-tertiary">
<?php include 'include/menu.php'; ?>
    <div class="container" style="margin-top: 30px;">
        <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>    

        <h4>โพสต์หาลูกค้า</h4>
        <div class="row g-5">
             <div class="col-md-8 col-sm-12">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                    <label class="form-label">Post</label>
                     <input type="text" name="post_name" class="form-control" value="<?php echo $result['post_name'];?>">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="myname" class="form-control" value="<?php echo  $result['myname'];?>">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo  $result['price'];?>">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Tell</label>
                    <input type="text" name="tell" class="form-control" value="<?php echo  $result['tell'];?>">
                </div>
                
                <div class="col-sm-6">
                    <?php if (!empty($result['profile_image'])): ?>
                        <div>
                        <img src="<?php echo $base_url; ?>/upload_image/<?php echo $result['profile_image']; ?>" width="100" alt="Product Image">
                        </div>
                    <?php endif; ?> 

                    <label for="formFile" class="form-label">Image</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div>

                <div class="col-sm-12">
                    <label class="form-label">Detail</label>
                    <textarea name="detail" class="form-control" rows="3"><?php echo  $result['detail']; ?></textarea>
                </div>
            </div>
            <?php if (empty($result['id'])): ?>    
                <button class="btn btn-primary" type="submit"><i class="fa-regular fa-floppy-disk me-1"></i>Post</button>
            <?php else: ?>
                <button class="btn btn-primary" type="submit"><i class="fa-regular fa-floppy-disk me-1"></i>Update</button>
            <?php endif; ?>

            <a role="button" class="btn btn-secondary" href = "<?php echo $base_url; ?>/post.php"><i class="fa-solid fa-rotate-left me-1"></i>Cancel</a>
            <hr class="my-4">
        </form>
    </div>
   
        <table class="table table-hover table-bordered mb-0" id="datatables">
                <thead>
                    <tr> 
                        <th style="width: 400px;">Image</th>
                        <th style="width: 1000px;">Post</th>
                        <th style="width: 800px;">Name</th>
                        <th style="width: 220px;">Tell</th>
                        <th style="width: 200px;">Price</th>
                    
                     </tr>
                </thead>
                <tbody>         
                    <?php if ($rows > 0): ?>
                    <?php while ($post = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td>
                            <?php if (!empty($post['profile_image'])): ?>
                                <img src="<?php echo $base_url; ?>/upload_image/<?php echo $post['profile_image']; ?>" width="400" alt="Product Image">
                            <?php else: ?>
                                <img src="<?php echo $base_url; ?>/assets/images/no-image.png" width="100" alt="Product Image">
                            <?php endif; ?>
                            </td>
                            <td><?php echo $post['post_name']; ?>

                                 <div>
                                    <small class="text"><?php echo ($post['detail']);?></small>
                                </div>

                                <td><?php echo $post['myname']; ?>
                                <td><?php echo $post['tell']; ?>
                                <td><?php echo number_format($post['price'], 2);?></td>
                            </td>
                        </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4"><h4 class="text-center text-danger">ไม่มีโพสต์</h4></td>
                 </tr>
                 <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

ิ<br><footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    
  </div>
</footer>

    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</html>
