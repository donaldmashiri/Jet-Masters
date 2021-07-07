<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box blue-bg">
                            <i class="fa fa-home"></i>
                            <div class="count">
                            
<?php

$query = "SELECT count(product_id) As pdtc FROM products";
$select_count = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['pdtc'];

    echo $count;
    //  echo "<b class='badge badge-primary'>$count</b>";
}


?>
                            
                            
                            
                            </div>
                            <div class="title">Products</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="count">
<?php

$query = "SELECT count(custom_id) As customc FROM custom_made";
$select_count = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['customc'];

    echo $count;
    //  echo "<b class='badge badge-primary'>$count</b>";
}


?>
                            </div>
                            <div class="title">Custom Made Orders</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <i class="fa fa-thumbs-o-up"></i>
                            <div class="count">
                            
<?php

$query = "SELECT count(order_id) As orderc FROM orders";
$select_count = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['orderc'];

    echo $count;
    //  echo "<b class='badge badge-primary'>$count</b>";
}


?>
                            
                            </div>
                            <div class="title">Orders</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <i class="fa fa-cubes"></i>
                            <div class="count">
                            <?php

$query = "SELECT count(review_id) As reviewc FROM reviews";
$select_count = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_count)) {
    $count = $row['reviewc'];

    echo $count;
    //  echo "<b class='badge badge-primary'>$count</b>";
}


?>
                            </div>
                            <div class="title">Reviews Made</div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->