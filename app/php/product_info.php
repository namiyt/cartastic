<?php
require 'database.php';
$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";

$product_page = substr($url,54,55);
if (strlen($url) == 60) {
    $product_page = (int)$product_page[0];
} else {
    $product_page = (int)$product_page[0].$product_page[1];
}

$stmt = $conn->query("select * from product where id = '$product_page'");
$p_spec = $conn->query("select * from specs where p_id = '$product_page'");
$info = $stmt->fetch(PDO::FETCH_ASSOC);
$spec = $p_spec->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $info['name']; ?></title>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animsition.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
                <h3>LOGO</h3>
            </div>
            <ul class="navbar">
                <li><a class="animsition-link" href="../index.html">HOME</a></li>
                <li class="active"><a href="../products.html">PRODUCTS</a></li>
                <li><a class="animsition-link" href="../about.html">ABOUT US</a></li>
            </ul>
        </div>
        <div class="header-content">
            <div class="header-content-inner">
                <div class="product-image-container">
                    <?php echo "<img src='/img/product-".$info['id']."/main-".$info['id'].".jpg'>" ?>
                </div>
                <div class="product-header-text">
                    <h1><?php echo $info['name'] ?></h1>
                    <h3><?php echo $spec['info'] ?></h3>
                    <p><?php echo $info['price'] ?></p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="section-content">
            <div class="section-content-inner">
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<img class='slide' src='../img/product-".$info['id']."/image (".$i.").jpg'>";
                }
                ?>
            </div>
        </div>
        <div class="specs">
            <table>
                <tr>
                    <th>Specifications</th>
                </tr>
                <tr>
                    <td>Seating</td>
                    <td><?php echo $spec['seating']?></td>
                </tr>
                <tr>
                    <td>City Mpg.</td>
                    <td><?php echo $spec['cm']?></td>
                </tr>
                <tr>
                    <td>Highway Mpg.</td>
                    <td><?php echo $spec['hm']?></td>
                </tr>
                <tr>
                    <td>Fuel Capacity</td>
                    <td><?php echo $spec['fc']?></td>
                </tr>
                <tr>
                    <td>Front Brakes</td>
                    <td><?php echo $spec['fb']?></td>
                </tr>
                <tr>
                    <td>Rear Brakes</td>
                    <td><?php echo $spec['rb']?></td>
                </tr>
                <tr>
                    <td>Driver Side Airbag</td>
                    <td><?php echo $spec['driver_ab']?></td>
                </tr>
                <tr>
                    <td>Passenger Side Airbag</td>
                    <td><?php echo $spec['passenger_ab']?></td>
                </tr>
            </table>
        </div>
    </section>

    <!-- SCRIPT LINKS -->
    <script src="../js/script.js"></script>
    <script src="../js/validate.js"></script>

</body>
</html>