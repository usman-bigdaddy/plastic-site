<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>
<?php
$msg = "";
$count = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    if (isset($_POST["check_out_button"])) {
        $stmt = $conn->prepare(strtolower("UPDATE productrequest SET delivery_address=?, status_ = ? where customer_email=? AND status_=?"));
        $stmt->bind_param('ssss', $address, $stat1, $user_email, $stat2);
        $stat1 = "Ordered";
        $stat2 = "Cart";
        $address = $_POST["address"];
        $user_email = $_SESSION['user_email'];
        $stmt->execute();
        $count = $stmt->affected_rows;
        $stmt->close();
        if ($count > 0) {
            echo "<script> location.href='my-orders.php'; </script>";
        } else {
            echo "Could not order";
        }
    }
    if (isset($_POST["clear_button"])) {
        $stmt = $conn->prepare(strtolower("DELETE FROM productrequest where customer_email=? AND status_=?"));
        $stmt->bind_param('ss', $user_email, $stat);
        $stat = "Cart";
        $user_email = $_SESSION['user_email'];
        $stmt->execute();
        $count = $stmt->affected_rows;
        $stmt->close();
        if ($count > 0) {
            echo "<script> location.href='mycart.php'; </script>";
        } else {
            echo "Error!";
        }
    }
}
?>
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
                            "<td>" .
                            "<button id=delete_this_item_button type=button class='btn btn-danger'>Delete</button>" .
                            "</td>" .
                            "</tr>";
                    }
                    $stmt->close();
                    $conn->close();

                    ?>

                </tbody>
            </table>
            <form <?php if ($count == 1) echo "style='display: none';" ?> method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <button name="clear_button" class='btn btn-primary'>Clear Cart</button><br /><br />
                <textarea required class="form-control" name="address">

                    </textarea><br />
                <small>We do not support online payment </small><br />
                <button name="check_out_button" class='btn btn-primary'>Checkout</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>

<script>
    $(document).on("click", "#delete_this_item_button", function() {
        pid = $(this).closest("div").find("p:eq(0)").html();
        user_email = $(this).closest("div").find("p:eq(1)").html();
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