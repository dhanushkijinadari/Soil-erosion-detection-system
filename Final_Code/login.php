<?php 
if(isset($_GET['error'])){
?>
 <p class="error"><?php echo $_GET['error']; ?> </p>
<?php
}
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert2.min.css">
<script src="sweetalert2.min.js"></script>

       




    
    </head>
<body>
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
            <span>Welcome Back ! <br>Log in to your account</span>
        </div>

        <div class="wrapper">
            <form action="dblogin.php" method="post">
                
                <input type="text" placeholder="Username" id="username" name="username" required>
                <input type="password" placeholder="Password" id="password"  name="password" required>
           
             <br>
            <button type="submit" class="btn" id="login">Login</button>

        </form>
            <div class="member"><span>Not a user ? <a href="signup.php">Sign up here</span></a></div>
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

  

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'dblogin.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText.trim();
                if (response === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Logged In!',
                        text: 'You have successfully logged in.',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'upload.php';
                    });
                } else if (response === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Incorrect Username or Password',
                        text: 'Please check your username and password',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An unexpected error occurred',
                        confirmButtonText: 'OK'
                    });
                }
            }
        };
        const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
        xhr.send(data);
    });
});


</script>
</body>
</html>
