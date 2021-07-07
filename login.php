<?php include('includes/header.php') ?>
    <!-- Page Add Section Begin -->

    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section mt-5">
        <div class="container">
        <h2 class="mb-4">Create Account</h2>

        <?php
                      if(isset($_POST['signup'])){

                      $customer_name = $_POST['customer_name'];
                      $customer_email = $_POST['customer_email'];
                      $customer_password = $_POST['customer_password'];
                      $con_password = $_POST['con_password'];
                      $customer_phone = $_POST['customer_phone'];                      
                     
                        if($customer_password === $con_password){
                            $sql = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_phone)
                            VALUES ('{$customer_name}', '{$customer_email}', '{$customer_password}','{$customer_phone}')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='alert alert-success text-center'>Account successfully created Please login</p>";
                              } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              } 
                        }else{
                            echo "<p class='alert alert-danger text-center'>Passoword didnt match</p>";
                        }

                      
                      
                    }
        ?>


            <div class="row">
                <div class="col-lg-7">
                <hr>
                    <form action="" method="POST" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="customer_name" class="form-control" placeholder="Full Names"
                                onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" minLength="4" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="customer_email" class="form-control" placeholder="E-mail"  minLength="4" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="number" name="customer_phone" class="form-control" placeholder="Phone-number" min="01000000" maxLength="12"  minLength="4" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="password" name="customer_password" class="form-control" placeholder="Password"  minLength="4" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="password" name="con_password" class="form-control" placeholder="Confirm Password"  minLength="4" required>
                            </div>
                         
                            
                            <div class="col-lg-12 text-right">
                                <button name="signup" type="submit">Signup</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="card">
                            <div class="card-header">Login</div>
                                <div class="card-body">

                                <?php 
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from customers where customer_email = '$email' and customer_password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['customer_id'] = $row['customer_id'];
          header("Location: customer_order.php" );
                           echo   $_SESSION['customer_id'];
    } else {
        echo "<a class='bg-light nav-link text-danger'>Invalid email and password</a>";
    }

}
?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email"  minLength="4" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password"  minLength="4" required>
                                    </div>
                                    
                                    <div class="form-group">
                                       <Button name="login" type="submit" class="btn btn-outline-info float-right">Login</Button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>