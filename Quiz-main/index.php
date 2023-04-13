
<?php  session_start();ob_start();
  if(!isset($_SESSION['username'])){
    ?>
    <script>
        alert("You are loged out login again");
    </script>
     <?php
  
      header('location:login.php');
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 
</head>
<body>

 

<header class="header" id="header">
    <nav class="nav container">
    <span class="avtar" style="font-weight:bold;"> <?php echo   $_SESSION['username'][0];  ?>  </span>
    <div class="nav_menu" id="nav_menu">
 
    <ul class="nav_list">
    <i class="uil uil-times close"></i>
            <li class="nav_item"><span class="nav_icon"> <i class="uil uil-user icon"></i></span><a href="#home" class="nav_link">Home</a></li>
            <li class="nav_item"><span class="nav_icon"> <i class="uil uil-desktop icon"></i></span><a href="#about" class="nav_link">About</a></li>
            <li class="nav_item"><span class="nav_icon"> <i class="uil uil-grid icon"></i></span><a href="#document" class="nav_link">Document</a></li>
            <li class="nav_item"><span class="nav_icon">  <i class="uil uil-phone icon"></i> </span><a href="#contact" class="nav_link">Contact</a></li>
        </ul>

         
    </div>
    <div class="header_btns">  
 <a  href="logout.php" class="btn ms  black">LOG OUT</a>
 
</div>

<i class="ri-menu-line menu"></i>
    </nav>
</header>
 
<section class="home " id="home">
    <button class="btn black button start_btn">START QUIZ</button> 

    <div class="rules_popup">
    <div class="popup_content">
        <div class="popup_header">Some Rules of this Quiz</div>  
        <div class="rules">
            <label class="rule">1. You will have only <span style="color: rgb(61, 92, 228);">15 seconds</span> per each question.</label>
            <label class="rule">2. Once you select your answer, it can't be undone.</label>
            <label class="rule">3. You can't select any option once time goes off.</label>
            <label class="rule">4. You can't exist from the Quiz while you're playing</label>
            <label class="rule">5. You'll get points on the basis of your correct answers</label>
        </div>
        <div class="popup_footer">
            <div class="footer_btns">
                <button class="btn white exit_btn">Exit Quiz</button>
                <button class="btn  black continue_btn">Continue</button>
            </div>
        </div>
    </div>
    </div>



    <div class="quiz_popup">
        <div class="quiz_content">
            <div class="quiz_header"> 
                <div class="header_title">Awesome Quiz Application</div>
                <div class="timer_count">
                    <span class="timer_left">Timer left</span>
                      <span class="time">15</span>
                </div>
 
            </div>  
            
            <div class="quiz">
                <div class="question">

                </div> 
                <div class="options">
        
                </div>
            </div>
            <div class="quiz_footer">
                  <div class="total_queue">  
                    
                </div>
                  <button class="btn black nextbtn">Next Que</button>
            </div>
        </div>
        </div>


   

        <div class="result_popup">
            <div class="result_content">
                <div class="reward_img">
                   <img src="reward.png" alt="" srcset="">
                  </div>  

                  <div class="complete_text">You have completed the Quiz!</div>
                  <div class="score_text">
                   
                  </div>
                  <div class="buttons">
                    <button class="btn restart">Replay Quiz</button>
                    <button class="btn black quit">Quit Quiz</button>
                  </div>
            </div>

            </div>
</section>

<!-- ======================= about====================== -->


<section class="about section container" id="about">
     <h3 class="section_title">about us</h3>
 
</section>


 
<!-- ========================Products====================== -->


<section class="document  section container" id="document">
<h3 class="section_title">Document</h3>
</section>

<!-- ========================contact====================== -->


<section class="contact section container" id="contact">
<h3 class="section_title">contact us</h3>
</section>

 

  <!-- ========================  footer===================== -->
 <footer class="footer_section">
 
 </footer>

<script src="js/main.js"></script>
<script src="js/questions.js"></script>
</body>
</html>