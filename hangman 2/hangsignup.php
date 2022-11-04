<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
 
?>
    
<!doctype html>
    
<html lang="en">
  
<head>

</head>
    
<body>
    
<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
    
<div class="container my-4 ">
    
    <h1 class="text-center">Signup Here</h1> 
    <form action="hangsignup-submit.php" method="post">
    
        <div class="form-group"> 
            <label for="Username">Username</label> 
        <input type="text" class="Input" name="Username">    
        </div>
    
        <div class="form-group"> 
            <label for="Password">Password</label> 
            <input type="Password" class="form-control" name="Password"> 
        </div>
    
        <button type="submit" class="btn btn-primary">
        SignUp
        </button> 
    </form> 
</div>
</body>
</html>