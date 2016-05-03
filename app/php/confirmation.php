<?php
require 'database.php';

$stat = $conn->query("select * from orders ORDER BY id DESC LIMIT 1");
$result = $stat->fetch(PDO::FETCH_ASSOC);
$prod = $conn->query("select * from product where id = '".$result['pid']."'");
$price = $prod->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                    <meta name="author" content="">

                        <title>Confirmation</title>

                        <!-- Custom CSS -->
                        <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <h3>LOGO</h3>
        </div>
        <ul class="navbar">
            <li><a href="index.html">HOME</a></li>
            <li><a href="products.html">PRODUCTS</a></li>
            <li><a href="about.html">ABOUT US</a></li>
        </ul>
    </div>
    <div class="content" style="margin: 0 auto;">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <h1>ORDER SUMMARY</h1>

                Order summary for: <?php echo $result['uname'] ?><br>

                Your phone: <?php echo $result['phone'] ?><br>

                Your email: <?php echo $result['email'] ?><br>

                Shipping to: <?php echo $result['shipto'] ?><br>

                City: <?php echo $result['city'] ?><br>

                State: <?php echo $result['state'] ?><br>

                Shipping Method: <?php echo $result['shipmethod'] ?><br>

                Zip Code: <?php echo $result['zipcode'] ?><br>

                Billing To: <?php echo $result['billto'] ?><br>

                Card Type:<?php echo $result['cardtype'] ?> <br>

                Credit Card ID: <?php echo $result['ccid'] ?><br>
            <h3>Product name: <?php echo $price['name'] ?></h3>
            <h2>Total Cost: $<?php echo $price['price'] ?> dollars</h2>
    </div>
</body>
</html>
