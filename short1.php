<?php include('includes/header.php') ;
if (empty($_SESSION['customer_id'])){

    header("Location:login.php");

}

?>

    <div class="contact-section mt-5">
        <div class="container">
        <h2 class="mb-4">Request Custom Made Cloth</h2>

        <?php
    include('includes/insert.php');
              
        ?>

            <div class="row">
                <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data">
                <hr>
                <div class="row">
                  
                <?php   include('selected/short.php'); ?>

                </div>
                                   
                </div>

                <div class="col-4 text-center">
                    <div class="card">
                        <div class="card-header">Select Cloth Type</div>
                        <form action="" method="post">
                            <?php   include('includes/btn.php'); ?>
                        </form>
                    </div>
                </div>

                </form>
            </div>

        </div>
    </div>
    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>