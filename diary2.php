<?php
session_start();

require "db.php";

if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    
    header ("Location: index.php");
    
    
} else {
    
    
    
    echo "Logged-In";
    
    $userID = $_SESSION['id'];
    
     
    
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
            
            
            
            
            <?php 
            
            $query = "SELECT `following` FROM `isfollowing` WHERE `follower`='".$userID."'";
            
                $result = mysqli_query($link, $query);
            
            $orClause = "";
            
                 while($row = mysqli_fetch_array($result)) {
                     
                   $orClause .= " OR userid='".$row['following']."'";
                     
                     
                 }
            
            echo $orClause;
            
            
            $query = "SELECT * FROM `userposts` WHERE userid='$userID' $orClause ORDER BY id DESC";  
    
                $result = mysqli_query($link, $query);
    
                    
            
            while($row = mysqli_fetch_array($result)) {
        
    echo '<div class="finalPost">
                
                <div class="postHeader"><p>'.$_SESSION["username"].'</p></div>
                
                <div class="image-container">
                    
                    <img src="data:image/jpeg;base64,'.base64_encode($row['post']).'" width=100% /> 
                    
                </div>
                
                <p>'.$row["caption"].'</p>
            </div>';
        
        
        }
            ?>
            

        </div>
        
       
        
        
       
        
        
   <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js.js" type="text/javascript"></script>
   
    </body>
</html>