<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rgister</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> 
    <link rel="stylesheet"  href="css/style.css">
    
</head>
<body>
    
<?php 

include 'conn.php';

if(isset($_POST['submit'])){
 
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
 
     $pass = password_hash($password ,PASSWORD_BCRYPT);
     $cpass = password_hash($cpassword ,PASSWORD_BCRYPT);

    $emailquery = "select * from  user  where email ='$email'";
    $query = mysqli_query( $con,$emailquery);
    $emailcount = mysqli_num_rows( $query);

    if($emailcount > 0){ 
            ?>
            <script>
            alert("Email alerady exist");
                </script>
            
            <?php 
    }else{
      
        if($password === $cpassword){
           
        $insertquery = "insert into user(username,email,phone,password,cpassword)
        values('$username','$email','$phone','$pass','$cpass')";

        $iquery = mysqli_query($con ,$insertquery);

        if($iquery){
            header('location:login.php');
            $_SESSION['msg'] = "registeration succesful please log in";
             
        }else{
            ?>
            <script>
            alert(" No inserted  ");
                </script>
            
            <?php 
      
        }


        }else{
        ?>
        <script>
        alert("password are not match");
            </script>
        
        <?php 
    }   
    
}
}

?>
   <br><br>
<div class="form_container container"  > 
    <div class="form_content"> 
<div class="top_info">
        
        <h2 class="form_title">Sign In</h2> 
          
        </div> 
    <form action=""   method="POST" >
    <div class="form_input"> 
        <input type="text" placeholder="Full name" name="username" class="input" required>
    </div>
    <div class="form_input"> 
        <input type="email" placeholder="Emial address" name="email" class="input" required>
    </div>
    <div class="form_input"> 
        <input type="mobiles" placeholder= "Phone Number" name="phone" class="input" required>
    </div>
    <div class="form_input"> 
        <input type="password" placeholder="Create password"name="password"  class="input" required>
    </div>
    <div class="form_input"> 
        <input type="password" placeholder=" Confirm password" name="cpassword" class="input" required> 
</div>  
    <button type="submit"  class="button account" name="submit">Create account</button> 

    <p class="login">have an account? <a href=" login.php" style="color:royalblue;" >login</a></p>
    </form>

</div>
</div>
</body>
 
</html>
