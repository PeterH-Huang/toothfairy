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

//Get the ID from the user in order to check all appoitments associated with the entered ID
$id = (int)readline('Enter your Employee ID: ');

//Gets the data and does not retrieve data where the id's don't match and where the appointmentStatus = 0 (complete)
$sql = "SELECT appointmentEmployeeID, appointmentDateDay, appointmentDateMonth, appointmentDateYear, startTime, endTime, appointmentType,  appointmentStatus, roomAssigned
         FROM appointment WHERE appointmentEmployeeID='.$id.' AND WHERE appointmentStatus != '0'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>