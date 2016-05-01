<?php
    require 'database.php';
    try {
        $stmt = $conn->query("SELECT * from product");
        $stmt->SetFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            if (($row['id'] - 1) % 3 == 0) {
                if (($row['id'] - 1) != 0) {
                    echo "</tr>";
                }
                echo "<tr>";
            }
            echo "<td><div class=\"grid-box-content\">
                <a href='/products/product-".$row['id'].".html'>
                <div class='product-box-overlay'>
                    GO TO PRODUCT
                </div>
                </a>
                <img src='/img/product-".$row['id']."/main-".$row['id'].".jpg'>
                <div class='product-title'>
                    ".$row['name']."
                </div>
                <div class='product-brand'>
                    ".$row['type']."
                </div>
                <div class='product-price'>
                    ".$row['price']."
                </div>
                </div></td>";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

