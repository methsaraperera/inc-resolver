<?php
session_start();
require_once "config.php";
if(!isset($_SESSION['uid'])){ // checking if the session is implimented
   // header("location: index.php"); 
}
$uid = $_SESSION['uid']; // session key = user id which is used to access the database

$q1 = mysqli_query($conn,"SELECT fname, lname FROM student WHERE cunyid='$uid';");
if(mysqli_num_rows($q1) > 0){
    $newq1 = mysqli_fetch_assoc($q1);
    $fname = $newq1['fname'];
    $lname = $newq1['lname'];
}
/*
$q2 = mysqli_query($conn,"SELECT classid, grade, last_day FROM student_class WHERE student_id=''$uid';");
if(mysqli_num_rows($q2) > 0){
    $newq2 = my
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">


<link rel="stylesheet" href="styles.css">
<title>Student Home</title>
<style>
    
</style>
</head>
<body>

<div class="navbar">
    <h2 class="navbar-title">BMCC Task Tracker - Student View</h2>
    <div class="navbar-buttons">
        <button class="navbar-button">Profile</button>
        <button class="navbar-button">Logout</button>
        <!--<button class="navbar-button"></button>-->
    </div>
</div>

<div class="container">
    <div class="left-panel">
        <!--<h2>Dashboard</h2>-->
        <div class="dashboard">
            <div class="card">
                <h3>Extended Classes</h3>
                <p>CSC 211H Advanced Programming Technique Honors</p>
                <p>PHY 215 University Physics 1</p>
                <p class="card-bottom-text">Total Classes: 2</p>
            </div>
            <div class="card">
                <h3>Days Remaining</h3>
                <p>CSC 211H. 90 Days Remaining</p>
                <p>PHY 215. 90 Days Remaining</p>
            </div>
            <div class="card">
                <h3>Tasks Remaining</h3>
                <p>CSC 211H : 5 Tasks Remaining</p>
                <p>PHY 215 : 1 Task Remaining</p>
            </div>
        </div>
        <div class="task-container">
            <div class="task-heading">Assigned Tasks</div>
            <div class="task-divider"></div>
            <div class="task-subheading">
                <div>CSC 211H - Advanced Programming Technique Honors</div>
                <div>Class 1 of 2</div>
            </div>
            <div class="task-line">
                <div><li>Assignment 6</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
                <div class="status completed">Completed</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 7</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
                <div class="status completed">Completed</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 8</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
                <div class="status completed">Completed</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 9</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
                <div class="status not-completed">Not Completed</div>
            </div>

            <div class="task-line">
                <div><li>Final Project</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
                <div class="status not-completed">Not Completed</div>
            </div>

            <div class="task-divider"></div>

            <div class="task-subheading">
                <div>PHY 215 - University Physics 1</div>
                <div>Class 2 of 2</div>
            </div>

            <div class="task-line">
                <div><li>Final Exam</li></div>
                <div>Open</div>
                <div>Due: May 6 2024</div>
                <div>100</div>
                <div class="status not-completed">Not Completed</div>
            </div>
            
        </div>
    </div>
    <div class="right-panel">
        <!--<div class="task-container">
            <div class="task-heading">Assigned Tasks</div>
            <div class="task-divider"></div>
            <div class="task-subheading">
                <div>CSC 211H - Advanced Programming Technique Honors</div>
                <div>Class 1 of 2</div>
            </div>
            <div class="task-line">
                <div><li>Assignment 6</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 7</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 8</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
            </div>

            <div class="task-line">
                <div><li>Assignment 9</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
            </div>

            <div class="task-line">
                <div><li>Final Project</li></div>
                <div>Open</div>
                <div>Due: Feb 28 2024</div>
                <div>100</div>
            </div>

            <div class="task-divider"></div>

            <div class="task-subheading">
                <div>PHY 215 - University Physics 1</div>
                <div>Class 2 of 2</div>
            </div>

            <div class="task-line">
                <div><li>Final Exam</li></div>
                <div>Open</div>
                <div>Due: May 6 2024</div>
                <div>100</div>
            </div>
            
        </div>

        
        <h2>25% Width Body</h2>
        <p>This is the sidebar content area which occupies 25% of the screen width.</p>-->
    </div>
</div>

<div class="footer">
    <p class="footer-content">Copyright © Methsara Perera - Tech Innovation Hub Internship @ BMCC Tech Learning Community </p>
</div>
<script src="js/watson.js"></script>


</body>
</html>
