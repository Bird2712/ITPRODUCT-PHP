<?php
require('dbconnect.php');
$sql = "SELECT * FROM products"; //เลือกข้อมูลจากตาราง products ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>รายชื่อสินค้าทั้งหมด</title>
</head>

<body>



  <div class="container">
    <?php
    require("nav.php");
    ?>
    <h1 class="text-center mt-3">รายชื่อสินค้าทั้งหมด</h1>
    <form action="searchdata.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-6">
          <input type="text" placeholder="ค้นหาข้อมูลสินค้า" class="form-control" name="emp_data" required>
        </div>
        <div class="col-6">
          <input type="submit" value="ค้นหา" class="btn btn-primary w-5">
        </div>
      </div>
    

      
    </form>
    
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ลำดับ</th>
          <th>ชื่อสินค้า</th>
          <th>รายละเอียด</th>
          <th>ราคา</th>
          <th>รูปภาพ</th>
          <th>ซื้อ</th>

        </tr>
      </thead>
      <tbody>
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $order++; ?></td>
            <td><?php echo $row["product_name"]; ?></td>
            <td><?php echo $row["detail"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td>
                            <?php if(!empty($product['profile_image'])): ?>
                                <img src="<?php echo $base_url; ?>/upload_image/<?php echo $product['profile_image']; ?>" width="100" alt="Product Image">
                            <?php else: ?>
                                <img src="<?php echo $base_url; ?>/assets/images/no-image.png" width="100" alt="Product Image">
                            <?php endif; ?>
                            </td>
            <td><a href="<?php echo $base_url; ?>/cart-add.php?id=<?php echo $product['id']; ?>" class="btn btn-primary w-100"><i class="fa-solid fa-cart-shopping me-1"></i>Buy</a></td>
          </tr>
          
        <?php } ?>
      </tbody>
    </table>

  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>