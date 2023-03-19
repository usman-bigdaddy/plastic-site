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
                        "<p>" . $row["product_name"] . "<br/>N " . $row["price"] . "</p>" .
                        "<a class='btn btn-primary' href=req?q=" . $row["product_id"] . ">Buy</a>" .
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