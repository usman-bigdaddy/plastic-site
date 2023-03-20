<?php include 'nav.php' ?>
<?php
include "../connect.php";
$company_name = "";
$stmt =  $conn->prepare(strtolower("SELECT * FROM company where company_email='$_GET[q]'"));
$stmt->execute();
$result = $stmt->get_result();
$value = $result->fetch_object();
$company_name = $value->company_name;
$stmt->close();
?>
<div class="container" style="margin-top:2%">
    <h3>Plastic Products owned by <?php echo $company_name ?></h3>
    <div class="container">
        <div class="row text-center text-lg-start">
            <?php
            $stmt =  $conn->prepare("SELECT * FROM product where company_email='$_GET[q]' ");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<div class=col-lg-3 col-md-4 col-6>" .
                    "<a href=# class=d-block mb-4 h-100>" .
                    "<a href=../images/products/" . $row["product_image"] . "><img class=img-fluid img-thumbnail src=../images/products/" . $row["product_image"] . "></a>" .
                    "</a>" .
                    "<p style=color:white>" . $row["product_id"] . "</p>" .
                    "<p>" . $row["product_name"] . "<br/>N " . $row["price"] . "</p>" .
                    "</div>";
            }
            $stmt->close();
            $conn->close();
            ?>

        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>