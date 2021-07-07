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

                <!--/.row-->



                <!-- Today status end -->



                <div class="row">

                    <div class="col-lg-9 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>All Products</strong></h2>
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


$sql = "SELECT * FROM products ORDER BY product_id DESC";
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
                              
                            </div>
                            
                        </div>

                    </div>
                    <!--/col-->

                    


                </div>



                <!-- statics end -->




                <!-- project team & activity start -->




            </section>

        </section>
        <!--main content end-->
    </section>
    <!-- container section start -->

    <?php include('includes/footer.php') ?>