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

        <h3>Built-in Functions</h3>

        <?php 
            echo "<p>a. Length of the string apples = " . strlen("apples") . "</p>";

            echo "<p>b. apples to uppercase = " . strtoupper("apples") . "</p>";

            echo "<p>c. Substring 'some' in www.somesite.com starts at index position = " . strpos("www.somesite.com","some") . "</p>";

            echo "<p>d. apples encrypted with md5 = " . md5("apples") . "</p>";

            echo "<p>e. Get the variable type of 19 = " . gettype(19) . "</p>";

            echo "<p>f. Is 27.579 numeric? The answer will be 1(true) or 0(false) = " . is_numeric(27.579) . "</p>";

            echo "<p>g. Format the number 27.579 to 1 decimal place = " . number_format(27.579, 1, '.', '') . "</p>";
            
            $arr = array("id"=>"234", "description"=>"apples", "type"=>"bramley");
            echo "<p>h. Print the product_array = ";
            print_r($arr);
            echo "</p>";

            echo "<p>i. Number of items in product_array = " . count($arr) . "</p>";

            echo "<p>j. Is apples in the array? = " . is_array($arr) . "</p>";

            $arr["price"] = 2.45;
            echo "<p>k. Add \"price\"=>2.45 onto the product array and display = ";
            print_r($arr);
            echo "</p>";

            $exploadarray = explode(".", "www.somesite.com");
            echo "<p>l. Explode www.somesite.com into an array (separated by '.') and display = ";
            print_r($exploadarray);
            echo "</p>";

            echo "<p>m. Number of items in product_array = " . date("D jS F Y") . "</p>";
        ?>

        <h3>User Functions</h3>
        
        <?php 
            function findAge($date) {
                return date("Y") - date("Y", strtotime($date));
            }

            echo "<p>a. Age of someone born 20th October 1994 = " . findAge("20th October 1994") . "</p>";

            function sanitize($string) {
                $string = html_entity_decode();
                return $string;
            }

            echo "<p>b. Bad String = ". sanitize('A quote is "bold"') ."</p>";
        ?>
    </div>
</body>
</html>