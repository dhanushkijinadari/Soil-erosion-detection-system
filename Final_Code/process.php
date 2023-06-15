<?php
require_once('config.php');
?>

<?php

 if(isset($_POST)){
          $username = $_POST['username'];
          $name     = $_POST['name'];
          $email    = $_POST['email'];
          $district = $_POST['district'];
          $password = $_POST['password'];

          $sql = "INSERT INTO user(username, name, email, district, password) VALUES(?,?,?,?,?)";
          $stmtinsert = $db->prepare($sql);
          $result = $stmtinsert->execute([$username, $name, $email, $district, $password]); 

          if ($result) {
    
          echo 'Registration successful!';
         } else {
    
          echo 'There were error while saving the data';
               }

          
}else{
    echo 'No Data';
}
