<?php include('includes/header.php'); ?>
<!-- Header Info End -->
<!-- Header End -->




<?php 

$id = $_GET['check'];

$sql = "SELECT * FROM products WHERE product_id = $id";
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


<?php 


if (isset($_POST['add_to_cart'])) {
    
    $qnty = $_POST['qnty'];
    $prefer = $_POST['prefer'];

    if (empty($_SESSION['cart_number'])){

        $cart_number = rand();

        $_SESSION['cart_number'] = $cart_number;

        $sql = "INSERT INTO carts(product_id, cart_number, qnty, prefer) ";
        $sql.= "VALUES($id,'{$_SESSION['cart_number']}','{$qnty}','{$prefer}')";
            
        if ($conn->query($sql) === TRUE) {
            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header("Location: checkout.php");
        
    }else{
        $sql = "INSERT INTO carts(product_id, cart_number, qnty, prefer) ";
        $sql.= "VALUES($id,'{$_SESSION['cart_number']}','{$qnty}','{$prefer}')";
            
        if ($conn->query($sql) === TRUE) {
            echo "<p class='alert alert-success text-center'>Your Product was successfully added</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          header("Location: checkout.php");
    } 
   }

?>



<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Cart<span>.</span></h2>
                    <a href="#">Home</a>
                    <a href="#">Dresses</a>
                    <a class="active" href="#"><?php echo $product_name; ?></a>
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
                        <th>Price</th>
                        <th class="quan">Quantity</th>
                        <th>Stock</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <form action="" method="post">
                    <tr>
                        <td class="product-col">
                            <img src="img/<?php echo $product_image; ?>" width="168" height="211" alt="">
                            <div class="p-title">
                                <h5><?php echo $product_name; ?></h5>
                            </div>
                        </td>
                        <td class="price-col">$<?php echo $product_prize; ?>.00</td>
                        <td class="quantity-col">
                            <div class="pro-qty">
                                <input type="text" name="qnty"  value="1" min="1">
                            </div>
                        </td>
                        <td class="text-info">Available In Stock</td>
                        <!-- <td class="product-close">x</td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cart-btn">
        <div class="row">
                <div class="col-lg-6">
                    <div class="coupon-input">
                        <strong>Product Features :</strong>
                        <small><?php echo $product_features; ?></small>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="coupon-input">
                        <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                        <input type="text" name="prefer" placeholder="What do u prefer?">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                   
                    <button name="add_to_cart" type="submit" class="site-btn update-btn">Add to Cart</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  
</div>
<!-- Cart Page Section End -->


<?php include('includes/footer.php'); ?>