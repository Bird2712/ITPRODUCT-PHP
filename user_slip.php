<?php
session_start();
include 'config.php';

//product all
$query = mysqli_query($conn, "SELECT * FROM userslip");
$rows = mysqli_num_rows($query);

//var product form
$result = [
    'id' => '',
    'product_image' =>'',
];

//post select edit
if(!empty($_GET['id'])) {
    $query_post = mysqli_query($conn, "SELECT * FROM userslip WHERE id='{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_post);

    if($row_product == 0) {
         header('location:'. $base_url .'/slip.php');
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

</head>

<?php include 'include/menu_copy.php'; ?>

<style>
        body {
          background-image: url('https://img.freepik.com/premium-photo/computer-notebook-laptop-table-electronics-store-shopping-mall-abstract-blur-defocused-background_1045533-1257.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }     

        .center-table {
    margin-left: auto;
    margin-right: auto;
}


    </style>
<body 



class="bg-body-tertiary">
            
    <div class="container" style="margin-top: 30px;">
        <?php if(!empty($_SESSION['message'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>    

        <h4><center>รายการสลิป</center></h4>
        
             <div class="col-md-8">
                <form action="<?php echo $base_url; ?>/slip-form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                
                <div class="col-sm-6">
                    <?php if(!empty($result['profile_image'])): ?>
                        <div>
                        <img src="<?php echo $base_url; ?>/upload_image/<?php echo $result['profile_image']; ?>" width="100" alt="Product Image">
                        </div>
                    <?php endif; ?> 


    
                   
                    <table class="table table-bordered border-info mx-auto">


              
                        <th style="width: 400px;"> <center>รูปภาพสลิปการโอนเงิน</center></th>

                        
               
                <tbody>         
                    <?php if($rows > 0): ?>
                    <?php while($post = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td>
                            <?php if(!empty($post['profile_image'])): ?>
                               
                                <center> <img src="<?php echo $base_url; ?>/upload_image/<?php echo $post['profile_image']; ?>" width="400" alt="Product Image"> </center>
                            <?php else: ?>
                                <img src="<?php echo $base_url; ?>/assets/images/no-image.png" width="100" alt="Product Image">
                            <?php endif; ?>
                            </td>
                            

                               
                                
                           
                        </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4"><h4 class="text-center text-danger">ไม่มีสลิป</h4></td>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</html>