<?php
require_once('config.php');
?>

<?php

 if(isset($_POST)){
          
          $name     = $_POST['name'];
          $email    = $_POST['email'];
          $con_number = $_POST['con_number'];
          $message = ($_POST['message']);

          $sql = "INSERT INTO contact(name, email, con_number, message) VALUES(?,?,?,?)";
          $stmtinsert = $db->prepare($sql);
          $result = $stmtinsert->execute([$name, $email, $con_number, $message]); 

          if ($result) {
    
          echo 'Successfully Submitted!';
         } else {
    
          echo 'There were error while saving the data';
               }

          
}else{
    echo 'No Data';
}
