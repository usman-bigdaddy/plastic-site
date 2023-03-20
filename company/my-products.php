<?php include 'nav.php' ?>

<?php

function upload_image()
{
    $target_dir = "../images/products/";
    $extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randValue = substr(str_shuffle($permitted_chars), 0, 10);
    $target_file = $target_dir . $randValue . "." . $extension;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $name_to_upload = $randValue . "." . $extension;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo $extension."   ".$randValue."}".$randValue;
            return $name_to_upload;
        } else {
            return "";
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../connect.php';
    if (isset($_POST["add_product_button"])) {
        $product_image = upload_image();
        if ($product_image != "") {
            $stmt =  $conn->prepare("INSERT INTO product
             (product_name,product_description,price,product_image,company_email)
             VALUES (?, ?, ?, ?, ?)");
            $name = $_POST["name"];
            $Description = $_POST["Description"];
            $price = $_POST["price"];
            $company_email =  $_SESSION['company_email'];
            $stmt->bind_param("sssss", $name, $Description, $price, $product_image, $company_email);
            $stmt->execute();
            $count = $stmt->affected_rows;
            $stmt->close();
            $conn->close();
            if ($count > 0) {
                echo "<script type='text/javascript'>alert('Success');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Error!');</script>";
            }
        }
    }
}
?>


<div class="container" style="margin-top:2%">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Product
    </button><br />
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a Plastic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" required name="name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price</label>
                        <input type="number" required name="price" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea required name="Description" class="form-control">
                            </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input accept="image/jpg, image/jpeg, image/png" type="file" required name="fileToUpload" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button name="add_product_button" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>