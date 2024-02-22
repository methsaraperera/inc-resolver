<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">


<link rel="stylesheet" href="styles.css">
<title>INC Resolver - Home</title>
<style>
    
</style>
</head>
<body>

<div class="navbar">
    <h2 class="navbar-title">BMCC Task Tracker - Home</h2>
    <div class="navbar-buttons">
        <button class="navbar-button">Home</button>
        
        <button class="navbar-button">Sign In</button>
    </div>
</div>
<div class="full-screen-container">
    <div class="form-container">
        <h2>Sign Up</h2>
          <form method="POST" class="flex-form" action="php/signup.php" enctype="multipart/form-data">
          
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname">

            <label for="cunyid">CUNY First ID</label>
            <input type="number" id="cunyid" name="cunyid">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <label for="re-password">Re-enter Password</label>
            <input type="password" id="re-password" name="re-password">
        
            <input type="submit" class="form-button" name="Register" value="Register">

            
          </form>   
    </div>
</div>

<script src="js/watson.js"></script>

</body>
</html>
