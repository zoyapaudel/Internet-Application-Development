<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | OO Class Tests</title>
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
            Classes and Objects
        </h1>

        <h6>Object Oriented Mysqli and Basic Selection</h6>

        <?php 
            // Object Oriented Mysqli
            $con = new mysqli('localhost', 'root', '', 'fashion_shop');

            if($con->connect_error) {
                die("Connection Error!");
            }

            // Basic Selection
            $sql = "SELECT * FROM tbl_items";
            $result = $con->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $item_id = $row['item_id'];
                    $item_name = $row['item_name'];
                    $item_quantity = $row['item_quantity'];

                    ?>
                        <div>
                            <?php 
                                echo $item_id . " - " . $item_name . " - " . $item_quantity;
                            ?>
                        </div>
                    <?php
                }
            }

        ?>

        <h6 style="margin-top: 40px;">Object Oriented Prepared Statements</h6>

        <?php 
            // PREPARED STATEMENT
            $stmt = $con->prepare("SELECT * FROM tbl_items WHERE item_id = ?");
            $stmt->bind_param("i", $id);

            $id = 5;
            $stmt->execute();

            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            echo $row['item_id'] . " - " . $row['item_name'] . " - " . $row['item_quantity'] . "<br>";
            
            $id = 6;
            $stmt->execute();

            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            echo $row['item_id'] . " - " . $row['item_name'] . " - " . $row['item_quantity'];
        ?>

        <?php 
            // CLASSES AND OBJECT
            class CreateProduct {
                var $product_name;
                var $product_price;
                var $product_quantity;

                function setValue($name, $price, $quantity) {
                    $this->product_name = $name;
                    $this->product_price = $price;
                    $this->product_quantity = $quantity;
                }

                function insertData($con) {
                    $name = $this->product_name;
                    $price = $this->product_price;
                    $quantity = $this->product_quantity;

                    $sql = "INSERT INTO tbl_products VALUES (NULL, '$name', '$price', '$quantity')";
                    
                    if($con->query($sql) === TRUE) {
                        header("Location: ooclasstest.php");
                    } else {
                        echo "ERROR INSERTING DATA";
                    }
                    
                }

                function displayData($con) {
                    $sql = "SELECT * FROM tbl_products ORDER BY product_id DESC";

                    $result = $con->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                                <div style="border: 1px solid #e1e1e1; border-radius: 4px;padding: 10px;margin-bottom: 10px;background: #f1f1f1;">
                                    <?php 
                                        echo '<span style="font-weight: bold;">Product Name: </span> ' . $row['product_name'];
                                        echo ' , <span style="font-weight: bold;">Product Quantity: </span> ' . $row['product_quantity'];
                                        echo ' , <span style="font-weight: bold;">Product Price: </span>'  . $row['product_price'];
                                    ?>
                                </div>
                            <?php
                        }
                    }
                }
            }
        ?>

        <?php 
            // CREATE THE OBJECT
            $obj = new CreateProduct();
            if(isset($_POST['submit'])) {
                $product_name = $_POST['product_name'];
                $product_quantity = $_POST['product_quantity'];
                $product_price = $_POST['product_price'];

                // SET THE VALUES
                $obj->setValue($product_name, $product_quantity, $product_price);

                // INSERT THE DATA
                $obj->insertData($con);
            } 
        ?>

        <h5 style="margin-top: 50px;">Create Classes and Object</h5>

        <div>
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" name="product_name" class="form-control mr-2" placeholder="Product Name">
                <input type="text" name="product_quantity" class="form-control mr-2" placeholder="Product Quantity">
                <input type="text" name="product_price" class='form-control mr-2' placeholder="Product Price">
                <input type="submit" name="submit" class="btn btn-success" value="submit">
            </form>
        </div>

        <div style="margin-top: 50px;">
            <p>Displaying all inserted data using oo classes and object.</p>
            <?php 

                // DIPSLAY THE DATA
                $obj->displayData($con);
                
            ?>
        </div>
    </div>
</body>
</html>