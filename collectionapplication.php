<?php 
    session_start();

    // IMPORT CONNECTION
    include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Collection Application</title>
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
    
    <div class="container mt-5">
        <!-- SECTIONS -->
        <h1>Collection : Application</h1>

        <div id="display_items">
            <h5>Items from the database:</h5>

            <!-- HEADER -->
            <div class="collection_each title">
                <div class="collection_each_name">ITEM NAME</div>
                <div class="collection_each_quantity">QUANTITY</div>
            </div>

            <?php 
                $sql = "SELECT * FROM tbl_items ORDER BY item_id DESC";

                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $item_quantity = $row['item_quantity'];

                        ?>
                            <div class="collection_each" onclick="location.href = 'displayItem.php?id=<?php echo $item_id; ?>'">
                                <div class="collection_each_name"><?php echo $item_name; ?></div>
                                <div class="collection_each_quantity"><?php echo $item_quantity; ?></div>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>

        <div id="collection_items" style="margin-top: 50px;">
            <h5>Collection List:</h5>

            <?php 
                if(empty($_SESSION['collectionlist'])) {
                    ?>
                        <div>No items in the collection.</div>
                    <?php
                } else {
                    foreach($_SESSION['collectionlist'] as $value) {
                        
                        $value_id = $value;

                        $sql = "SELECT * FROM tbl_items WHERE item_id = '$value_id'";

                        $result = $con->query($sql);
                        if($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            $item_name = $row['item_name'];
                            $item_quantity = $row['item_quantity'];
                        }

                        ?>
                            <div class="session_collection_each">
                                <div class="session_collection_each_name"><?php echo $item_name; ?></div>
                                <div class="session_collection_each_quantity"><?php echo $item_quantity; ?></div>
                                <div class="session_collection_each_button">
                                    <button class="btn btn-outline-danger">Remove</button>
                                </div>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>