<?php include('includes/header.php'); ?>
<!-- Header Info End -->
<!-- Header End -->




<?php 

$id = $_GET['check'];

$sql = "SELECT * FROM products WHERE product_id = 6";
$result = $conn->query($sql);


  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["product_id"];
      $product_name = $row["product_name"];
      $product_features = $row["product_features"];
      $product_prize = $row["product_prize"];
      $product_image = $row["product_image"];
      $product_date = $row["product_date"];
  
  }

?>


<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Reviews<span>.</span></h2>
                </div>
            </div>
            <!-- <div class="col-lg-8">
                <img src="img/add.jpg" alt="">
            </div> -->
        </div>
    </div>
</section>
<!-- Page Add Section End -->

<!-- Cart Page Section Begin -->
<div class="cart-page">
    <div class="container">
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th class="product-h">Product</th>
                        <th class="quan">Comment</th>
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
                        <td class="product-col">
                            <img src="img/<?php echo $review_image; ?>" width="158" height="111" alt="">
                        </td>
                        <td class="text-info">
                             <div class="cart-btn">
                                <div class="coupon-input">
                                <strong><?php echo $review_text; ?></strong>
                                </div>
                            </div>
                        </td>
                        <td class="text-info">
                            <div class="cart-btn">
                                <div class="coupon-input">
                                <strong><?php echo $customer_name; ?></strong>
                                </div>
                            </div>
                        </td>
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
<!-- Cart Page Section End -->


<?php include('includes/footer.php'); ?>