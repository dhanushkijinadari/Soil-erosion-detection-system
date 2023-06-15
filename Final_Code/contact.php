<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Soil Erosion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    
        <!--icons-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <div>
        <?php
       
              
        
        ?>


    </div>

        <header>
            <a href="index.html" class="logo"> <img src="img/Logo (2).png"></a>
            <div class="bx bx-menu" id="menu-icon"></div>
    
            <ul class="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="info.html">Info</a></li>
                <li><a href="contact.php">Contact</a></li>
    
            </ul>
        </header>
    
    
        <!---Form Start------>
        <section class="type" id="type">
            <div class="heading">
                <br>
                <span>Contact Us</span>
            </div>

            <div class="wrapper_contact">
                <form action="contact.php" method="post">
                  <input type="text" placeholder="Your name" id="name" name="name" required>
                  <input type="text" id="email" name="email" placeholder="Your email" required>
                  <input type="text" id="con_number" name="con_number" placeholder="Contact Number" >
                  <textarea id="message" name="message" placeholder="Message" style="height:100px ; width: 80%;" required ></textarea>
              
                  <input type="submit" value="Submit" id="submit" class="btn" name="create" >
              
                </form>
              </div>
    
        </section>
    
        <!---Footer Start------>
        
        <section id="contact">
            <div class="footer">
                <hr><br>
                <div class="main">
                    <div class="col">
                        <h4>Quick Links</h4>
                        <ul>
                            <li style="display: inline"><a href="index.html">Home</a></li>
                            <li style="display: inline"><a href="signup.php">Sign Up</a></li>
                            <li style="display: inline"><a href="login.php">Login</a></li>
                            <li style="display: inline"><a href="info.html">Info</a></li>
                            <li style="display: inline"><a href="contact.php">Contact</a></li>
                        </ul>
    
                        <div class="copyright">
                            <br><p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by FOT/ICT/2018B3 - 11
                                .
                              </p>
                        </div>
                      </div>
                    </div>
                </div>
        </section>
    
        <!---JS---->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
        $(function(){
        $('#submit').click(function(e){
        var valid = this.form.checkValidity();

        if(valid){
            
            var name        = $('#name').val();
            var email       = $('#email').val();
            var con_number  = $('#con_number').val();
            var message     = $('#message').val();

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'con_process.php',
                
                data: {
                    
                    name: name,
                    email: email,
                    con_number: con_number,
                    message: message
                },
                success: function(data){
                    Swal.fire({
                        title: 'Successfully Submitted!',
                        text: 'You have successfully submitted your message!',
                        type: 'success'
                    }).then(function() {
                       window.location.href = 'index.html';
                    });

                },
                error: function(data){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                        type: 'error'
                    });
                }
            });
        } else {
            // Handle form validation errors if needed
        }
    });
});

    
        </script>
    </body>
    </html>
