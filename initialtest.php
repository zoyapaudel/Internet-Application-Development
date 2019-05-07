<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Initial Tests</title>
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
        <h1>Test: Initialisation and Configuration</h1>
        <p>
        Test Session Variable = This message is stored in a session variable <br>
        Base URL =http://whoopdedoo_org_uk/int/support/development/webapp/ <br>
        Database Configuration Details <br>
        Array <br>
        ( <br>
            [hostname] => localhost <br>
            [username] => user <br>
            [password] => secretpassword <br>
            [database] => db name <br>
            [dbdriver] => mysql <br>
        ) <br>
        </p>
    </div>
</body>
</html>