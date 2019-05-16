<?php 
    session_start();

    // IMPORT CONNECTION
    include("connection.php");

    // GET THE ADD TO COLLECTION DATA
    $collection_array = array();
    if(isset($_POST['submit'])) {
        $item_id = $_POST['item_id'];

        if(isset($_SESSION['collectionlist'])) {
            $collection_array = $_SESSION['collectionlist'];
            array_push($collection_array, $item_id);
        } else {
            array_push($collection_array, $item_id);
        }

        $_SESSION['collectionlist'] = $collection_array;

        header("Location: collectionapplication.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Collection Application</title>
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
        <h1>Add to the collection</h1>

        <p>Click add to collection to add.</p>

        <?php 
            if(isset($_GET['id'])) {
                $item_id = $_GET['id'];
                
                $sql = "SELECT * FROM tbl_items WHERE item_id = '$item_id'";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $item_photo = $row['item_photo'];
                    $item_name = $row['item_name'];
                    $item_quantity = $row['item_quantity'];
                }
                ?>
                    <div class="card" style="width:400px; margin-bottom: 40px;">
                        <img class="card-img-top" src="images/uploads/<?php echo $item_photo; ?>" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $item_name; ?></h4>
                            <p class="card-text">Quantity: <?php echo $item_quantity; ?></p>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $item_id; ?>" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                <input class="btn btn-success" name="submit" type="submit" value="Add To Collection">
                            </form>
                        </div>
                    </div>
                <?php
            }
        ?>
        
    </div>
</body>
</html>