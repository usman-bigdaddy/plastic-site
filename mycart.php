<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    $stmt =  $conn->prepare("SELECT * FROM productrequest join product on product.product_id = productrequest.product_id where customer_email=? AND status_=?");
                    $stmt->bind_param("ss", $user_email, $stat);
                    $user_email = $_SESSION['user_email'];
                    $stat = "Cart";
                    $count = 1;
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo
                        "<tr>" .
                            "<td>" . $count++ . "</td>" .
                            "<td>" . $row['product_name'] . "</td>" .
                            "<td>" . $row['product_description'] . "</td>" .
                            "<td>" . $row['price'] . "</td>" .
                            "<td>" . $row['Quantity'] . "</td>" .
                            "<td>" . $row['price'] * $row['Quantity'] . "</td>" .
                            "<td><img style=width:40px;height:40px src=images/products/" . $row['product_image'] . "></td>" .
                            "<td><button type=button class='btn btn-success'>View</button></td>" .
                            "</tr>";
                    }
                    $stmt->close();
                    $conn->close();

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>