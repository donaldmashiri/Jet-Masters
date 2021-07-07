<?php include('includes/header.php') ?>

<body>
    <!-- container section start -->
    <section id="container" class="">


        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">JET <span class="lite">COSTUME MASTERS</span></a>
            <!--logo end-->


        </header>
        <!--header end-->

        <!--sidebar start-->
       <?php include('includes/sidebar.php') ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>

                    </div>
                </div>

                <div class="row">
                <?php include('includes/dash.php') ?>

                </div>
                <!--/.row-->


                <!-- Today status end -->

                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>All Products (Limit 2)</strong></h2>
                                <div class="panel-actions">
                                    <!-- <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a> -->
                                    <a href="all.php" class="btn-minimize"><i class="fa fa-chevron-up"></i>View all</a>
                                    <a href="#" class="btn-close"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Features</th>
                                            <th>Amount</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 


$sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["product_id"];
      $product_name = $row["product_name"];
      $product_features = $row["product_features"];
      $product_prize = $row["product_prize"];
      $product_image = $row["product_image"];
      $product_date = $row["product_date"];
  
?>

                                        <tr>
                                            <td><img src="../img/<?php echo $product_image; ?>" width="100" style="height:50px; margin-top:-2px;"></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $product_features; ?></td>
                                            <td>$<?php echo $product_prize; ?>.00</td>
                                            <td><?php echo $product_date; ?></td>
                                        </tr>

                                        <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
                                      
                                    </tbody>
                                </table>
                                <a class="float-right" href="all.php">view all</a>
                            </div>
                            
                        </div>

                    </div>



                    <div class="col-lg-6 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Custom Made Products (Limit 2)</strong></h2>
                                <div class="panel-actions">
                                    <!-- <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a> -->
                                   
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Customer name</th>
                                            <th>Type</th>
                                            <th>cutom features</th>
                                            <th>date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

$sql = "SELECT * FROM custom_made JOIN customers ON custom_made.customer_id = customers.customer_id ORDER BY custom_id DESC LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $custom_id = $row["custom_id"];
      $customer_name = $row["customer_name"];
      $cloth_type = $row["cloth_type"];
      $custom_size = $row["custom_size"];
      $custom_image = $row["custom_image"];
      $worst = $row["worst"];
      $custom_features = $row["custom_features"];
      $height = $row["height"];
      $breast = $row["breast"];
      $custom_date = $row["custom_date"];
      $custom_status = $row["custom_status"];
  
?>

                                        <tr>
                                            <td><img src="../img/custom/<?php echo $custom_image; ?>" width="100" style="height:50px; margin-top:-2px;"></td>
                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $cloth_type; ?></td>
                                            <td><?php echo $custom_features; ?></td>
                                            <td><?php echo $custom_date; ?></td>
                                            <td><?php echo $custom_status; ?></td>
                                            <td> <a href="view.php?view=<?php echo $custom_id ?>" class="btn btn-info">open</a> </td>
                                        </tr>

                                        <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
                                      
                                    </tbody>
                                </table>
                                <a class="float-right" href="custom_order.php">view all</a>                       
                            </div>
                            
                        </div>

                    </div>


                    <div class="col-lg-9 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Customer reviews (Limit 5)</strong></h2>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Type</th>
                                            <th>Features</th>
                                            <th>Comment</th>
                                            <th>Cutomer Name</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 


$sql = "SELECT * FROM reviews 
    JOIN custom_made on reviews.custom_id = custom_made.custom_id
    JOIN customers On reviews.customer_id = customers.customer_id
      ORDER BY review_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $review_id = $row["review_id"];
      $cutom_id = $row["cutom_id"];
      $customer_name = $row["customer_name"];
      $custom_features = $row["custom_features"];
      $cloth_type = $row["cloth_type"];
      $review_text = $row["review_text"];

      $review_image = $row["review_image"];
    //   $product_date = $row["product_date"];
  
?>
                                        <tr>
                                            <td><img src="../img/<?php echo $review_image; ?>" width="100" height="50" alt=""></td>
                                            <td><?php echo $cloth_type?></td>
                                            <td><?php echo $custom_features; ?></td>
                                            <td><?php echo $review_text; ?></td>
                                            <td><?php echo $customer_name; ?></td>
                                        </tr>

                                        <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                    </div>








                    <div class="col-lg-9 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Orders (Limit 4)</strong></h2>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th>Order#</th>
                                            <th>Custmer Names</th>
                                            <th>Custmer Email</th>
                                            <th>Customer Phones</th>
                                            <th>Product #</th>
                                            <th>Quantity</th>
                                            <th>Orderdate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

$sql = "SELECT * FROM orders JOIN carts On orders.cart_number = carts.cart_number Limit 4";

// $sql = "SELECT * FROM  ORDER BY product_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $order_id = $row["order_id"];
      $product_id = $row["product_id"];
      $qnty = $row["qnty"];
      $prefer = $row["prefer"];
      $first_name = $row["first_name"];
      $last_name = $row["last_name"];
      $customer_email = $row["customer_email"];
      $phone_number = $row["phone_number"];
      $order_date = $row["order_date"];
?>

                                        <tr>
                                            <td><?php echo $order_id; ?></td>
                                            <td><?php echo $first_name .''. $last_name; ?></td>
                                            <td><?php echo $customer_email; ?></td>
                                            <td><?php echo $phone_number; ?></td>
                                            <td>JCM00<?php echo $product_id; ?></td>
                                            <td><?php echo $qnty; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                        </tr>

                                        <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>
                                      
                                    </tbody>
                                </table>
                                <a class="float-right" href="orders.php">view all</a> 
                            </div>
                            
                        </div>

                    </div>











                </div>


            </section>

        </section>
        <!--main content end-->
    </section>





    <!-- container section start -->

    <?php include('includes/footer.php') ?>