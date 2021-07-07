<?php include('includes/header.php'); ?>
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Hero Slider Begin -->


    <!-- Features Section Begin -->

    <!-- Features Section End -->

    <!-- Latest Product Begin -->
    <section class="latest-products spad">
        <div class="container">
          
            <div class="row" id="product-list">
                 <!-- dress -->

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
               
                <div class="col-lg-3 col-sm-6 mix all accesories bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="cart.php?check=<?php echo $product_id ?>"><img src="img/<?php echo $product_image ?>" width="255" height="351" alt=""></a>
                            <div class="p-status sale">sale</div>
                        </figure>
                        <div class="product-text">
                            <h6><?php echo $product_name ?></h6>
                            <p>$<?php echo $product_prize ?>.00</p>
                        </div>
                    </div>
                </div>

                <?php }
                            } else {
                              echo "0 results";
                            }
                           ?>

            </div>
        </div>
    </section>
    <!-- Latest Product End -->
    <?php include('includes/footer.php'); ?>