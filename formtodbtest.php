<?php 
    // IMPORT CONNECTION
    include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Form to DB Tests</title>
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

        <h1>Form To Database Interaction Test</h1>

        <p>Search the items available:</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <div class="input-group">
                <input class="form-control" type="search" name="search_name" placeholder="Search by name...">
                <div class="input-group-append">
                    <input class="btn btn-success" type="submit" name="search" value="Search">
                </div>
            </div>
        </form>

        <div id="item_display" style="margin-top: 40px;">
            <h3>
                Product List:
            </h3>
            
            <?php 
                $sql = "SELECT * FROM tbl_items ORDER BY item_id DESC";

                // SEARCH THE ITEMS USING NAME
                if(isset($_GET['search'])) {
                    $search_name = $_GET['search_name'];
                    echo '<p style="color: #a1a1a1;">Showing the items with the keyword <span style="font-style: italic;color: #16C;">"' . $search_name . '"</span></p>';
                    
                    // MATCHING THE PATTERN
                    $sql = "SELECT * FROM tbl_items WHERE item_name LIKE '%$search_name%' ORDER BY item_id DESC";
                }
                
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
                                                echo $item_name; 
                                            ?>
                                        </div>

                                        <div class="each_item_right_quantity">
                                            Quantity: 
                                            <?php
                                                echo $item_quantity;
                                            ?>
                                        </div>
                                    </div>
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