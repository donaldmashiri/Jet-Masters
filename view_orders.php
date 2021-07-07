<?php include('includes/header.php') ?>
    <!-- Page Add Section Begin -->

    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section mt-5">
        <div class="container">
        <h2 class="mb-4">You custom made orders</h2>


            <div class="row">
                <div class="col-lg-12">
                <hr>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Order#</th>
                        <th scope="col">sample design</th>
                        <th scope="col">Type</th>
                        <th scope="col">Features</th>
                        <th scope="col">Worst (cm)</th>
                        <th scope="col">Height (cm)</th>
                        <th scope="col">Breast (cm)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>                       
                        </tr>
                    </thead>
                    <tbody>
                    <?php 


$sql = "SELECT * FROM custom_made WHERE customer_id = '{$_SESSION['customer_id']}' ORDER BY custom_id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $custom_id = $row["custom_id"];
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
                        <th scope="row">JCM00<?php echo $custom_id; ?></th>
                        <td> <img src="img/custom/<?php echo $custom_image ?>" width="100" height="50" alt="" srcset=""> </td>
                        <td><?php echo $cloth_type; ?></td>
                        <td><?php echo $custom_features; ?></td>
                        <td><?php echo $worst; ?></td>
                        <td><?php echo $height; ?></td>
                        <td><?php echo $breast; ?></td>
                        <td><?php echo $custom_date; ?></td>
                        <td><?php 
                        if($custom_status === 'pending'){
                            echo "<p class='text-warning'>$custom_status</p>";
                        }elseif($custom_status === 'declined'){
                            echo "<p class='text-danger'>$custom_status</p>";
                        }else{
                            echo "<p class='text-success'>$custom_status</p>";
                        }
                             ?></td>

                        <td>
                        <a href="open.php?open=<?php echo $custom_id ?>" class="btn btn-info">Open</a>
                        <!-- <form action="" method="post">
                            <button name="submit" type="submit" class="btn btn-primary">Pay</button>
                            </form> -->
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
    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>