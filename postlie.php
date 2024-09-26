<?php
session_start();
include 'config.php';

//product all
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

//post select edit
if(!empty($_GET['id'])) {
    $query_post = mysqli_query($conn, "SELECT * FROM posts WHERE id='{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_post);

    if($row_product == 0) {
         header('location:'. $base_url .'/post.php');
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
          background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

    </style>
<body class="bg-body-tertiary">
    
    <div class="container" style="margin-top: 30px;">
        <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>    

        <h4>โพสต์ของลูกค้า</h4>
        

    <div class="row">
        <div class="col-12">
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
                    <?php if($rows > 0): ?>
                    <?php while($post = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td>
                            <?php if(!empty($post['profile_image'])): ?>
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
                           
                        </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5"><h4 class="text-center text-danger">ไม่มีโพสต์</h4></td>
                 </tr>
                 <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    
  </div>
</footer>

    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</html>
