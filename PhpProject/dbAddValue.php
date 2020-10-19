<!DOCTYPE html>
<html>
<body>
    
<?php
    $host = 'localhost';
    $dbname = 'bus_card';
    $username = 'user';
    $password = filter_input(INPUT_POST,'pw',FILTER_SANITIZE_STRING);
    $con = mysqli_connect($host,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "<br> <a href='index.php'>Back</a> <br>";
    }

    $cardnumber = mysqli_real_escape_string($con, filter_input(INPUT_POST,'cn',FILTER_SANITIZE_STRING));
    $value = mysqli_real_escape_string($con, filter_input(INPUT_POST,'vl',FILTER_SANITIZE_STRING));
    $sql = "CALL AddValue('$cardnumber',$value)";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Value added!";
    echo "<br> <a href='index.php'>Back</a> <br>";

    
mysqli_close($con);
?>
    
<p>
</body>
</html>