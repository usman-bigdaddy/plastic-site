<html>

<head>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <?php include 'nav.php' ?>
    <?php

    ?>
    <div class="container" style="margin-top:2%"> <!-- Button trigger modal -->
        <br />
        <h3>List of Orders</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../connect.php";
                $stmt =  $conn->prepare("SELECT * FROM productrequest join product on product.product_id = productrequest.product_id where company_email=? AND status_!=?");
                $stmt->bind_param("ss", $company_email, $stat);
                $company_email = $_SESSION['company_email'];
                $stat = "Cart";
                $count = 1;
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo
                    "<tr>" .
                        "<td>" . $count++ . "</td>" .
                        "<td>" . $row['customer_email'] . "</td>" .
                        "<td>" . $row['product_name'] . "</td>" .
                        "<td>" . $row['price'] . "</td>" .
                        "<td>" . $row['Quantity'] . "</td>" .
                        "<td>" . $row['price'] * $row['Quantity'] . "</td>" .
                        "<td><img style=width:40px;height:40px src=../images/products/" . $row['product_image'] . "></td>" .
                        "<td><button type=button class='btn btn-primary'>...</button></td>" .
                        "</tr>";
                }
                $stmt->close();
                $conn->close();

                ?>

            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>