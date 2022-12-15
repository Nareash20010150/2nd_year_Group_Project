<?php 
session_start();



if (isset($_SESSION['email'])) {
    include 'include/sidebar.php';
include 'include/header.php';

@include "DBconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="mcontainer">
    <a href="../logout_rimaz.php"><i class="fa fa-sign-out"></i><button name="Logout">Logout<i class="fa fa-sign-out"></i></button></a>
        <div class="cards">
        
            <a href="">
                <div class="card">
                    <div class="card-content"></div>
                    <div class="card-name">Download Summary</div>
                    <div class="icon-box">
                    <i class="fas fa-file-text"></i>
                </div>
                </div>
            </a>

            <a href="">
                <div class="card">
                    <div class="card-content"></div>
                    <div class="card-name">Appointment Confirmation</div>
                    <div class="icon-box">
                    <i class="fas fa-book"></i>
                </div>
                </div> 
            </a>

            <a href="">
                <div class="card">
                    <div class="card-content"></div>
                    <div class="card-name">Daily Reports</div>
                    <div class="icon-box">
                    <i class="fa fa-calendar"></i>
                </div>
                </div> 
            </a>

            <a href="">
                <div class="card">
                    <div class="card-content"></div>
                    <div class="card-name">Bill Details</div>
                    <div class="icon-box">
                    <i class="fas fa-dollar"></i>
                </div>
                </div> 
            </a> 
        </div>
        
    <div class="payment">
    <div class="tcontent">
        <div class="mtable">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Doctor</th>
                    <!-- <th>Patient_ID</th> -->
                    <th>Department</th>
                    <!-- <th>Message</th> -->
                    <th>status</th>
                </thead>
            <tbody>
                <?php
    // die("hai");
    $patientID = $_SESSION['patientID'];
    // die($patientID);

    $query = "SELECT `appointmentID`, `date`,`time`, `venue`, `doctor`, `department`, `status` FROM `appointment` where patientID='$patientID'";
    $result = $con->query($query);
    $rows = $result->num_rows;
    if ($result) {
        for ($j = 0; $j < $rows; $j++) {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
            $ID = $row[0];
            $date = $row[1];
            $time = $row[2];
            $venue = $row[3];
            $doctor = $row[4];
            // $patientID = $row['patientID'];
            $department = $row[5];
            // $message = $row['message'];
            $status = $row[6];

            echo '<tr>
                        <td scope="row">' . $ID . '</td>
                        <td>' . $date . '</td>
                        <td>' . $time . '</td>
                        <td>' . $venue . '</td>
                        <td>' . $doctor . '</td>
                        <td>' . $department . '</td>
                        <td>' . $status . '</td>
                        </tr>';
        }
    }
                ?>
            </tbody>
            </table>
        </div>
        </div>
        <a href=""><div class="pay">Pay Online<i class="fa fa-money"></i></div></a>
        <div class="card1">
            <div class="card1-content">Pulse</div>
            <div class="icon-box">
                <i class="fa fa-heartbeat"></i>
            </div>
            <div class="card-number">70 bpm</div>
            
        </div>

        <div class="card2">
            <div class="card2-content">Weigth</div>
            <div class="icon-box">
                <i class="fas fa-cash-register"></i>
            </div>
            <div class="card-number">65 kg</div>
        </div>

        <div class="card3">
            <div class="card3-content">Heigth</div>
            <div class="icon-box">
                <i class="fas fa-arrows-alt-v"></i>
            </div>
            <div class="card-number">1.7 m</div>
        </div>
    </div>
    
    
</div>
</body>
</html>

<?php
}else
if(isset($_SESSION['name'])){
@include "DBconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    You are logged in as  <?php echo $_SESSION['name']; ?>.Do you want to logout?
    <a href="../logout_rimaz.php"><button name="logout">
        Logout
    </button></a>
    <a href="patientdash.php">
        <button name="cancel">Cancel</button>
    </a>
</body>
</html>
<?php
    } else {
        header("location: ../login_form.php");
    }
?>
