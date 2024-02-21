<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECE Department Library</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
    
    /* Custom CSS */
    

    #main_content {
      /* Add your styles for main_content here */
      width: 99%; /* Example width */
      padding: 120px; /* Example padding */
      background-color: #f8f9fa; /* Example background color */
    }
  
    </style>
</head>
<body>

<div class="header">
    <div class="logo"><img src="logo.png" alt="Logo"></div>
    <h1>ECE Department Library</h1> <!-- Heading without typing effect -->
</div>

<div class="nav-bar">
    
        <!-- Your navigation links -->
        <a href="search.php" class="btn btn-light">Search Book</a>
        <a href="request_book.php" class="btn btn-light">Request a Book</a>
        <a href="donation.php" class="btn btn-light">Book Donation</a>
        <a href="ebook.html" class="btn btn-light">E-books Section</a>
        <a href="suggest.php" class="btn btn-light">Suggestions</a>
                
        <a href="latest.html" class="btn btn-light">Latest Updates</a>
    
    <a href="signup.php" class="login-button">sign up</a>
    <a href="index.php" class="login-button">Login</a>
    <a href="admin/index.php" class="login-button">Admin</a>
</div>

<div class="col-md-8" id="main_content">
            <center><h3><u>User Login Form</u></h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div><br>
                <button type="submit" name="login" class="btn btn-primary">Login</button> |
                <a href="signup.php"> Not registered yet ?</a>  
            </form>
            <?php 
                if(isset($_POST['login'])){
                    $connection = mysqli_connect("localhost","root","root");
                    $db = mysqli_select_db($connection,"lms");
                    $query = "select * from users where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] =  $row['name'];
                                $_SESSION['email'] =  $row['email'];
                                $_SESSION['id'] =  $row['id'];
                                header("Location: user_dashboard.php");
                            }
                            else{
                                ?>
                                <br><br><center><span class="alert-danger">Wrong Password !!</span></center>
                                <?php
                            }
                        }
                    }
                }
            ?>
        </div>


<div class="footer">
    © 2024 ECE Department Library. All rights reserved.
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
