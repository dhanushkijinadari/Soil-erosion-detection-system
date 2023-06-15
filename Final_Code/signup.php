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
                <span>Welcome ! <br>Create your account here</span>
            </div>

            <div class="wrapper">
                <form action="signup.php" method="POST">
                    <input type="text" placeholder="Username" id="username" name="username" required>
                    <input type="text" placeholder="Name" id="name" name="name" required>
                    <input type="text" placeholder="email" id="email" name="email" required>
                    <select id="district" id="district" name="district" required>
                        <option value="">Choose your District</option>
                        <option value="C">Colombo</option>
                        <option value="K">Kalutara</option>
                        <option value="G">Gampaha</option>
                    </select>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <!--<input type="password" placeholder="Re-Enter Password">-->
                
                <div class="terms">
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox"><span>I agree to this <a href="#">Terms & Conditions</span></a></label>
                </div>
                <br>
                
                <input type="submit" class="btn" id="signup" name="create" value="Sign Up">
               </form>
                <div class="member">Already a user ? <a href="login.php">Sign in here</a></div>
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
        $('#signup').click(function(e){
        var valid = this.form.checkValidity();

        if(valid){
            var username = $('#username').val();
            var name     = $('#name').val();
            var email    = $('#email').val();
            var district = $('#district').val();
            var password = $('#password').val();

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'process.php',
                
                data: {
                    username: username,
                    name: name,
                    email: email,
                    district: district,
                    password: password
                },
                success: function(data){
                    Swal.fire({
                        title: 'Successfully Signed Up!',
                        text: 'You have Successfully Signed Up to the System!',
                        type: 'success'
                    }).then(function() {
                       window.location.href = 'login.php';
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
