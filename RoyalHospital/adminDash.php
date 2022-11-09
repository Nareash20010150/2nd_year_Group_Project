<?php
require_once("DBconnect.php");
session_start();
if (isset($_SESSION['mailaddress'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style.php">
        <title>Admin dashboard - user</title>
        <style>
            p.royal {
                font-size: 20px;
            }

            p.addUSer {
                font-size: 30px;
            }
        </style>
    </head>

    <body>
        <div class="user">
            <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label>
            <div id="sidebarMenu">
                <ul class="sidebarMenuInner">
                    <li><a href="" target="_blank"><img class="icons" src="images/dashboard.svg" alt="dashboard" align="middle">
                            <p>Dashboard</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/user.svg" alt="user" align="middle">
                            <p>User</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/doctor.svg" alt="doctor" align="middle">
                            <p>Doctor</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/nurse.svg" alt="nurse" align="middle">
                            <p>Nurse</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/patient.svg" alt="patient" align="middle">
                            <p>Patient</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/receptionist.svg" alt="noticeboard" align="middle">
                            <p>Receptionist</p>
                        </a></li>
                    <li><a href="" target="_blank"><img class="icons" src="images/noticeboard.svg" alt="noticeboard" align="middle">
                            <p>Noticeboard</p>
                        </a></li>
                </ul>
            </div>
            <div class="userContents">
                <div class="title">
                    Royal Hospital Management System
                </div>
                <ul>
                    <li class="userType"><img src="images/userInPage.svg" alt="admin"> Admin</li>
                    <li class="logout"><a href="logout.php?logout">Logout <img src="images/logout.jpg" alt="logout"></a> </li>
                </ul>
                <div class="arrow">
                    <img src="images/arrow-right-circle.svg" alt="arrow">User
                </div>
                <p><button type="button">+Add user</button></p>
                <div class="userClass">
                    <?php
                    $query = "SELECT * FROM user";
                    echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
                    $result = $con->query($query);
                    if (!$result) die("Database access failed: " . $con->error);
                    $rows = $result->num_rows;
                    ?>
                    <table class="table">
                        <tr>
                            <th>nic</th>
                            <th>name</th>
                            <th>address</th>
                            <th>email</th>
                            <th>contact_num</th>
                            <th>gender</th>
                            <th>password</th>
                            <th>user_role</th>
                            <th>profile_image</th>
                        </tr>
                        <?php
                        for ($j = 0; $j < $rows; ++$j) {
                            $result->data_seek($j);
                            $row = $result->fetch_array(MYSQLI_NUM);
                        ?>
                            <tr>
                                <?php
                                for ($k = 0; $k < 8; ++$k) { ?>
                                    <td>
                                        <?php echo $row[$k]; ?>
                                    </td>
                                <?php } ?>
                                <td>
                                    <?php
                                    echo "<img class='profilePic' src='uploads/$row[8]' alt='Upload Image' width=150px>";
                                    // echo $row[8];
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <script src="js/addUser.js"></script>
        <div id="note">
            <div id="form">
                <form action="addUser.php" method="post" enctype="multipart/form-data">

                    <p class="royal">Royal Hospital Management System </p>
                    <p class="addUser">Add user </p>
                    <table>
                        <tr>
                            <td>
                                <label for="nic">NIC:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" name="nic" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Name">Name:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" name="name" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="address">Address:</label>
                            </td>
                            <td colspan="2">
                                <textarea type="text" name="address" id="" rows=3></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Email:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" name="email" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="contact">Contact number:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" name="contactNum" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="address">Gender:</label>
                            </td>
                            <td colspan="1">
                                <label for="address">Male:</label>
                                <input type="radio" name="gender" value="m">
                            </td>
                            <td colspan="1">
                                <label for="address">Female:</label>
                                <input type="radio" name="gender" value="f">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userRole">User role:</label>
                            </td>
                            <td colspan="2">
                                <select name="userRole">
                                    <option value="Patient">Patient</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Storekeeper">Storekeeper</option>
                                    <option value="Nurse">Nurse</option>
                                </select>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">Password:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" name="password" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="profile_image">Profile picture:</label>
                            </td>
                            <td colspan="2">
                                <input type="file" name="profile_image">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <button name="addUser">Apply</button>
                                <button name="cancel" id="cancel">Cancel</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>