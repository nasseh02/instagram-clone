$(document).ready(function(){  
$("#signUpOrLogin").click(function() {
    
   if ($("#logInSignUp").attr("name") == "logIn") {
       
       $("#logInSignUp").attr("name", "signUp");
       
        $("#signUpOrLogin").text("Have an account? Log In here!");
       
       $("#logInSignUp").val("Sign-Up");
       
      
       
       
       
   } else {
       
       $("#logInSignUp").attr("name", "logIn");
       
        $("#signUpOrLogin").text("Don't have an account? Sign up here!");
       
       $("#logInSignUp").val("Log-In");
       
      
       
   }
   
});
    
});




$("#diaryEntry").keyup(function() {
    
    var diary = $("#diaryEntry").val()
    
    $.ajax({
        method: 'POST',
        url: "contents.php",
        data: {entry: diary},
        success: function(data) {
            console.log(data);
        }
        
        
        
    });
    
    
    
});

$(document).ready(function(){  
      $('#userUpload').click(function(){  
           var user_image = $('#userImage').val();
            var user_caption = $('#userCaption').val();
           if(user_image == '' || user_caption == '')  
           {  
                alert("Please Select Image and provide a caption");  
                return false;  
           }  
           else  
           {  
                var extension = $('#userImage').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#userImage').val('');  
                     return false;  
                }  
           }  
      });  
 });  

$(document).ready(function(){  
   
   $("#follow").click(function() {
      
       if($("#follow").data("track") == 0) {
           
           $("#follow").data("track", 1);
           
            $.ajax({
        method: 'POST',
        url: "userFollow.php",
        data: {followTrack: $("#follow").data("track"), 
               userId: $("#follow").data("user") },   
                
        success: function(data) {
            
            $("#follow").html(data);
            
            console.log(data);
            
        }
        
        
        
    });
           
           
       } else {
           
           $("#follow").data("track", 0);
           
             $.ajax({
        method: 'POST',
        url: "userFollow.php",
        data: {followTrack: $("#follow").data("track"),
               userId: $("#follow").data("user")},    
        success: function(data) {
            
            $("#follow").html(data);
            
            console.log(data);
            
        }
        
        
        
    });
           
       }
       
       
       
   });
    
});


    
    
