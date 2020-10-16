<!DOCTYPE html>
<html>
<body>
    
<?php
    $host = 'localhost';
    $dbname = 'bus_card';
    $username = 'user';
    $password = 'password';
    $con = mysqli_connect($host,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "<br> <a href='index.php'>Back</a> <br>";
    }

    $email = mysqli_real_escape_string($con, filter_input(INPUT_POST,'em',FILTER_SANITIZE_STRING));
    $cardnumber = mysqli_real_escape_string($con, filter_input(INPUT_POST,'cn',FILTER_SANITIZE_STRING));
    $area = mysqli_real_escape_string($con, filter_input(INPUT_POST,'ar',FILTER_SANITIZE_STRING));
    $sql = "CALL AddCard('$email', '$cardnumber', '$area')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Added Card!";
    echo "<br> <a href='index.php'>Back</a> <br>";

    
mysqli_close($con);
?>
    
<p>
</body>
</html>