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

                <?php 

$view = $_GET['view'];

$sql = "SELECT * FROM custom_made JOIN customers ON custom_made.customer_id = customers.customer_id WHERE custom_id = $view";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$custom_id = $row["custom_id"];
$customer_name = $row["customer_name"];
$customer_email = $row["customer_email"];
$customer_phone = $row["customer_phone"];

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


                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Custom Made Products</strong></h2>
                                <div class="panel-actions">
                                    <!-- <a href="#" class="btn-setting"><i class="fa fa-rotate-right"></i></a> -->
                                   
                                </div>
                            </div>
                            <div class="panel-body">

                            <div class="row text-center">
                                <div class="col-md-4">
                                    <h4>Name : <?php echo $customer_name ?></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Email : <?php echo $customer_email ?></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Phone : +263<?php echo $customer_phone ?></h4>

<form class="form-inline" action="" method="post">
    <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="refno" class="form-control" id="payment" placeholder="Ref# of payment" minLength="4" required>
    </div>
    <button type="submit" name="payment" class="btn btn-secondary mb-2">Enter</button>
</form>


<?php 
if(isset($_POST['payment'])){
    
    $refno = $_POST['refno'];
    $query = "UPDATE custom_made SET ";
    $query .= "payment  = '{$refno}' ";
    $query .= "WHERE custom_id = $view ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$view );

    // echo "<p class='alert alert-success'>Your Location has been updated</p>";
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }


}

?>

                                </div>
                                <hr>

                                <?php
                                if(isset($_POST['send'])){

                                    $message = $_POST['message'];
                                    $title = $_POST['title'];

                                    
                                
// include phpmailer files
require 'phpmailer/PHPMailerAutoload.php';


$mail= new PHPMailer();
//define smtp host
$mail->Host= "smtp.gmail.com";
//set port to connect smtp
$mail->Port="587";
//enable smtp aunthentication
$mail->SMTPAuth=true;
//set type of smtp encription
$mail->SMTPSecure ="tls";

//set mailer to use smtp
$mail->isSMTP();


// Jet Zimabwe Costume Masters
// jetzimabwe.costumemasters@gmail.com


//set gmail user
$mail->Username ="jetzimabwe.costumemasters@gmail.com";
// set gamil password
$mail->Password = "0783476199";
//set email subject
$mail->Subject ="$title";
//set sender mail
$mail->setFrom("jetzimabwe.costumemasters@gmail.com");
$mail->isHTML(true);
//set mail body
$mail->Body = "$message";
//add recipient
$mail->addAddress("$customer_email");
//finally sent asn email
$mail->Send();

echo "<p class='alert alert-success'>Email has been sent</p>";

                                }

                                ?>
                                
                            </div>
<hr>
                                <table class="table bootstrap-datatable countries">
                                    <thead>
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
                            <th scope="col">Location</th> 
                            <th scope="col">Payment#</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">JCM00<?php echo $custom_id; ?></th>
                                        <td> <img src="../img/custom/<?php echo $custom_image ?>" width="100" height="50" alt="" srcset=""> </td>
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
                                            <a href="view.php?approve=<?php echo $custom_id ?>" class="btn btn-success">Approve</a>
                                            <a href="view.php?decline=<?php echo $custom_id ?>" class="btn btn-danger">Decline</a>
                                        </td>  
                                        <td><?php echo $location; ?></td>
                                        <td><?php echo $payment; ?></td>

<?php
    if (isset($_GET['approve'])) {
    
    $approve_id = $_GET['approve'];
    $query = "UPDATE custom_made SET ";
    $query .= "custom_status  = 'approved' ";
    $query .= "WHERE custom_id = $approve_id ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$approve_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


if (isset($_GET['decline'])) {
    
    $decline_id = $_GET['decline'];
    $query = "UPDATE custom_made SET ";
    $query .= "custom_status  = 'declined' ";
    $query .= "WHERE custom_id = $decline_id ";
 
    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$decline_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

?>

                                        </tr> 
                                                                      
                                    </tbody>
                                </table>

                                <hr>


                            <div class="text-center">
                                <a href="#" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-envelope"></i> Send Email</a>
                                <a href="https://wa.me/263779916688?text=<?php echo "We are creating your product" ?>" target="_blank" class="btn btn-success m-3"> <i class="fa fa-wechat">
                                </i>WhatApp</a>

                                   


                            </div>
     
                            </div>
                            
                        </div>

                    </div>
                    <!--/col-->
                    

                </div>

            </section>

        </section>
        <!--main content end-->
    </section>


<!-- Email -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send an Email to: <?php echo $customer_name; ?></h5>
   
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      <form action="" method="post">
            <select class="form-control" name="title" id="">
                <option value="ready for collection">Ready For collection</option>
                <option value="Rejected">Rejected</option>
                <option value="Accepted">Accepted</option>
            </select>
        </div>
        <div class="form-group">
            <textarea name="message" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="send" type="submit" class="btn btn-primary">Send mail</button>
      </div>
      </form>

    </div>
  </div>
</div>









    <!-- container section start -->

    <?php include('includes/footer.php') ?>