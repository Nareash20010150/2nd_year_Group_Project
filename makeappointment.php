<?php
session_start();
require_once("./patient/DBconnect.php");

if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $doctor = $_POST["doctor"];
    $msg = $_POST['msg'];

    // $dnic = mysqli_fetch_assoc(mysqli_query($con,"SELECT `nic` FROM `user` WHERE user_role = 'doctor' and name = '.$doctor.'"));
    // $pnic =  mysqli_fetch_assoc(mysqli_query($con,"SELECT `nic` FROM `user` WHERE user_role = 'patient' and email = '.$email.'"));
    // $docid =  mysqli_fetch_assoc(mysqli_query($con,"SELECT `doctorID` FROM `doctor` WHERE nic='.$dnic.'"));
    // $pid =  mysqli_fetch_assoc(mysqli_query($con,"SELECT patientID FROM patient WHERE nic='.$pnic.'"));
    $pid = $_SESSION['patientID'];
    $query = "INSERT INTO `appointment`(`appointmentID`,`date`, `time`,`venue`, `doctorID`,`doctor`, `department`, `patientID`,`message`, `status`)
    VALUES('','$date','Pending','Pennding','---','$doctor','$department','$pid','$msg','Pending')" ;

    $result = mysqli_query($con,$query);
    if($query){echo "Query is successful";}

    else {echo "Qyery failed";
        echo $result;
        echo $query; }
    header('location:./patient/patientdash.php?pid='.$pid.'');
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/appointment.css">
    <script src="./js/appointment.js"></script>
    <style>
        body {
            background-image: url('./images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
    <title>MakeAppointment</title>
</head>
<body>
    <section class="header">
        <!-- <div class="heading"> -->
            <h2>Make an Appointment</h2>
        <!-- </div> -->
        <div class="Form">
            <form action="" method="POST">
                <br>
                <label for="">Email</label><br><br>
                <input type="email" name="email" id="email" placeholder="eg:- kumarsanga84@gmail.com"><br><br>
                <label for="">Date</label><br><br>
                <input type="date" name="date" id="date"><br><br>
                <label for="">Department</label><br><br>
                <select name="department" id="department">
                    <option value="">Please A Select Department</option>
                    <option value="Anesthetics">Anesthetics</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Gastroentology">Gastroentology</option>
                </select><br><br>
                <label for="">Doctor</label><br><br>
                <select name="doctor" id="doctor">
                    <option value="">Select A Department First</option>
                </select><br><br>
                <label for="">Message</label><br><br>
                <textarea name="msg" id="msg" cols="30" rows="50" placeholder="Your Message To The Doctor"></textarea>
                <!-- <br><br><input type="submit" value="Submit" id="btn" name="btn" class="btn"> -->
                <button type="submit" name="submit" id="btn" value="submit" onclick="">Submit</button>
            </form> 
            
        </div>
    </section>
</body>
</html>

