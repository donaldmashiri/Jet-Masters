<?php include('includes/db.php') ?>


<?php
$query = "SELECT * FROM customers WHERE customer_id = '{$_SESSION['customer_id']}'";
$select_customer = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_customer)) {
    $customer_id = $row['customer_id'];
    $customer_name = $row['customer_name'];

}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jet Consume Masters</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body onload="window.print();">
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    
                    <h2><img style="background-color:#fed189" src="img/icons/sales.png" alt="">
                        <b style="color:#fed189">Jet</b><b style="color:#00a0df"> Consume Masters</b>
                    </h2>
                    <!-- <a href="./index.html"><img src="img/logo.png" alt=""></a> -->
                </div>
               
                <div class="user-access">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        if(isset($_SESSION['customer_id'])){
                        echo $customer_name;
                        }else{
                            echo "Signup or Login";
                        }
                ?>
                        
                       
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <?php
                        if(isset($_SESSION['customer_id'])){
                        echo "<a class='dropdown-item' href='login.php?destroy'>Logout</a>";
                        }else{
                            echo "<a class='dropdown-item' href='login.php'>Login</a>";
                           
                        }

                        if(isset($_GET['destroy'])){
                            unset($_SESSION['customer_id']);
                            unset($_SESSION['cart_number']);

                            header("Location: login.php");
                        
                        }


                ?>

                    
                    </div>
                </div>

               
                    <!-- <a href="#" class="in">Sign in</a> -->
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="./categories.html">Customers</a>
                        <ul class="sub-menu">
                        <?php
                        if(isset($_SESSION['customer_id'])){
                            echo "<li><a href='customer_order.php'>Create Order</a></li>";
                            echo "<li><a href='view_orders.php'>View Orders</a></li>";
                        }else{
                            echo "<li><a href='login.php'>Create Order</a></li>";
                        }
                        ?>
                                <!-- <li><a href="product-page.html">View Orders</a></li> -->
                            </ul>
                        </li>
                        <li><a href="reviews.php">Reviews</a></li>
                        <!-- <li><a href="checkout.php">Check-out</a></li> -->
                        <li> <a href="checkout.php">Check-out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p> <b style="color:#fed189">Jet</b><b style="color:#00a0df"> Consume Masters</b></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p><?php echo "CustomerJCM00-".$customer_id ?></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="img/icons/sales.png" alt="">
                        <p><?php echo $customer_name ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 

$open = $_GET['custom_print'];


$sql = "SELECT * FROM custom_made WHERE custom_id = $open";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$custom_id = $row["custom_id"];
$cloth_type = $row["cloth_type"];
$custom_size = $row["custom_size"];
$custom_image = $row["custom_image"];
$worst = $row["worst"];
$custom_features = $row["custom_features"];
$height = $row["height"];
$breast = $row["breast"];
$custom_date = $row["custom_date"];
$custom_status = $row["custom_status"];
$location = $row["location"];
$payment = $row["payment"];


}
} else {
echo "0 results";
}

?>

    




<!-- Contact Section Begin -->
<div class="contact-section mt-5">
        <div class="container-fluid ml-5 mr-5">
        <h2 class="mb-4">You custom made order</h2>
        <a href="custom_print.php" class="btn btn-secondary">Print</a>


            <div class="row">
                <div class="col-lg-12">
                <hr>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Order#</th>
                        <th scope="col">sample design</th>
                        <th scope="col">Type</th>
                        <th scope="col">Features</th>
                        <th scope="col">Worst (cm)</th>
                        <th scope="col">Height (cm)</th>
                        <th scope="col">Breast (cm)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th> 
                        <th scope="col">Payment#</th>                       
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                    $open = $_GET['custom_print'];


$sql = "SELECT * FROM custom_made WHERE custom_id = $open";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $custom_id = $row["custom_id"];
      $cloth_type = $row["cloth_type"];
      $custom_size = $row["custom_size"];
      $custom_image = $row["custom_image"];
      $worst = $row["worst"];
      $custom_features = $row["custom_features"];
      $height = $row["height"];
      $breast = $row["breast"];
      $custom_date = $row["custom_date"];
      $custom_status = $row["custom_status"];
      $location = $row["location"];
      $payment = $row["payment"];


    }
} else {
  echo "0 results";
}
  
?>
                        <tr>
                        <th scope="row">JCM00<?php echo $custom_id; ?></th>
                        <td> <img src="img/custom/<?php echo $custom_image ?>" width="100" height="50" alt="" srcset=""> </td>
                        <td><?php echo $cloth_type; ?></td>
                        <td><?php echo $custom_features; ?></td>
                        <td><?php echo $worst; ?></td>
                        <td><?php echo $height; ?></td>
                        <td><?php echo $breast; ?></td>
                        <td><?php echo $custom_date; ?></td>
                        <td><?php 
                        if($custom_status === 'pending'){
                            echo "<p class='text-warning'>$custom_status</p>";
                        }elseif($custom_status === 'declined'){
                            echo "<p class='text-danger'>$custom_status</p>";
                        }else{
                            echo "<p class='text-success'>$custom_status</p>";
                        }
                             ?></td>
                            <td><?php echo $location; ?></td>
                            <td><?php echo $payment; ?></td>  

                        </tr>
                    
                    </tbody>
                    </table>
            </div>
        
            <?php 
if($custom_status === 'approved' && $payment === 'not paid'){

    echo "<p class='alert alert-danger'>Your product havent beeing approved yet</p>";
   

}elseif($payment !== 'not paid'){
  echo "<p class='alert alert-success'>Your payment has been made</p>";
}

else{
    echo "<p class='text-warning'>You will pay when your order is approved</p>";
}


?>
        </div>
    </div>




<hr>





    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>




















