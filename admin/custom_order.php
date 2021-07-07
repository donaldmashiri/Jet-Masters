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

                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Custom Made Products</strong></h2>
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

$sql = "SELECT * FROM custom_made JOIN customers ON custom_made.customer_id = customers.customer_id ORDER BY custom_id DESC LIMIT 5";
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