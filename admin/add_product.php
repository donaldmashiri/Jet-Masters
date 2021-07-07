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
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add New Product
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " method="post" action="" enctype="multipart/form-data">
                      <?php

                      if(isset($_POST['submit'])){

                      $product_name = $_POST['product_name'];
                      $product_features = $_POST['product_features'];
                      $product_prize = $_POST['product_prize'];
                      $product_image = $_FILES['image']['name'];
                      $product_image_temp = $_FILES['image']['tmp_name'];

                      move_uploaded_file($product_image_temp, "../img/$product_image");
                  
                      $sql = "INSERT INTO products (product_name, product_features, product_prize, product_image, product_date)
                      VALUES ('{$product_name}', '{$product_features}', '{$product_prize}', '{$product_image}', now())";
                      
                      if ($conn->query($sql) === TRUE) {
                        echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                      
                      
                    }

                      ?>




                    <div class="form-group ">
                      <label for="product_name" class="control-label col-lg-2">Product Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="product_name" name="product_name" type="text" minLength="4" required/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="description" class="control-label col-lg-2">Product Features <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="description" name="product_features" type="text" minLength="4" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="price" class="control-label col-lg-2">Product Prize <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="price" name="product_prize" type="number" minLength="4" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="image" class="control-label col-lg-2">Upload Image <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="image" name="image" type="file" minLength="4" required />
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button name="submit" class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>



                <!-- statics end -->




                <!-- project team & activity start -->




            </section>

        </section>
        <!--main content end-->
    </section>
    <!-- container section start -->

    <?php include('includes/footer.php') ?>