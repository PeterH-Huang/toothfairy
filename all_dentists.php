<?php

$servername = "5432";
$username = "anbtnmsnsbhumz";
$password = "7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137";
$dbname = "ec2-52-21-136-176.compute-1.amazonaws.com";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Gets the employeeBranchID and the employeetype when it is equal to dentist displaying the employeeBranchID and all dentists across all branches
//Can use BranchID to get names if necessary
$sql = "SELECT employeeBranchID, employeeType FROM employee WHERE employeeType = 'dentist'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["employeeBranchID"]. " - employeeType: " . $row["employeeType"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>