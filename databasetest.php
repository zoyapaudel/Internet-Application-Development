<?php 
    // IMPORT CONNECTION
    include("connection.php");

    $log = "";

    // INSERT DATA
    if(isset($_POST['item_submit'])) {
        $item_name = $_POST['item_name'];
        $item_quantity = $_POST['item_quantity'];
        $item_photo = $_FILES['item_photo']['name'];

        $sql = "INSERT INTO tbl_items (item_id, item_name, item_quantity, item_photo) VALUES (NULL, '$item_name', '$item_quantity', '$item_photo')";

        if($con->query($sql) === TRUE) {
            // IF THE QUERY EXECUTED SUCCESSFULLY THEN UPLOAD THE PHOTO
            if(move_uploaded_file($_FILES['item_photo']['tmp_name'], "images/uploads/".basename($item_photo))) {
                $log = "Uploaded";

                header("Location: databasetest.php");
            } else {
                $log = "PHOTO UPLOAD FAILED";
            }
        } else {
            $log = "Error: " . $con->error;
        }
    }

    // UPDATE DATA
    if(isset($_POST['update_item'])) {
        $update_id = $_POST['update_id'];
        $update_name = $_POST['update_name'];
        $update_quantity = $_POST['update_quantity'];

        $sql = "UPDATE tbl_items SET item_name = '$update_name' , item_quantity = '$update_quantity' WHERE item_id = '$update_id'";
        if($con->query($sql) === TRUE) {
            $log = "UPDATED";
            header("Location: databasetest.php");
        } else {
            $log = "Update Failed";
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
    <link rel="stylesheet" href="./styles/styles.css">
    <script src="./scripts/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <?php include("./components/header.php") ?>
    </div>

    <!-- NAVIGATION BAR -->
    <?php include("./components/navigation.php") ?>

    <div>
        <?php 
            echo $log;
        ?>
    </div>

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
                All items are displayed below:
            </div>

            <!-- <div class="each_item">
                <div class="each_item_left">
                    <img src="images/uploads/auto.png" style="width: 100px;height: 100px;">
                </div>

                <div class="each_item_right">
                    <div class="each_item_right_name">
                        Product Name: Item Name
                    </div>

                    <div class="each_item_right_quantity">
                        Quantity: 10
                    </div>
                </div>
            </div> -->
            
            <?php 
                $sql = "SELECT * FROM tbl_items ORDER BY item_id DESC";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $item_quantity = $row['item_quantity'];
                        $item_photo = $row['item_photo'];

                        ?>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                <div class="each_item">
                                    <div class="each_item_left">
                                        <img src="images/uploads/<?php echo $item_photo; ?>" style="width: 100px;height: 100px;">
                                    </div>

                                    <div class="each_item_right">
                                        <div class="each_item_right_name">
                                            Product Name: 
                                            <?php
                                                if(@$_GET['edit'] == 'true' && @$_GET['id'] == $item_id) {
                                                    ?>  
                                                        <div class="form-group">
                                                            <input value="<?php echo $item_name; ?>" type="text" name="update_name" class="form-control" placeholder="Update the name...">
                                                        </div>
                                                    <?php
                                                } else {
                                                    echo $item_name; 
                                                }
                                            ?>
                                        </div>

                                        <div class="each_item_right_quantity">
                                            Quantity: 
                                            <?php 
                                                if(@$_GET['edit'] == 'true' && @$_GET['id'] == $item_id) {
                                                    ?>  
                                                        <div class="form-group">
                                                            <input value="<?php echo $item_quantity; ?>" type="text" name="update_quantity" class="form-control" placeholder="Update the name...">
                                                        </div>
                                                    <?php
                                                } else {
                                                    echo $item_quantity; 
                                                }
                                            ?>
                                        </div>

                                        <div>
                                            <?php 
                                                if(@$_GET['edit'] == 'true' && @$_GET['id'] == $item_id) {
                                                    ?>  
                                                        <input type="hidden" name="update_id" value="<?php echo $item_id; ?>">
                                                        <input class="btn btn-success" type="submit" name="update_item" value="Update">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <?php 
                                        if(!isset($_GET['edit'])) {
                                            ?>
                                                <div class="edit_button">
                                                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?edit=true&id=" . $item_id; ?>">Edit</a>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </form>
                        <?php

                    }
                } else {
                    echo '<div>
                        No Items to display!
                    </div>';
                }
            ?>
            
        </div>
    </div>
</body>
</html>