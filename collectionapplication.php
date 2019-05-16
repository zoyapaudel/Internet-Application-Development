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

            <div class="collection_each">
                <div class="collection_each_name">ITEM NAME</div>
                <div class="collection_each_quantity">QUANTITY</div>
            </div>

            <div class="collection_each">
                <div class="collection_each_name">Dipesh Rai</div>
                <div class="collection_each_quantity">10</div>
            </div>
        </div>
    </div>
</body>
</html>