<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
   
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
</head>
<body>
  <header>
    <a href="index.html" class="logo"><img src="img/Logo (2).png"></a>
    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
      <li><a href="index.html">Home</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="info.html">Info</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </header>

  <!---info Start------>
  <section class="info" id="info">
    <div class="rectangle">
      <div class="heading">
        <br>

        <span>Upload image here</span>
      </div>

      <div class="upload_container">

          <div class="upload_card">
            <div class="drop_box">
              <h4>Select File here</h4>
              <p>Files Supported: JPEG, PNG</p>
              <input type="file" name="file" accept=".jpeg, .png" id="fileID" style="display:none;">
              <button class="btn">Choose File</button>
            </div>
          </div>

        <div class="note" style="color: black; margin-top: 100px; font-weight: 400px;">
          <h3><b>Note:</b></h3>
          <p><b>Image Size       :</b> Image file size should be less than 5 MB.</p>
          <p><b>Image Format     :</b> Image formats can be JPEG or PNG.</p>
          <p><b>Image Orientation:</b> Check the orientation of the image is correctly aligned.</p>
          <p><b>Image Quality    :</b> Make sure to provide a good quality image for more accurate result.</p>
        </div>
      </div>
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
        </div>
      </div>
    </div>
  </section>

  <!---JS---->
  <script type="text/javascript" src=""></script>
  <script type="text/javascript">
    const dropArea = document.querySelector(".drop_box");
    const button = dropArea.querySelector("button");
    const dragText = dropArea.querySelector("header");
    const input = dropArea.querySelector("input");

    button.onclick = () => {
      input.click();
    };

    input.addEventListener("change", function (e) {
      var fileName = e.target.files[0].name;
      let filedata = `
        <form>
          <div class="form action="upload_img.php" method="post" enctype="multipart/form-data"">
            <h4>${fileName}</h4>
            <input type="email" placeholder="Enter email to upload file">
            <button class="btn">Upload</button>
          </div>
        </form>`;
      dropArea.innerHTML = filedata;

      const uploadButton = dropArea.querySelector(".btn");
      uploadButton.addEventListener("click", function (event) {
        event.preventDefault();
        // Perform any necessary validation or processing here

        // Get the selected file
        const file = input.files[0];

        // Create FormData object to send the file to the PHP script
        const formData = new FormData();
        formData.append("file", file);

        // Send the file to the PHP script using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "upload_img.php");
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Redirect to result.html
              window.location.href = "result.html";
            } else {
              console.log("File upload failed");
            }
          }
        };
        xhr.send(formData);
      });
    });
  </script>
</body>
</html>
