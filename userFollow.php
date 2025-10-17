<?php

session_start();

require "db.php";

if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    
    header ("Location: index.php");
    
    
} else {
    
 $followTrack = $_POST['followTrack'];
    
    $userId = $_POST['userId'];
    
    if($followTrack == 1) {
        
        $query = "INSERT INTO `isfollowing` (`follower`,`following`) VALUES('".$_SESSION['id']."','".$userId."')";
        
        $result = mysqli_query($link, $query);
        
        echo "Unfollow";

        
    } else {
        
        $query = "DELETE FROM `isfollowing` WHERE `follower`='".$_SESSION['id']."' AND `following`='".$userId."'";
        
        $result = mysqli_query($link, $query);
        
        echo "Follow";
        
    }
    
}
    





?>