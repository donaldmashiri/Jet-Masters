<?php include('includes/header.php') ;
if (empty($_SESSION['customer_id'])){

    header("Location:login.php");

}

?>
    <!-- Page Add Section Begin -->

    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section mt-5">
        <div class="container">
        <h2 class="mb-4">Request Custom Made Cloth</h2>

        <?php

if(isset($_POST['submit'])){

    $custom_size = $_POST['custom_size'];
    $cloth_type = $_POST['cloth_type'];
    $worst = $_POST['worst'];
    $height = $_POST['height'];
    $breast = $_POST['breast'];
    $custom_features = $_POST['custom_features'];


    $custom_image = $_FILES['image']['name'];
    $custom_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($custom_image_temp, "img/custom/$custom_image");


    $sql = "INSERT INTO custom_made (customer_id, custom_size, cloth_type, worst, height, breast, custom_image, custom_features, custom_date)
    VALUES ('{$_SESSION['customer_id']}','{$custom_size}', '{$cloth_type}', '{$worst}','{$height}', '{$breast}', '{$custom_image}', '{$custom_features}', now())";
    
    if ($conn->query($sql) === TRUE) {
      echo "<p class='alert alert-success text-center'>Your Product request was successfully</p>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
    
  }
              
        ?>

            <div class="row">
                <div class="col-lg-8">
                <form action="" method="post" enctype="multipart/form-data">
                <hr>
                <div class="row">
                    <?php

$cloth = $_GET['cloth'];
if(isset($_GET['cloth'])){
    if($cloth = "dress"){
        include_once('selected/trouse.php');
    }
}
    


// if ($_SESSION["cloth"] === "dress"){
//     include_once('selected/trouse.php');
//    }elseif ($_SESSION["plaza"] === "trouse"){
//     include_once('selected/trouse.php');
//    }

// // if(isset($_POST['construction'])){
// //     $_SESSION["plaza"] = "construction";
// //     $_SESSION["bb"] = "<b style='color:maroon;'>ConstructionPlaza</b>";
// //     include_once('selected_plaza.php');
// // //    }


//                     if(isset($_POST['dress'])){
//                         $_SESSION["cloth"] = "dress";
//                         $_SESSION["bb"] = "<b style='color:maroon;'>Cloth for Dress</b>";
//                         echo $_SESSION["bb"];  
//                     }
//                     if(isset($_POST['trouse'])){
//                         $_SESSION["cloth"] = "dress";
//                         $_SESSION["bb"] = "<b style='color:maroon;'>Cloth for Trouse</b>";
//                         echo $_SESSION["bb"];
//                     }
                    ?>
                </div>
                                   
                </div>

                <div class="col-4 text-center">
                    <div class="card">
                        <div class="card-header">Select Cloth Type</div>
                        <form action="" method="post">
                        <div class="card-body">
                              <div class="col-md-12">
                              <a href="cloth.php?=dress" name="dress" class="btn btn-danger btn-sm btn-block">Dress</a>
                              </div>
                        <hr>
                             <div class="col-md-12">
                              <button name="trouse" class="btn btn-secondary btn-sm btn-block">Trouse</button>
                              </div>
                              <hr>
                              <div class="col-md-12">
                              <button name="short" class="btn btn-warning btn-sm btn-block">Short</button>
                              </div>
                              <hr>
                              <div class="col-md-12">
                              <button name="shirt" class="btn btn-light btn-sm btn-block">Shirt</button>
                              </div>
                              <hr>
                              <div class="col-md-12">
                              <button name="suit" class="btn btn-dark btn-sm btn-block">Suit</button>
                              </div>
                        </div>
                        </form>
                    </div>
                </div>

                </form>
            </div>


               

            
        </div>
    </div>
    <!-- Contact Section End -->

   <?php include('includes/footer.php'); ?>