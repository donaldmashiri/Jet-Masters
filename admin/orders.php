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

                    <div class="col-lg-9 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Orders</strong></h2>
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

$sql = "SELECT * FROM orders JOIN carts On orders.cart_number = carts.cart_number";

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
                              
                            </div>
                            
                        </div>

                    </div>
                    <!--/col-->

                    


                </div>



            </section>

        </section>
        <!--main content end-->
    </section>
    <!-- container section start -->

    <?php include('includes/footer.php') ?>