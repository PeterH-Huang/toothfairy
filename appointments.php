<html>

    <head>
        <title>Today Appointment</title>
        <link href="appointments.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='homePage.html'">Back</button>
        </div>

        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div>
        <br>
        <br>

        <div class="welcome" id="welcome">
            <h1>Todays Appointments</h1>
        </div>
        <br>

        <p> Welcome
            <?php
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");
            if($connection) {
                echo 'connected';
            } else {
                echo 'there has been an error connecting';
            }

         echo $_GET["dentistID"]; ?>
         </p><br>
        <p> Todays patients are:
            <?php
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
                        dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");
            echo $_GET["date"];
            $queryOne = pg_query($connection, "SELECT appointmentpatientid FROM appointment WHERE appointmentemployeeid = dentistID AND appointmentdateday = dateDay AND appointmentdatemonth = dateMonth AND  appointmentdateyear = dateYear");
            ?>
        </p><br>

        <div class="medHistory" id="medHistory">
            <button type="button" id="button1" onclick="location.href='patientMedicalHistory.php'">Medical History</button>
        </div>

        <div class="newProcedure" id="newProcedure">
            <button type="button" id="button2" onclick="location.href='newprocedure.php'">Administer New Procedure</button>
        </div>

    </body>
</html>