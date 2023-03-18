<html>

<head>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <?php include 'nav.php' ?>

    <div class="container" style="margin-top:2%"> <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Vendor
        </button><br /><br />
        <h3>List of Customers</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Phone</th>
                    <th scope="col"> Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../connect.php";
                $stmt =  $conn->prepare("SELECT * FROM company");
                $stmt->execute();
                $count = 1;
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo
                    "<tr>" .
                        "<td>" . $count++ . "</td>" .
                        "<td>" . $row['company_name'] . "</td>" .
                        "<td>" . $row['company_phone'] . "</td>" .
                        "<td>" . $row['company_email'] . "</td>" .
                        "<td>" . $row['address'] . "</td>" .
                        "<td><button type=button class='btn btn-success'>View</button></td>" .
                        "</tr>";
                }
                $stmt->close();
                $conn->close();

                ?>

            </tbody>
        </table>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>


<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>

<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>

</html>