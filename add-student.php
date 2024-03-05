<?php
session_start();
require_once "config.php";
if(!isset($_SESSION['insid'])){ // checking if the session is implimented
    header("location: index.html"); 
    exit();
}
if(!isset($_SESSION['instructor']) || $_SESSION['instructor'] != true){ // checking if the session is implimented
    header("location: index.html"); 
    exit();
}
$uid = $_SESSION['insid']; 
$q1 = mysqli_query($conn,"SELECT fname, lname FROM instructor WHERE cunyid='$uid';");
if(mysqli_num_rows($q1) > 0){
    $newq1 = mysqli_fetch_assoc($q1);
    $fname = $newq1['fname'];
    $lname = $newq1['lname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">


<link rel="stylesheet" href="styles.css">
<title>INC Resolver - Instructor</title>
<style>
    
</style>
</head>
<body>

<div class="navbar">
    <h2 class="navbar-title">BMCC Task Tracker - Instructor View</h2>
    <div class="navbar-buttons">
        <p><?php echo $fname," ",$lname,'&nbsp&nbsp&nbsp'?></p>
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
                <form method="POST" class="flex-form" action="php/login.php" enctype="multipart/form-data">
                    <label for="sid">Student Id</label>
                    <input type="number" id="sid" name="sid" placeholder="########" required>
                    <label for="class">Select Class</label>
                    <select name="class" id="class" form="carform">
                    <?php 
                    $q2 = mysqli_query($conn, "SELECT classid FROM instructor_class WHERE instructor_cunyid='$uid';");
                    if(mysqli_num_rows($q2) > 0){
                        while ($newq2 = mysqli_fetch_assoc($q2)) {
                            $classid = $newq2['classid']; // Define $classid here
                            $q3 = mysqli_query($conn,"SELECT subject, unit, section, classname, semester_term, semester_year FROM class WHERE classid='$classid';");
                            if(mysqli_num_rows($q3) > 0){
                                while($newq3 = $q3->fetch_assoc()){
                                    $subject = $newq3['subject'];
                                    $unit = $newq3['unit'];
                                    $section = $newq3['section'];
                                    $classname = $newq3['classname'];
                                    $semester_term = $newq3['semester_term'];
                                    $semester_year = $newq3['semester_year'];
                                    echo '<option value="volvo">'. $semester_year ." ". $semester_term ." - ". $subject ." ". $unit ." : ". $section ." - ". $classname .'</option>'; 
                                }
                            }
                        }
                    }
                    ?>
                    </select>
                    <input type="submit" class="rightbar-button" name="Search" value="Search" required>
                    <!--<input type="submit" class="form-button" name="Search" value="Search" required>-->
                </form> 
            </div>
            <div class="card">
                <form method="POST" class="flex-form" action="php/login.php" enctype="multipart/form-data">
                    <label for="class">Class Id</label>
                    <select name="class" id="class" form="carform">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                    <!--<input type="submit" class="form-button" name="Search" value="Search" required>-->
                </form>
            </div>
            <div class="card">
                <h3>Tasks Remaining</h3>
                <p>CSC 211H : 5 Tasks Remaining</p>
                <p>PHY 215 : 1 Task Remaining</p>
            </div>
        </div>

        

        <div class="task-container">
            <div class="task-heading">Assigned Students</div>
            <div class="task-divider"></div>

            <form method="POST" class="flex-form" action="php/login.php" enctype="multipart/form-data">
                <label for="email">Student Id</label>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="test@test.net" required>
            
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type='hidden' id='role' name='role' value= '<?php echo $role; ?>'>
            
                <input type="submit" class="form-button" name="Login" value="Login" required>

            </form>   
            

        
        </div>
    </div>
    <div class="right-panel">
        <div class="menu">
            <p>CLASS: Assigned</p>
            <p>ASSIGNMENTS: Assigned</p>
            <!--
            <div class="task-heading">Menu</div>
            <div class="rightbar-divider"></div>
            
            
           
       
            <div class="rightbar-buttons">
                <button class="rightbar-button">Add a student</button>
                <div class="rightbar-divider"></div>
                <button class="rightbar-button">Assignments</button>
                <button class="rightbar-button">Classes</button>
               
            </div>
                -->
            
        </div>

        
        
    </div>
</div>

<div class="footer">
    <p class="footer-content">Copyright © Methsara Perera - Tech Innovation Hub Internship @ BMCC Tech Learning Community </p>
</div>

<script src="js/watson.js"></script>
<script src="https://kit.fontawesome.com/137463bc4f.js" crossorigin="anonymous"></script>

</body>
</html>
