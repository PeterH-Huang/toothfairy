<?php
/* This takes in data needed to add an appoitment, also randomly generates a integer to be
added as appoitmentID, appoitmentPatientID, and appoitmentEmployeeID.
Still needs testing */
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("ec2-52-21-136-176.compute-1.amazonaws.com"));
$cleardb_server = $cleardb_url["5432"];
$cleardb_username = $cleardb_url["anbtnmsnsbhumz"];
$cleardb_password = $cleardb_url["7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137"];
$cleardb_db = substr($cleardb_url["ec2-52-21-136-176.compute-1.amazonaws.com"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$randomid_appointmentID = (rand(1,1000000));
$randomid_appointmentPatientID = (rand(1,1000000));
$randomid_appointmentEmployeeID = (rand(1,1000000));

// Escape user inputs for security
$date_day = mysqli_real_escape_string($link, $_REQUEST['date_day']);
$date_month = mysqli_real_escape_string($link, $_REQUEST['date_month']);
$date_year = mysqli_real_escape_string($link, $_REQUEST['date_year']);
$start_time = mysqli_real_escape_string($link, $_REQUEST['start_time']);
$end_time= mysqli_real_escape_string($link, $_REQUEST['end_time']);
$appoitment_type= mysqli_real_escape_string($link, $_REQUEST['appointment_type']);
$appoitment_status= mysqli_real_escape_string($link, $_REQUEST['appointment_status']);
$room_assigned= mysqli_real_escape_string($link, $_REQUEST['room_assigned']);

// Attempt insert query execution
$sql = "INSERT INTO appointment (randomid_appointmentID, randomid_appointmentPatientID, randomid_appointmentEmployeeID, date_day, date_month, date_year, start_time, end_time, appoitment_type, appoitment_status, room_assigned)
                             VALUES ('$randomid_appointmentID', '$randomid_appointmentPatientID', '$randomid_appointmentEmployeeID', '$date_day', '$date_month', '$date_year', '$start_time', '$end_time', '$appoitment_type', '$appoitment_status', '$room_assigned')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>