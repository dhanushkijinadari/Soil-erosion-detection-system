<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
   if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
      $file = $_FILES["file"];

      // File properties
      $filename = $file["name"];
      $filetmp = $file["tmp_name"];

      // Database connection
    $db_user = "root";
    $db_pass = "";
    $db_name = "soilerosion";
      // Create a new PDO instance
      $conn = new PDO('mysql:host=localhost;dbname=' .$db_name. ';charset=utf8', $db_user, $db_pass);

      // Insert the file into the database
      $query = "INSERT INTO images (filename, filepath) VALUES (?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->execute([$filename, $filetmp]);

      // Close the database connection
      $conn = null;

      // Move the uploaded file to a desired location
      $destination = "uploads/" . $filename;
      move_uploaded_file($filetmp, $destination);

      // Return a success response
      echo "File uploaded successfully";
   }
}
?>
