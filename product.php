<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Plastics
    </h2>
</section>

<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">Featured Products</h3>
        </div>
        <!-- Page Content -->
        <div class="container">
            <div class="row text-center text-lg-start">
                <?php
                include "connect.php";
                $stmt =  $conn->prepare("SELECT * FROM product");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<div class=col-lg-3 col-md-4 col-6>" .
                        "<a href=# class=d-block mb-4 h-100>" .
                        "<img class=img-fluid img-thumbnail src=images/products/" . $row["product_image"] . ">" .
                        "</a>" .
                        "<p style=color:white>" . $row["product_id"] . "</p>" .
                        "<p style=color:white>" . $_SESSION["user_email"] . "</p>" .
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
        // $(this).html("Please wait....");
        // $(this).prop('disabled', true);
        pid = $(this).closest("div").find("p:eq(0)").html();
        user_email = $(this).closest("div").find("p:eq(1)").html();
        //alert(pid + user_email);
        $.post("Service/add_to_cart_process.php", {
                product_id: pid,
                user_email: user_email

            },
            function(data, status) {
                $(this).html("Buy");
                $(this).prop('disabled', false);
                alert(data);
                //window.location.replace("cart.php");
            }, 'text');
    });
</script>