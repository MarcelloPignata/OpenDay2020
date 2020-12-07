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

        

        <p>



          <?php



          function test()

          {

            $filename = basename($_FILES["fileToUpload"]["name"]);

            

            $target_dir = "img/";

            $target_file = $target_dir . $filename;

            $uploadOk = 1;

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image

            if (isset($_POST["submit"])) {

              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

              if ($check !== false) {              

                $uploadOk = 1;

              } else {

               

                $uploadOk = 0;

              }

            }

            // Check if file already exists

            if (file_exists($target_file)) {

              

              $uploadOk = 0;

            }



            // Allow certain file formats

            if (

              $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

              && $imageFileType != "gif"

            ) {

              

              $uploadOk = 0;

            }

            // Check if $uploadOk is set to 0 by an error

            if ($uploadOk == 0) {

            

              // if everything is ok, try to upload file

            } else {

              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

               
              } else {

              

              }

            }



            /* $id = $_POST["id"];

            $titolo = $_POST["titolo"];

            $prezzo = $_POST["prezzo"];

            $luogo = $_POST["luogo"];

            $posti = $_POST["posti"];

            $descrizione = $_POST["descrizione"]; */

            $Id_eliminare = $_POST["Id_eliminare"];
            
            $Id_trovato = 0;

            $datilettura = file_get_contents("read");

            $part = explode(PHP_EOL, $datilettura);
 
            for ($i = 0; $i <= count($part)-1; $i++) {

                $var = explode('|', $part[$i]);

                if($Id_eliminare == $part[$0])
                {
                    $Id_trovato = $part[$0];
                }

            }

            fclose($file);


            $file = fopen("write", "a");

            for($i = 0; $i <= count($part)-1; $i++){
                $var = explode('|', $part[$i]);
                if($Id_eliminare == $part[$0])

            }

            fwrite($file, "\r\n");

            fwrite($file, "$id|$titolo|$filename|$luogo|$prezzo|$posti|$descrizione");

            fclose($file);

            echo "I DATI SONO STATI ELIMINATI";
          

          

          test()







          ?>

        </p>

      </div>

    </section>

    <br><br>

</body>



</html>