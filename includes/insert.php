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