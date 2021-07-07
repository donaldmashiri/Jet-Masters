<?php include('db.php') ?>


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
    <title>Jet costume ordering system</title>

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

<body>
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
                        <b style="color:#fed189">Jet</b><b style="color:#00a0df"> Costume Ordering System</b>
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
                        <li><a href="#">Customers</a>
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


<hr>


<!-- <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">a</div>
            <div class="col-md-4">a</div>
            <div class="col-md-4">a</div>
        </div>
    </div>
</section> -->




    <div class="header-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p> <b style="color:#fed189">Jet</b><b style="color:#00a0df"> Jet costume ordering system</b></p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p>20% Student Discount</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="img/icons/sales.png" alt="">
                        <p>30% off on dresses. Use code: 30OFF</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
