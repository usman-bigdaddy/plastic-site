<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Vendor's Products
    </h2>
</section>
<?php
include "connect.php";
$company_name = "";
$stmt =  $conn->prepare(strtolower("SELECT * FROM company where company_email='$_GET[q]'"));
$stmt->execute();
$result = $stmt->get_result();
$value = $result->fetch_object();
$company_name = $value->company_name;
$stmt->close();
?>
<section style="margin-top: 1%;">
    <div class="container" style="">
        <h3>Plastic Products owned by <?php echo $company_name ?></h3>
        <div class="container">
            <div class="row text-center text-lg-start">
                <?php
                $stmt =  $conn->prepare("SELECT * FROM product where company_email='$_GET[q]' ");
                $stmt->execute();
                $result = $stmt->get_result();
                $email = "";
                if (isset($_SESSION['user_email'])) {
                    $email = $_SESSION['user_email'];
                }
                while ($row = $result->fetch_assoc()) {
                    echo "<div class=col-lg-3 col-md-4 col-6>" .
                        "<a href=# class=d-block mb-4 h-100>" .
                        "<img style=width:120px;height:120px class=img-fluid img-thumbnail src=images/products/" . $row["product_image"] . ">" .
                        "</a>" .
                        "<p style=color:white>" . $row["product_id"] . "</p>" .
                        "<p style=color:white>" . $email . "</p>" .
                        "<p>" . $row["product_name"] . "<br/>N " . $row["price"] . "</p>" .
                        "<button id=buy_this_item_button class='btn btn-primary'>Buy</button>" .
                        "</div>";
                }
                $stmt->close();
                $conn->close();
                ?>

            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<script>
    $(document).on("click", "#buy_this_item_button", function() {
        pid = $(this).closest("div").find("p:eq(0)").html();
        user_email = $(this).closest("div").find("p:eq(1)").html();
        if (user_email === "") {
            alert("please login");
            return;
        }
        $.post("Service/add_to_cart_process.php", {
                product_id: pid,
                user_email: user_email

            },
            function(data, status) {
                alert(data);
                //window.location.replace("cart.php");
            }, 'text');
    });
</script>