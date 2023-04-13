<?php session_start(); ob_start(); ?>
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
 
    
<?php 

include 'conn.php';

 if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailserch = " select * from  user where email = '$email'";
    $query = mysqli_query($con,$emailserch);

     $emailcount = mysqli_num_rows($query);

     if($emailcount){
        
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];
        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode){

            if(isset($_POST['remberme'])){
                 
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
                 ?> 
                <script>
                alert( "Login successful");
    
                location.replace("index.php");
                    </script>
                
                <?php 
            }else{

                ?>
                <script>
                alert( "Login successful");
    
                location.replace("index.php");
                    </script>
                
                <?php 
            }

        }else{
            ?>
            <script>
            alert("Invalid password");
                </script>
            
            <?php 
        }

     }else{
        ?>
        <script>
        alert("Invalid Email");
            </script>
        
        <?php 
     }

 }
?>
<body  style="overflow-x:hidden;">
 
<div class=" form_container container " style="margin-top:3rem;">
<div class="form_content"> 
<div class="top_info">
        
        <h2 class="form_title">Log In</h2>
        
            <p class="session_msg"   > <?php 
            
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            }else{
                echo $_SESSION['msg'] = " you are logged out please login";
            }        
            
            
            
            ?></p>
        </div> 

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  class="form_inputes" method="POST">
 
   <div class="form_input"> 
       <input type="email" placeholder="Email ID" name="email" class="input"  value="<?php  if(isset($_COOKIE['emailcookie'])){
           echo $_COOKIE['emailcookie'];
       } ?>"required>
   </div> 
   <div class="form_input"> 
       <input type="password" placeholder="Password"name="password"  class="input" value="<?php  if(isset($_COOKIE['passwordcookie'])){
           echo $_COOKIE['passwordcookie'];
       } ?>" required>
   </div>
   
 
   <button type="submit"  class="button account" name="submit">Login Now</button>
 
   <p class="login"> forget your password? don't worry. <a href="recover.php" style="color:royalblue;" >click here</a></p>

  <p class="login"> Not have an account? <a href="signup.php" style="color:royalblue;" > Sign up</a></p>
</form>
</div>
 </div>
</body>
<script src="js/scrollreveal.min.js"></script> 
 <script>
     const sr = ScrollReveal({
     distance: '40px',
     duration:1400,
 
     delay:100,
     reset:true
   });
   

   


   sr.reveal('.about_img,.form_container ',{ origin:'top',  }); 
 
   sr.reveal('.about_data,.login_img',{ origin:'bottom',  }); 
   
  
 </script>
</html>
