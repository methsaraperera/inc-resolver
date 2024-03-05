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
        <!--<div class="dashboard">
            <div class="card">
                <h3></h3>
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
        </div>-->

        

        <div class="task-container">
            <div class="task-heading">Assigned Students</div>
            <div class="task-divider"></div>
            <?php
            $q2 = mysqli_query($conn, "SELECT classid FROM instructor_class WHERE instructor_cunyid='$uid';");
            if(mysqli_num_rows($q2) > 0){
                while ($newq2 = mysqli_fetch_assoc($q2)) {
                    $classid = $newq2['classid'];
                    $q3 = mysqli_query($conn,"SELECT subject, unit, section, classname, semester_term, semester_year FROM class WHERE classid='$classid';");
                    if(mysqli_num_rows($q3)>0){
                        while($newq3 = $q3->fetch_assoc()){
                            $subject = $newq3['subject'];
                            $unit = $newq3['unit'];
                            $section = $newq3['section'];
                            $classname = $newq3['classname'];
                            $semester_term = $newq3['semester_term'];
                            $semester_year = $newq3['semester_year'];
                            // class n of n inactive - not implimented yet
                            echo '<div class="task-divider"></div> 
                            <div class="task-subheading">
                                <div>'. $subject ." ". $unit ." : ". $section ." - ". $classname ." ". $semester_term ." ". $semester_year . '</div>
                                <div>Class 1 of 2</div> 
                            </div>';
                            
                            $q4 = mysqli_query($conn,"SELECT student_id, grade, last_day FROM student_class WHERE classid='$classid';");
                            if(mysqli_num_rows($q4)>0){
                                while($newq4 = $q4->fetch_assoc()){
                                    $stu_id=$newq4['student_id'];
                                    $stu_grade=$newq4['grade'];
                                    $stu_last_day=$newq4['last_day'];
                                    $q5 = mysqli_query($conn,"SELECT fname, lname FROM student WHERE cunyid='$stu_id';");
                                    if(mysqli_num_rows($q5)>0){
                                        while($newq5 = $q5->fetch_assoc()){
                                            $stu_fname=$newq5['fname'];
                                            $stu_lname=$newq5['lname'];
                                            echo '<div class="task-line">
                                                <div class="div1"><li>'.$stu_fname.' '.$stu_lname.'</li></div>
                                                <div class="div2">Due: '.$stu_last_day.'</div>
                                                <div class="div3">'.$stu_grade.'</div>
                                                <div class="div4">
                                                    <button class="task-btn" onclick="window.location.href=\'view-student.php?class='.$classid.'&sid='.$stu_id.'\'">
                                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                    </button>
                                                </div> 
                                                <!-- progress bar is not functional yet -->
                                                <div class="progress-container div1">
                                                    <div class="progress-bar" style="width: 60%;">60%</div>
                                                </div>
                                                
                                            </div>';
                                        }
                                    }

                                }

                            }                           

                        }

                    }
                }
                


            }

            ?>

        <!--
            <div class="task-heading">Assigned Students</div>
            <div class="task-divider"></div>
            <div class="task-subheading">
                <div>CSC 211H - Advanced Programming Technique Honors - Fall 2023</div>
                <div>Class 1 of 3</div>
            </div>
            
            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href='edit-assignment.php'">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 60%;">60%</div>
                </div>
                
                
            </div>
            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 2%;">2%</div>
                </div>
            </div>

            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 99%;">99%</div>
                </div>
            </div>

            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 78%;">78%</div>
                </div>
            </div>


            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 45%;">45%</div>
                </div>
            </div>

            <div class="task-subheading">
                <div>CSC 211H - Advanced Programming Technique Honors - Fall 2023</div>
                <div>Class 1 of 3</div>
            </div>
            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 23%;">23%</div>
                </div>
            </div>

            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 10%;">10%</div>
                </div>
            </div>

            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 90%;">90%</div>
                </div>
            </div>

            <div class="task-line">
                <div class="div1"><li>John Doe</a></li></div>
                <div class="div2">Due: May 06 2024</div>
                <div class="div4">
                    <button class="task-btn" onclick="window.location.href=#">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </button>
                </div>
                <div class="progress-container div1">
                    <div class="progress-bar" style="width: 75%;">75%</div>
                </div>
            </div>-->
            <!--
            <div class="task-line">
                <div><li>Annie Norton</li></div>
                <div>Open</div>
                <div>Deadline: May 06 2024</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 20%;">20%</div>
                </div>
            </div>
            <div class="task-line">
                <div><li>Jermaine Bush</li></div>
                <div>Open</div>
                <div>Deadline: May 06 2024</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 35%;">35%</div>
                </div>
            </div>
            <div class="task-line">
                <div><li>Josiah Castro</li></div>
                <div>Open</div>
                <div>Deadline: May 06 2024</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 60%;">60%</div>
                </div>
            </div>

            <div class="task-divider"></div>

            <div class="task-subheading">
                <div>CSC 101 - Principles in Information Technology and Computatio - Fall 2023</div>
                <div>Class 2 of 3</div>
            </div>

            <div class="task-line">
                <div><li>Alisha Wallace</li></div>
                <div>Open</div>
                <div>Due: May 06 2024</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 50%;">50%</div>
                </div>
            </div>
            <div class="task-divider"></div>
            <div class="task-subheading">
                <div>CSC 101 - Principles in Information Technology and Computatio - Summer 2023</div>
                <div>Class 3 of 3</div>
            </div>

            <div class="task-line">
                <div><li>Gerardo Santos</li></div>
                <div>Open</div>
                <div>Due: May 06 2024</div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 80%;">80%</div>
                </div>
            </div>
-->
        
        
        </div>
    </div>
    <div class="right-panel">
        <br>
        <div class="menu">
            
            <div class="task-heading">Menu</div>
            <div class="rightbar-divider"></div>
            
            <!--<div class="task-subheading">
                <div>There will be a menu here</div>
                
                
            </div>-->
           
       
            <div class="rightbar-buttons">
                <button class="rightbar-button" onclick=window.location.href="add-student.php">Add a student</button>
                <div class="rightbar-divider"></div>
                <button class="rightbar-button">Assignments</button>
                <button class="rightbar-button">Classes</button>
               
            </div>
            <!--<div class="task-line">
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
            </div>-->
            
        </div>

        
        <!--<h2>25% Width Body</h2>
        <p>This is the sidebar content area which occupies 25% of the screen width.</p>-->
    </div>
</div>

<div class="footer">
    <p class="footer-content">Copyright © Methsara Perera - Tech Innovation Hub Internship @ BMCC Tech Learning Community </p>
</div>

<script src="js/watson.js"></script>
<script src="https://kit.fontawesome.com/137463bc4f.js" crossorigin="anonymous"></script>

</body>
</html>
