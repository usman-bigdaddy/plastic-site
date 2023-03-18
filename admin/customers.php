<html>

<head>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="container" style="margin-top:2%">
        <h3>List of Customers</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Phone </th>
                    <th scope="col"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../connect.php";
                $stmt =  $conn->prepare("SELECT * FROM customer");
                $stmt->execute();
                $count = 1;
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo
                    "<tr>" .
                        "<td>" . $count++ . "</td>" .
                        "<td>" . $row['customer_name'] . "</td>" .
                        "<td>" . $row['customer_email'] . "</td>" .
                        "<td>" . $row['customer_phone'] . "</td>" .
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


<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>

<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>

</html>