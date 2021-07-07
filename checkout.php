<?php include('includes/header.php'); ?>
<!-- Header Info End -->
<!-- Header End -->




<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Checkout<span>.</span></h2>
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
   
    <div class="shopping-method">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shipping-info">
                        <!-- <h5>Choose a shipping</h5> -->
                        <div class="chose-shipping">
                            <div class="cs-item">
                                        Choose a shipping :
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="two">
                                <label for="two">
                                        Home delievery - $1 on arrival
                                      
                                    </label>
                            </div>
                            <div class="cs-item last">
                                <input type="radio" name="cs" id="three">
                                <label for="three">
                                        In Store Pickup - Free
                                    </label>
                            </div>
                        </div>
                    </div>
                    <div class="total-info">
                        <div class="total-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Product Prize</th>
                                        <th>Quantity</th>
                                
                                        <th class="total-cart">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 


$sql = "SELECT  *  FROM products JOIN carts ON products.product_id = carts.product_id
        WHERE cart_number = '{$_SESSION['cart_number']}' ORDER BY cart_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $product_id = $row["product_id"];
      $product_name = $row["product_name"];
      $qnty = $row["qnty"];
      $product_prize = $row["product_prize"];
      $product_image = $row["product_image"];
    //   $product_date = $row["product_date"];
  
?>
                                    <tr>
                                    <td class="total">
                                    <img src="img/<?php echo $product_image ?>" width="200" height="100" alt="" srcset="">
                                    </td>
                                        <td class="total"><?php echo $product_name ?></td>
                                      
                                    
                                        <td class="sub-total">$<?php echo $product_prize ?>.00</td>
                                        <td class="shipping">x<?php echo $qnty ?></td>
                                        <td class="total-cart-p">$<?php echo $product_prize * $qnty ?>.00</td>
                                    </tr>
                                    <?php }
                            } else {
                              echo "0 results";
                            }
                           ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                            <h3>Total Amount to be paid : <b><Strong>
                            <?php
$sql = "SELECT sum(qnty * product_prize) As OrderTotal  FROM products JOIN carts ON products.product_id = carts.product_id
WHERE cart_number = '{$_SESSION['cart_number']}' ORDER BY cart_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //   $product_id = $row["product_id"];
    $OrderTotal = $row['OrderTotal'];
    echo "$$OrderTotal.00";
}
}
?>
                           </Strong></b> </h3>
                                <!-- <a href="print.php" class="btn btn-info">Print Invoive</a> -->
                                <a href="order.php" class="primary-btn chechout-btn">Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page Section End -->


<?php include('includes/footer.php'); ?>