<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework</title>
</head>
<body>
<?php

//Create a custom function that accepts one string parameter and returns it reversed.
function stringRev($string)
{
    $string_len = strlen($string);
    $reversed_str = "";

    for ($i = $string_len; $i >= 0; $i--) {
        $reversed_str .= $string{$i};
    }
    return $reversed_str;
}

$string = "This is my third homework for PHP Academy!";
echo(stringRev($string));
echo "<hr>";

//Create a custom (recursive) function to calculate and return the factorial of a number.

function getFactorial($number)
{
    if ($number <= 1) {
        return 1;

    } else {
        return $number * getFactorial($number - 1);
    }
}

echo 'Factorial is: ' . getFactorial(7);
echo '<hr>';

?>

<form action="color.php" method="post">
    <input type="radio" id="white" name="color" value="white">
    <label for="white">White</label><br>
    <input type="radio" id="black" name="color" value="black">
    <label for="black">Black</label><br>
    <input type="radio" id="red" name="color" value="red">
    <label for="red">Red</label><br>
    <input type="radio" id="blue" name="color" value="blue">
    <label for="blue">Blue</label><br>
    <input type="radio" id="green" name="color" value="green">
    <label for="green">Green</label><br>
    <input type="radio" id="yellow" name="color" value="yellow">
    <label for="yellow">Yellow</label><br>

    <button>Submit</button>
</form>
<hr>

<!--Create image upload form and backend functionality to save an image on the server. The Image can be uploaded only if it's less than 1MB and is one of these formats: jpg, jpeg, png.-->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image">
    <button>Submit</button>
</form>

<?php
$directory = "files/";
$path = $directory . basename($_FILES["image"]["name"]);
$fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

//Check the file type
if (isset($_FILES['image']) && ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg")) {
    $image = $_FILES['image'];
    move_uploaded_file($image['tmp_name'], 'files' . DIRECTORY_SEPARATOR . $image['name']);
} else {
    echo "Only jpg, jpeg and png files are allowed.";
}

//Check the file size
if ($_FILES['image']['size'] > 1048576) {
    echo "You can't upload the file. It's too large!";
}

?>

</body>
</html>







