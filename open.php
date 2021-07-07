<?php include('includes/header.php') ?>
    <!-- Page Add Section Begin -->

    <!-- Page Add Section End -->
    <?php 

$open = $_GET['open'];


$sql = "SELECT * FROM custom_made WHERE custom_id = $open";
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
$location = $row["location"];
$payment = $row["payment"];


}
} else {
echo "0 results";
}

?>




    <!-- Contact Section Begin -->
    <div class="contact-section mt-5">
        <div class="container-fluid ml-5 mr-5">
        <h2 class="mb-4">You custom made order</h2>
        <a href="custom_print.php?custom_print=<?php echo $open ?>" class="btn btn-secondary">Print</a>


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
                        <th scope="col">Location</th> 
                        <th scope="col">Payment#</th>                       
                        </tr>
                    </thead>
                    <tbody>
                   
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
                            <td><?php echo $location; ?></td>
                            <td><?php echo $payment; ?></td>  

                        </tr>
                    
                    </tbody>
                    </table>
            </div>
        </div>
    </div>

<hr>
<section class="">
    <div class="container  text-center">

<?php

if(isset($_POST['review'])){
  
    $review_text = $_POST['review_text'];
    $review_image = $_FILES['image']['name'];
    $review_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($review_image_temp, "img/$review_image");

    $sql = "INSERT INTO reviews (custom_id, customer_id, review_text, review_image, review_date)
    VALUES ({$custom_id},'{$_SESSION['customer_id']}', '{$review_text}', '{$review_image}', now())";

    if ($conn->query($sql) === TRUE) {
    echo "<p class='alert alert-success text-center'>Review Successfully Submitted</p>";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if(isset($_POST['submit'])){
  
  $location = $_POST['location'];
 
  // $refno = $_POST['refno'];
    $query = "UPDATE custom_made SET ";
    $query .= "location  = '{$location}' ";
    $query .= "WHERE custom_id = $open ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: open.php?open=".$open );

    echo "<p class='alert alert-success'>Your Location has been updated</p>";
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

?>


        <div class="row">
            <div class="col-md-4">
            <?php 
if($custom_status === 'approved' && $payment !== 'not paid'){
    echo "<button type='button' class='btn btn-outline-primary' data-toggle='modal' data-target='#review'>
    Product Review
    </button>";

}else{
    echo "<p class='text-info'>Review is send if the product is approved</p>";
}


?>


                 
            </div>
            <div class="col-md-4">

 <?php 
if($custom_status === 'approved'){
    echo "<button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#exampleModal'>
    Select Location for Pickup
   </button>";

}else{
    echo "<p class='text-danger'>Location is selected if product is approved</p>";
}

?>


                
            </div>
            <div class="col-md-4">
<?php 
if($custom_status === 'approved' && $payment === 'not paid'){

  echo "<a href='https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWRvbmFsZHRvbmRlbWFzaGlyaSU0MGdtYWlsLmNvbSZhbW91bnQ9MC41MCZyZWZlcmVuY2U9SkNNMTAwMSZsPTE%3d'
      target='_blank'><img src='https://www.paynow.co.zw/Content/Buttons/Medium_buttons/button_pay-now_medium.png' style='border:0' /></a>";

  // <a href='https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWRvbmFsZHRvbmRlbWFzaGlyaSU0MGdtYWlsLmNvbSZhbW91bnQ9MC41MCZyZWZlcmVuY2U9SkNNMTAwMSZsPTE%3d' target='_blank'><img src='https://www.paynow.co.zw/Content/Buttons/Medium_buttons/button_pay-now_medium.png' style='border:0' /></a>



}elseif($payment !== 'not paid'){
  echo "<p class='alert alert-success'>Your payment has been made</p>";
}

else{
    echo "<p class='text-warning'>You will pay when your order is approved</p>";
}


?>

    <!-- // echo "<a href='https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWpldHppbWFid2UuY29zdHVtZW1hc3RlcnMlNDBnbWFpbC5jb20mYW1vdW50PTEuMDAmcmVmZXJlbmNlPUpDTTI1Jmw9MQ%3d%3d'
    //  target='_blank'><img src='https://www.paynow.co.zw/Content/Buttons/Medium_buttons/button_pay-now_medium.png' style='border:0' /></a>"; -->

                    <!-- <a class=" float-right" href='https://www.paynow.co.zw/Payment/Link/?q=c2VhcmNoPWRvbmFsZHRvbmRlbWFzaGlyaSU0MGdtYWlsLmNvbSZhbW91bnQ9MS4wMCZyZWZlcmVuY2U9SW52b2ljZSszNSZsPTE%3d'
                         target='_blank'><img src='https://www.paynow.co.zw/Content/Buttons/Medium_buttons/button_pay-now_medium.png' style='border:0' /></a> -->
            </div>

        </div>






    </div>
</section>



<div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send a Review of Product</h5>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image" placeholder="Message">
        </div>
        <div class="form-group">
            <textarea name="review_text" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="review" type="submit" class="btn btn-info">Send review</button>
      </div>
      </form>

    </div>
  </div>
</div>













<!-- Location -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
      
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <select name="location" id="" class="form-group form-control">
            <option value="Harare">Harare</option>
            <option value="Gweru">Gweru</option>
            <option value="Chegutu">Chegutu</option>
            <option value="Kadoma">Kadoma</option>
            <option value="Kwekwe">Kwekwe</option>
            <option value="Bulawayo">Bulawayo</option>
            <option value="Hwange">Hwange</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>