<?php

        $user = "root";
        $dbpassword = ""; 
        $db = "instagramclone";
        
        
    $link = mysqli_connect("localhost", $user, $dbpassword, $db);

        if(mysqli_connect_errno()) {
            
            print_r(mysqli_connect_error());
            exit();
        }

?>