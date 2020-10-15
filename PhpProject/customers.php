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

    $result = mysqli_query($con,"SELECT * FROM Customer");
    $result2 = mysqli_query($con,"SELECT * FROM Cards");
    
    echo "<table border='1'>
    <tr>   
    <th>Customers:</th>
    <tr>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Address</th>
    <th>City</th>
    <th>Email</th>
    <th>Birthday</th>

    </tr>";
  
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['City'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Birthday'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<table border='1'>
    <tr>   
    <th>Cards:</th>
    <tr>
    <tr>
    <th>Card number</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Area</th>
    <th>Status</th>
    <th>Value</th>
    <th>Season</th>

    </tr>";
  
    while($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>" . $row['CardNumber'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";  
        echo "<td>" . $row['Name'] . "</td>"; 
        echo "<td>" . $row['Value'] . "</td>";
        echo "<td>" . $row['Season'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
 mysqli_close($con);
?>
    
<p>
</body>
</html>