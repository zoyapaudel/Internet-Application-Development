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
    </div>
</body>
</html>