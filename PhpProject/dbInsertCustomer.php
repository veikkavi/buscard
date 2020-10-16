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
        echo "Failed to connect to MySQL:  " . mysqli_connect_error();
        echo "<br> <a href='index.php'>Back</a> <br>";
    }

    $firstname = mysqli_real_escape_string($con, filter_input(INPUT_POST,'firstn',FILTER_SANITIZE_STRING));
    $lastname = mysqli_real_escape_string($con, filter_input(INPUT_POST,'lastn',FILTER_SANITIZE_STRING));
    $address = mysqli_real_escape_string($con, filter_input(INPUT_POST,'adr',FILTER_SANITIZE_STRING));
    $city = mysqli_real_escape_string($con, filter_input(INPUT_POST,'ct',FILTER_SANITIZE_STRING));
    $email = mysqli_real_escape_string($con, filter_input(INPUT_POST,'em',FILTER_SANITIZE_STRING));
    $birthday = mysqli_real_escape_string($con, filter_input(INPUT_POST,'bd',FILTER_SANITIZE_STRING));
    $sql = "CALL AddCustomer('$lastname','$firstname','$address','$city','$email','$birthday')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Customer added!";
    echo "<br> <a href='index.php'>Back</a> <br>";

    
mysqli_close($con);
?>
    
<p>
</body>
</html>