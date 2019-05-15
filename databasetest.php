<?php 
    // IMPORT CONNECTION
    include("connection.php");

    $log = "";
    if(isset($_POST['item_submit'])) {
        $item_name = $_POST['item_name'];
        $item_quantity = $_POST['item_quantity'];
        $item_photo = $_FILES['item_photo']['name'];

        $sql = "INSERT INTO tbl_items (item_id, item_name, item_quantity, item_photo) VALUES (NULL, '$item_name', '$item_quantity', '$item_photo')";

        if($con->query($sql) === TRUE) {
            // IF THE QUERY EXECUTED SUCCESSFULLY THEN UPLOAD THE PHOTO
            if(move_uploaded_file($_FILES['item_photo']['tmp_name'], "images/uploads/".basename($item_photo))) {
                $log = "Uploaded";
            } else {
                $log = "PHOTO UPLOAD FAILED";
            }
        } else {
            $log = "Error: " . $con->error;
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Database Tests</title>
    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    <script src="./scripts/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <?php include("./components/header.php") ?>
    </div>

    <!-- NAVIGATION BAR -->
    <?php include("./components/navigation.php") ?>

    <div class="container mt-5">
        <!-- SECTIONS -->
        <h1>
            Database CRUD
        </h1>

        <div id="insert_item">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="item_name">Enter Item Name:</label>
                    <input id="item_name" class="form-control" type="text" name="item_name" placeholder="Enter item name">
                </div>

                <div class="form-group">
                    <label for="item_quantity">Enter Quantity:</label>
                    <input id="item_quantity" class="form-control" type="text" name="item_quantity" placeholder="Enter quantity">
                </div>

                <div class="form-group">
                    <label for="item_photo">Upload Photo:</label>
                    <input id="item_photo" type="file" name="item_photo" class="form-control-file border">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="item_submit" value="Submit">
                </div>
            </form>
        </div>

        <h3>
            Display Data
        </h3>

        <div id="item_display">
            <div>
                <div>
                    <img src="images/uploads/auto.png" style="width: 100px;height: 100px;">
                </div>

                <div>
                    Item Name
                </div>

                <div>
                    10
                </div>
            </div>
        </div>
    </div>
</body>
</html>