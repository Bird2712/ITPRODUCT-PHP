<?php
    include_once 'controllers/Comment.php';
    $com = new Comment();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
          background-image: url('https://img.freepik.com/premium-photo/computer-notebook-laptop-table-electronics-store-shopping-mall-abstract-blur-defocused-background_1045533-1257.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <body class="bg-body-tertiary">
    
    <div class="container" style="margin-top: 30px;">
         
</head> 
<header>

       
    </div>
  </div>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

    <style>
        .box {
        border: 6px solid #9998;
        margin: 30px auto 0;
        padding: 20px;
        width: 1000px;
        height: 250px;
        overflow: scroll;
        }
        .box ul {
        margin: 0; padding: 0; list-style: none;
        }
        .box li {
            display: block;
            border-bottom: 1px dashed #ddd;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }
        .box li:last-child {
        border-bottom: 0 dashed #ddd;
        }
        .box span {
            color: #888;
        }
    </style>

    </head>
    <body>

    <div class="box">
        <ul>
            <?php
                if($result = $com->index()) {
                    while ($data = $result->fetch_assoc()) {
            ?>
                <li>
                    <b><?php echo $data['name']; ?></b> - <?php echo $data['comment']; ?> - <?php echo $com->dateFormat($data['comment_time']); ?>
                </li>
                 <?php } ?>   
            <?php }?>    
        </ul>
    </div>

    <br><br>
    <center>
    <?php
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo "<span style='color: green; font-size: 20px'>".$msg."</span>";
        }
    ?>

   
    </center>
</body>
<script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>
</html>