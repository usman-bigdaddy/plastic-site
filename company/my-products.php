<?php include 'nav.php' ?>
<div class="container" style="margin-top:2%">
    <h3>My Products</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col"> Name</th>
                <th scope="col"> Description</th>
                <th scope="col"> Price </th>
                <th scope="col"> Image </th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../connect.php";
            $stmt =  $conn->prepare("SELECT * FROM product where company_email=? ");
            $stmt->bind_param("s", $comapny_email);
            $comapny_email = $_SESSION['company_email'];
            $stmt->execute();
            $count = 1;
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo
                "<tr>" .
                    "<td>" . $count++ . "</td>" .
                    "<td>" . $row['product_name'] . "</td>" .
                    "<td>" . $row['product_description'] . "</td>" .
                    "<td>" . $row['price'] . "</td>" .
                    "<td><img style=width:40px;height:40px src=../images/products/" . $row['product_image'] . "></td>" .
                    "<td><button type=button class='btn btn-danger'>Delete</button></td>" .
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