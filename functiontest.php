<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet Application Development | Function Tests</title>
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
        <h3>Built-in Functions</h3>
        a. Length of the string apples = 6 <br>
        b. apples to uppercase = APPLES <br>
        c. Substring 'some' in www.somesite.com starts at index position = 4 <br>
        d. apples encrypted with md5 = daeccf0ad3c1fc8c8015205c332f5b42 <br>
        e. Get the variable type of 19 = integer <br>
        f. Is 27.579 numeric? The answer will be 1(true) or 0(false)= 1 <br>
        g. Format the number 27.579 to 1 decimal place = 27.6 <br>
        h. Print the product_array = Array ( [id] => 234 [description] => apples [type] => bramley )  <br>
        i. Number of items in product_array = 3 <br>
        j. Is apples in the array? = 1 <br>
        k. Add "price"=>2.45 onto the product array and display = <br>
        Array <br>
        ( <br>
            [id] => 234 <br>
            [description] => apples <br>
            [type] => bramley <br>
            [price] => 2.45 <br>
        ) <br>
        l. Explode www.somesite.com into an array (separated by ".") and display = <br>
        Array <br>
        ( <br>
            [0] => www <br>
            [1] => somesite <br>
            [2] => com <br>
        ) <br>
        m. Format todays date like this : Tue 7th May 2019 <br>
        <h3>User Functions</h3>
        a. Age of someone born 20th October 1994 = 24 <br>
        b. Bad string = A 'quote' & is bold "!! <br>
        Bad string AFTER sanitisation = A 'quote' & is <b>bold</b> &quot;!! <br>
        c. - Error:String must contain alphabetic characters only <br>
        </p>
    </div>
</body>
</html>