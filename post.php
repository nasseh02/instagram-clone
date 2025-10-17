<?php

session_start();

require "db.php";

if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    
    header ("Location: index.php");
    
    
} else {
    
    if(isset($_POST['userUpload'])) {
        
        $file = addslashes(file_get_contents($_FILES["userImage"]["tmp_name"]));
        
        $caption = $_POST['userCaption'];
        
        $query = "INSERT INTO `userposts` (`userid`,`post`, `caption`) VALUES ('".$_SESSION['id']."','$file', '$caption')";  
      if(mysqli_query($link, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
        
        
    }
    
    
    
    

    







?>

<html>
    <head>
        <title>Secrect-Diary - Logged In</title>
        
        <link rel="stylesheet" href="styles.css">
    </head>
    
    <body>
        
        
        <div class="container">
        
        <div class="navbar">
            
            <a href="diary.php" id="home">Home</a>
            
            <div id="Search">
            <form method="get" action="usersProfile.php">
            <input name="searchPostsUser" id="searchPostsUser">
                </form>
            </div>
            
            <div class="far-left"> 
                
                
            <a href="logout.php" id="logOut">Logout</a>
            <a href="profile.php" id="userProfile">Profile</a>
                <a href="Post.php" id="UserPost">Post</a>
            </div>
        
        </div>
            
            
            <div id="postProcess">
                <h1>Upload Your Picture and Caption</h1>
                
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="userImage" id="userImage">
                    
                    <br>
                    
                    <br>
                    
                    <input id="userCaption" name="userCaption">
                    
                    <br>
                    
                    <br>
                    
                    <input type="submit" id="userUpload" name="userUpload" value="upload">
                    
                
                
                </form>
                
                 
                
            </div>
            

        </div>