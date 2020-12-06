<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>APPARTAMENTI</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
  <script src='main.js'></script>
</head>

<body>
  <div class="container">
    <!-- barra di navigazione -->
    <nav class="nav">
      <h2 class="logo"><img src="img/Logo.jpg" alt="" height="90px" width="90px" /></h2>
      <ul class="menu">
        <!-- ho inserito 3 possibili pagine web in alto a destra -->
        <li><a href="index.php">Home</a></li>
        <li><a href="Modifica.html">Modifica</a></li>
        <li><a href="lettura.php">Ordini</a></li>
      </ul>
    </nav>
    <section class="center">
      <div class="content">
        <h2>Dati inviati correttamete:</h2>
        <p>

          <?php





          function test()
          {
            
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
            }

            // Allow certain file formats
            if (
              $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif"
            ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }


            
            $id = $_POST["id"];
            $titolo = $_POST["titolo"];
            $luogo = $_POST["luogo"];
            $città = $_POST["città"];
            $via = $_POST["via"];
            $descrizione = $_POST["descrizione"];


            $file = fopen("write", "a");
            fwrite($file, "$id | $titolo | $luogo | $città | $via | $descrizione");
            fwrite($file, "\r\n");
            fclose($file);
            echo file_get_contents("write");
          }
          test()



          ?>
        </p>
      </div>
    </section>
    <br><br>
</body>

</html>