<?php
session_start();
require_once("../conf/config.php");
?>
<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
<label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
</label>
<div id="sidebarMenu">
    <div class="welcomeUser">
        <?php
        $profilePic = $_GET['profilePic'];
        echo
        "<p align='middle'>"
        ?>
        <img class='profilePic' align='middle' src=<?php echo BASEURL . '/uploads/' . $profilePic ?>
        alt='Upload Image'>
        <?php
        echo $_GET['name'] . "</p>";
        ?>
    </div>
    <ul class="sidebarMenuInner">
        <li onmouseover="changeImage('dashboard.svg', 'dashboard')" onmouseout="restoreImage('dashboardDef.svg', 'dashboard')"><a href="<?php echo BASEURL . '/Nurse/nursedashboard.php' ?>" target="_self"><img class="icons butbut" id="dashboard"
                                                                                                                                                                                                              src=<?php echo BASEURL . '/images/dashboardDef.svg' ?> alt="dashboard"
                                                                                                                                                                                                              align="middle">
                <p>Dashboard</p>
            </a></li>
        <!-- <li onmouseover="changeImage('patient.svg', 'patient')" onmouseout="restoreImage('patientDef.svg', 'patient')"><a href="<?php echo BASEURL.'/Nurse/display.php'?>" target="_self"><img class="icons butbut" id="patient"
                                                                                                                                                                                                     src=<?php echo BASEURL . '/images/patientDef.svg' ?> alt="patient"
                                                                                                                                                                                                     align="middle">
                <p>Patient</p>
            </a></li> -->
        <li onmouseover="changeImage('room.svg', 'room')" onmouseout="restoreImage('roomDef.svg', 'room')"><a href="<?php echo BASEURL . '/Nurse/beds.php' ?>" target="_self"><img class="icons butbut" id="room"
                                                                                                                                                                                               src=<?php echo BASEURL . '/images/roomDef.svg' ?> alt="room"
                                                                                                                                                                                               align="middle">
                <p>Rooms</p>
            </a></li>
        <!-- <li onmouseover="changeImage('report.svg', 'report')" onmouseout="restoreImage('reportDef.svg', 'report')"><a href="<?php echo BASEURL . '/Nurse/report.php' ?>" target="_self"><img class="icons butbut" id="report"
                                                                                                                                                                                   src=<?php echo BASEURL . '/images/reportDef.svg' ?> alt="report"
                                                                                                                                                                                   align="middle">
                <p>Report</p>

            </a></li>
        <li onmouseover="changeImage('notice-board.png', 'noticeboard')" onmouseout="restoreImage('notice-boardDef.png', 'noticeboard')"><a id="notice" href="<?php echo BASEURL.'/Nurse/nurseNoticeboard.php'?>" target="_self"><img id="noticeboard" class="butbut icons"

            </a></li> -->
        <li onmouseover="changeImage('notice-board.png', 'noticeboard')" onmouseout="restoreImage('notice-boardDef.png', 'noticeboard')"><a id="notice" href="<?php echo BASEURL.'/Nurse/nurseNoticeboard.php'?>" target="_self"><img id="noticeboard" class="butbut icons"

                                            src=<?php echo BASEURL . '/images/notice-boardDef.png' ?> alt="noticeboard"
                                            align="middle">
                <p>Noticeboard</p>
            </a></li>
        <li onmouseover="changeImage('profile.svg', 'profile')" onmouseout="restoreImage('profileDef.svg', 'profile')"><a href="<?php echo BASEURL . '/Nurse/updateNurseProfile.php' ?>"
                                                                                                                          target="_self"><img id="profile"
                                                                                                                                              class="icons butbut" src=<?php echo BASEURL . '/images/profileDef.svg' ?> alt="Profile" align="middle">
                <p>Profile</p>
            </a></li>
    </ul>
</div>

<script>
    function changeImage(imgName, id) {
        let image = document.getElementById(id);
        image.src = '../images/' + imgName;
    }

    function restoreImage(imgName, id) {
        let image = document.getElementById(id);
        image.src = '../images/' + imgName;
    }
</script>