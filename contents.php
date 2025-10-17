<?php

session_start();

$user = "root";
        $dbpassword = ""; 
        $db = "secretdiary";
        
        
    $link = mysqli_connect("localhost", $user, $dbpassword, $db);

        if(mysqli_connect_errno()) {
            
            print_r(mysqli_connect_error());
            exit();
        }


if(isset($_POST['entry'])) {
    
                    
               $finalDiaryEntry = $_POST['entry'];
    
                    echo  $finalDiaryEntry;
                
                $query = "UPDATE `diaryentries` SET `entry` = '".mysqli_real_escape_string($link, $finalDiaryEntry)."' WHERE `userid` = '".$_SESSION['id']."' LIMIT 1";
    
                    $result = mysqli_query($link, $query);
    
                        
            }

?>