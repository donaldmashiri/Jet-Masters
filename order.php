<?php include('includes/header.php') ?>
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-breadcrumb">
                        <h2>Customer details<span></span></h2>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section">
        <div class="container">

        <?php
                      if(isset($_POST['submit'])){

                      $first_name = $_POST['first_name'];
                      $last_name = $_POST['last_name'];
                      $customer_email = $_POST['customer_email'];
                      $customer_address = $_POST['customer_address'];
                      $phone_number = $_POST['phone_number'];
                     
                      $sql = "INSERT INTO orders (cart_number, first_name, last_name, customer_email, phone_number, customer_address, order_date)
                      VALUES ({$_SESSION['cart_number']}, '{$first_name}', '{$last_name}', '{$customer_email}','{$phone_number}', '{$customer_address}', now())";
                      
                      if ($conn->query($sql) === TRUE) {
                          header("Location: invoice.php" );
                        echo "<p class='alert alert-success text-center'>Your Products was successfully order</p>";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      } 
                    }
        ?>


            <div class="row">
                <div class="col-lg-8">
                    <form action="" method="POST" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" 
                                onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" minLength="4" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" minLength="4" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="customer_email" class="form-control" placeholder="E-mail" minLength="4" required>
                                <input type="number" name="phone_number" class="form-control" placeholder="Phone-number" min="01000000" maxLength="12"  minLength="4" required>
                                <textarea placeholder="Address" name="customer_address" class="form-control"></textarea>
                            </div>
                            
                            <div class="col-lg-12 text-right">
                                <button name="submit" type="submit">Procced to payment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="contact-widget">
                        <div class="cw-item">
                            <h5>Contact us on</h5>
                            <ul>
                            <li>+1 (603)535-4592</li>
                                <li>+1 (603)535-4556</li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>