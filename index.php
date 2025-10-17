<?php

session_start();

if(isset($_SESSION['id'])) {
    
    header("Location: diary.php");
}

if(isset($_POST) && !empty($_POST)) {
    
    require "db.php";
    
     if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
    
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
         
         
         if (!empty($email) && !empty($password) && !empty($username)) {
                
                
            if(isset($_POST["logIn"])) {
                
                $query = "SELECT * FROM `userinfo` WHERE `email` = '".mysqli_real_escape_string($link, $email)."' LIMIT 1";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_fetch_array($result);
                
                if($row) {
                    
                    if(password_verify($password, $row['password']))  {
                        
                        $_SESSION['id'] = $row['id'];
                        
                        $_SESSION['username'] = $row['username'];
                        
                        header("Location: diary.php");
                    }
                        
                        
                    } 
                    
                    
                }  else if(isset($_POST["signUp"])) {
                
                $query = "SELECT `username` FROM `userinfo` WHERE `username` = '".mysqli_real_escape_string($link, $username)."'";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_num_rows($result);
                
                print_r(mysqli_connect_error());
                
                if($row > 0) {
                    
                    echo "That username has been taken. Please choose another.";
                    
                }  else {
                    
                     $query = "SELECT `email` FROM `userinfo` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_num_rows($result);
                    
                    if($row > 0) {
                        
                        echo "That email has been taken, please choose another";
                        
                    } else {
                        
            $query = "INSERT INTO `userinfo` (`username`, `email`, `password`) VALUES('".mysqli_real_escape_string($link, $username)."', '".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."')";
                
                $result = mysqli_query($link, $query);
                        
                        if($result) {
                            
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                        
                        $query = "UPDATE `userinfo` SET `password` = '".mysqli_real_escape_string($link, $hash)."' WHERE `email` = '".mysqli_real_escape_string($link, $email)."' LIMIT 1";
                            
                            $result = mysqli_query($link, $query);
                            
                            echo "Successfully Registered";
                        }
                        
                        
                    }
                    
                    
                }
                
            }
                
                
         
     } else {
         
         echo "Please enter in all fields";
     } 
} 
    
}
    
?>

<html>
    <head>
        <title>Instagram Clone</title>
        
        <link rel="stylesheet" href="styles.css">
    </head>
    
    <body>
        
        <div class="signUpLoginForm">
        
        <h1>Instagram Clone</h1>
        <p>Share Your Pictures</p>
            
            <form method="post">
                
                <input id="usernameforus" name="username" placeholder="Your username">
                
                <br>
                
                <br>
                
                <input type="email" name="email" placeholder="Your Email">
                
                <br>
                
                <br>
                
                <input type="password" name="password" placeholder="Your password">
                
                <br>
                
                <br>
                
                <input id="logInSignUp" type="submit" value="Log-In" name="logIn" data-loginactive="1">
                
                <br>
                <br>
                
                <label for="stayLoggedIn">Stay logged In?</label>
                    <input id="stayLoggedIn" type="checkbox" name="stayLoggedIn">
                
                <br>
                
                <br>
                
                <a id="signUpOrLogin">Don't have an account? Sign up here!</a>
                
                
            </form>
        
        </div>
        
        
        
   <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js.js" type="text/javascript"></script>
   
    </body>
</html>