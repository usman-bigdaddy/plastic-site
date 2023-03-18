<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Plastics
    </h2>
</section>
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="wrap-slick2">
            <div class="slick2">
                <?php
                include "connect.php";
                $stmt =  $conn->prepare("SELECT * FROM product");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<div class=item-slick2 p-l-15 p-r-15>" .
                        "<div class=block2>" .
                        "<div class=block2-img wrap-pic-w of-hidden pos-relative block2-labelnew>" .
                        "<img src=images/item-02.jpg alt=IMG-PRODUCT />" .
                        "<div class=block2-overlay trans-0-4>" .
                        #"<a href="# class=block2-btn-addwishlist hov-pointer trans-0-4">"
                        "<i class=icon-wishlist icon_heart_alt aria-hidden=true></i>" .
                        "<i class=icon-wishlist icon_heart dis-none aria-hidden=true></i>" .
                        "</a>" .
                        "<div class=block2-btn-addcart w-size1 trans-0-4>" .
                        "<button class=flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4>" .
                        "Add to Cart" .
                        "</button>" .
                        "</div>" .
                        "</div>" .
                        "</div>" .
                        "<div class=block2-txt p-t-20>" .
                        "<a href=product-detail.html class=block2-name dis-block s-text3 p-b-5>" .
                        $row['product_name'] .
                        "</a>" .
                        "<span class=block2-price m-text6 p-r-5>" . $row['price'] . "</span>" .
                        ".</div>" .
                        ".</div>" .
                        ".</div>";
                }
                $stmt->close();
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>