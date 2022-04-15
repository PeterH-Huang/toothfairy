<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="setPatientAppointmentPage.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='receptionistPage.html'">Back</button>
        </div>
        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div> <br> <br>
        <div class="addAppointmentInfoStatement" id="addApptmtInfoS">
            <p>Fill All Information Below to Create An Appointment</p>
        </div> <br>
        <form method="post" autocomplete="off">
            <p>Identification:</p>
            <input type="text" id="appointmentPatientID" name="appointmentPatientID" placeholder="Patient ID">
            <input type="text" id="appointmentEmployeeID" name="appointmentEmployeeID" placeholder="Employee ID"> <br> <br>
            <p>Date and Time:</p>
            <input type="text" id="appointmentDateDay" name="appointmentDateDay" placeholder="Appointment Day">
            <input type="text" id="appointmentDateMonth" name="appointmentDateMonth" placeholder="Appointment Month">
            <input type="text" id="appointmentDateYear" name="appointmentDateYear" placeholder="Appointment Year">
            <input type="text" id="startTime" name="startTime" placeholder="Start Time (24:00)">
            <input type="text" id="endTime" name="endTime" placeholder="End Time (24:00)"> <br> <br>
            <p>Appointment Details:</p>
            <input type="text" id="appointmentType" name="appointmentType" placeholder="Appointment Type">
            <input type="text" id="appointmentStatus" name="appointmentStatus" placeholder="Appointment Status (Integer)">
            <input type="text" id="roomAssigned" name="roomAssigned" placeholder="Room Assigned"> <br> <br> <br>

            <input type="submit" id="submit" name="confirm" value="submit">

        </form>

        <?php 
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");
            if($connection) {
                echo 'connected';
             } else {
                 echo 'there has been an error connecting';
             }

            if(isset($_POST['confirm'])){
                    echo "MADE IT"; 
                    $appointmentID = rand(0, 100000);
                    $appointmentPatientID = (int) $_POST['appointmentPatientID'];
                    $appointmentEmployeeID = (int) $_POST['appointmentEmployeeID'];
                    $appointmentDateDay = (int) $_POST['appointmentDateDay'];
                    $appointmentDateMonth = $_POST['appointmentDateMonth'];
                    $appointmentDateYear = (int) $_POST['appointmentDateYear'];
                    $startTime = $_POST['startTime'];
                    $endTime = $_POST['endTime'];
                    $appointmentType = $_POST['appointmentType'];
                    $appointmentStatus = (int) $_POST['appointmentStatus'];
                    $roomAssigned = $_POST['roomAssigned'];

                    //if($firstName != null && $lastName != null && $middleName != null && $ssn != null && $id != null && $houseNumber != null && $streetName != null && $city != null && $province != null && $gender != null && $age != null && $emailAddress != null && $phoneNumber != null && $birthDay != null && $birthMonth != null && $birthYear != null){
                    $queryOne = pg_query($connection, "insert into appointment values (100, $appointmentPatientID, $appointmentEmployeeID, $appointmentDateDay, $appointmentDateMonth, $appointmentDateYear, $startTime, $endTime, $appointmentType, $appointmentStatus, $roomAssigned);"); //Insert Query
                        
                        /*if($userType == 0) {
                            $queryTwo = pg_query($connection, "insert into patient values($id, $ssn, $dependantOneFirstName, $dependantOneMiddleName, $dependantOneLastName, $dependantTwoFirstName, $dependantTwoMiddleName, $dependantTwoLastName, $dependantThreeFirstName, $dependantThreeMiddleName, $dependantThreeLastName,)");
                        }*/

                      //  if($queryOne /*&& $queryTwo*/) {
                    //echo "<script type='text/javascript'>alert('Successfull!');</script>";
                    if($queryOne) {
                        echo "Done!";
                    }
                            // }
                    //} else {
                    //    echo "<script type='text/javascript'>alert('fail');</script>";
                    //} 
                
                
                //}
                
            } else {
                echo "DIDNT WORK";
            }
        ?>

    </body>
</html>
