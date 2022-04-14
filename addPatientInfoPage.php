<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Tooth Fairy</title>
        <link href="addPatientInfoPage.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="backBtn">
            <button type="button" id="backBtn" onclick="location.href='receptionistPage.html'">Back</button>
        </div>
        <div class="logoTitle">
            <p>Tooth Fairy</p>
        </div> <br> <br>
        <div class="addPatientPageStatement" id="addPPageS">
            <p>Fill All Information Below to Add a New Patient</p>
        </div> <br>
        <form autocomplete="off">
            <p>Full Name:</p>
            <input type="text" id="firstName" placeholder="First Name">
            <input type="text" id="middleName" placeholder="Middle Name">
            <input type="text" id="lastName" placeholder="Last Name"> <br> <br>
            <p>Identification:</p>
            <input type="number" id="SSN" placeholder="SSN">
            <input type="number" id="ID" placeholder="ID"> <br> <br>
            <p>Address:</p>
            <input type="number" id="houseNumber" placeholder="House Number">
            <input type="text" id="streetName" placeholder="Street Name">
            <input type="text" id="city" placeholder="City">
            <input type="text" id="province" placeholder="Province"> <br> <br>
            <p>Gender and Age:</p>
            <input type="radio" name="genderSet" id="genderMale" value="Male">
            <label for="genderMale">Male</label>
            <input type="radio" name="genderSet" id="genderFemale" value="Female">
            <label for="genderFemale">Female</label>
            <input type="radio" name="genderSet" id="genderOther" value="Other">
            <label for="genderOther">Other</label> <br> <br>
            <input type="number" id="age" placeholder="Age" min="15"> <br> <br>
            <p>Contact Information:</p>
            <input type="email" id="emailAddress" placeholder="Email Address">
            <input type="text" id="phoneNumber" placeholder="Phone Number (No Dashes)"> <br> <br>
            <p>Birth Date:</p>
            <input type="number" id="birthDay" min="1" max="31" placeholder="Birth Day"> 
            <input type="number" id="birthMonth" min="1" max="12" placeholder="Birth Month">
            <input type="number" id="birthYear" placeholder="Birth Year"> <br> <br>
            <p>Dependant(s):</p>
            <input type="text" id="dependantOneFirstName" placeholder="First Name (Dependant 1)">
            <input type="text" id="dependantOneMiddleName" placeholder="Middle Name (Dependant 1)">
            <input type="text" id="dependantOneLastName" placeholder="Last Name (Dependant 1)"> 
            <input type="number" id="dependantOneAge" placeholder="Age (Dependant 1)" min="0" max="14"> <br> <br>
            <input type="text" id="dependantTwoFirstName" placeholder="First Name (Dependant 2)">
            <input type="text" id="dependantTwoMiddleName" placeholder="Middle Name (Dependant 2)">
            <input type="text" id="dependantTwoLastName" placeholder="Last Name (Dependant 2)"> 
            <input type="number" id="dependantTwoAge" placeholder="Age (Dependant 2)" min="0" max="14"> <br> <br>
            <input type="text" id="dependantThreeFirstName" placeholder="First Name (Dependant 3)">
            <input type="text" id="dependantThreeMiddleName" placeholder="Middle Name (Dependant 3)">
            <input type="text" id="dependantThreeLastName" placeholder="Last Name (Dependant 3)">
            <input type="number" id="dependantThreeAge" placeholder="Age (Dependant 3)" min="0" max="14"> <br> <br>
            <p>Insurance:</p>
            <input type="number" id="insuranceNumber" placeholder="Insurance Number" min="0"> <br> <br>
            <p>User Type (Patient = 0, Employee = 1):</p>
            <input type="number" id="userType" min="0" max="1"> <br> <br> <br>
            <input type="submit" id="submit" value="Submit">

        </form>

        <?php 
            $connection = pg_connect("host=ec2-52-21-136-176.compute-1.amazonaws.com
            dbname=dae350stsd51e2 user=anbtnmsnsbhumz password=7cd60d6bc02b2a802a4b0e107994f85faad6721a0557f67b0903832fa04bd137");

            if(isset($_POST['submit'])){
                if($_POST['submit'] == 'Submit') {
                    //$property_agreementID = rand(8300,9500); 
                    $firstName = /*(string)*/ $_POST['userFirstName'];
                    $lastName = $_POST['userLastName'];
                    $middleName = $_POST['userMiddleName'];
                    $ssn = (int) $_POST['ssn'];
                    $id = (int) $_POST['id'];
                    $houseNumber = (int) $_POST['houseNumber'];
                    $streetName = $_POST['streetName'];
                    $city = $_POST['city'];
                    $province = $_POST['province'];
                    //RADIO BUTTON FOR GENDER, FIGURE IT OUT
                    $gender = $_POST['genderSet'];
                    $age = (int) $_POST['age'];
                    $emailAddress = $_POST['emailAddress'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $birthDay = (int) $_POST['birthDay'];
                    $birthMonth = (int) $_POST['birthMonth'];
                    $birthYear = (int) $_POST['birthYear'];
                    $dependantOneFirstName = $_POST['dependantOneFirstName'];
                    $dependantOneMiddleName = $_POST['dependantOneMiddleName'];
                    $dependantOneLastName = $_POST['dependantOneLastName'];
                    $dependantOneAge = (int) $_POST['dependantOneAge'];
                    $dependantTwoFirstName = $_POST['dependantTwoFirstName'];
                    $dependantTwoMiddleName = $_POST['dependantTwoMiddleName'];
                    $dependantTwoLastName = $_POST['dependantTwoLastName'];
                    $dependantTwoAge = (int) $_POST['dependantTwoAge'];
                    $dependantThreeFirstName = $_POST['dependantThreeFirstName'];
                    $dependantThreeMiddleName = $_POST['dependantThreeMiddleName'];
                    $dependantThreeLastName = $_POST['dependantThreeLastName'];
                    $dependantThreeAge = (int) $_POST['dependantThreeAge'];
                    $insuranceNumber = (int) $_POST['insuranceNumber'];
                    $userType = (int) $_POST['userType'];

                    //if($firstName != null && $lastName != null && $middleName != null && $ssn != null && $id != null && $houseNumber != null && $streetName != null && $city != null && $province != null && $gender != null && $age != null && $emailAddress != null && $phoneNumber != null && $birthDay != null && $birthMonth != null && $birthYear != null){
                        $queryOne = pg_query($connection, "insert into users values ($ssn, $houseNumber, $streetName, $city, $province, $firstName, $middleName, $lastName, $gender, $age, $insuranceNumber, $emailAddress, $birthDay, $birthMonth, $birthYear, $userType, $phoneNumber)"); //Insert Query
                        
                        /*if($userType == 0) {
                            $queryTwo = pg_query($connection, "insert into patient values($id, $ssn, $dependantOneFirstName, $dependantOneMiddleName, $dependantOneLastName, $dependantTwoFirstName, $dependantTwoMiddleName, $dependantTwoLastName, $dependantThreeFirstName, $dependantThreeMiddleName, $dependantThreeLastName,)");
                        }*/

                      //  if($queryOne /*&& $queryTwo*/) {
                            echo "<script type='text/javascript'>alert('Successfull!');</script>";
                       // }
                    //} else {
                    //    echo "<script type='text/javascript'>alert('fail');</script>";
                    //} 
                
                
                }
                
            } 
        ?>
    </body>
</html>
