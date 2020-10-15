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
    }

    $email = mysqli_real_escape_string($con, filter_input(INPUT_POST,'em',FILTER_SANITIZE_STRING));
    $value = mysqli_real_escape_string($con, filter_input(INPUT_POST,'vl',FILTER_SANITIZE_STRING));
    $sql = "CALL AddValue('$email',$value)";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Value added!";

    
mysqli_close($con);
?>
    
<p>
</body>
</html>