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
            $dati = file_get_contents("appartamenti.csv");

        $part = explode(PHP_EOL, $dati);

       // print_r($part);

      
            $key = $_POST["id_Eliminare"];

            //load file into $fc array

            $fc = file("appartamenti.csv");

            //open same file and use "w" to clear file

            $f = fopen("appartamenti.csv", "w");

            //loop through array using foreach
            
    
            foreach ($fc as $line) {
              if (!strstr($line, $key)) //look for $key in each line
                fputs($f, $line); //place $line back in file
            
          }
            fclose($f);
          }

          test();

          ?>

        </p>

      </div>

    </section>

    <br><br>

</body>



</html>