<?php include 'header.php' ?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner-other-page.jpg);">
    <h2 class="l-text2 t-center">
        Vendors
    </h2>
</section>
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
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
                    include "connect.php";
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
    </div>
</section>

<?php include 'footer.php' ?>