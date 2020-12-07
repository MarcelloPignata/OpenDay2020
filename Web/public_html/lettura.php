

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

        <h2 class="logo"><img src="img/Logo.jpg" alt="" height="90px" width="90px"/></h2>

        <ul class="menu">

            <!-- ho inserito 3 possibili pagine web in alto a destra -->

          <li><a href="Index.php">Home</a></li>

          <li><a href="Modifica.html">Modifica</a></li>

          <li><a href="lettura.php">Ordini</a></li>

        </ul>

      </nav>

      <section class="center">

        <div class="content">

          <h2>Ordini fatti:</h2>

          <p>



          <?php


          echo '<table>';
          echo '<tr>';
          echo '<th>'."ID CAMERA".'</th>';
          echo '<th>'."EMAIL".'</th>';
          echo '<th>'."DATA ARRIVO".'</th>';
          echo '<th>'."DATA FINE".'</th>';

          echo '</tr>';

           $datilettura = file_get_contents("read.csv");

           $part = explode(PHP_EOL, $datilettura);

           for ($i = 0; $i <= count($part)-1; $i++) {

            $var = explode('|', $part[$i]);

            echo '<tr>';
            echo '<td>'.$var[0].'</td>';

            echo '<td>'.$var[1].'</td>';

            echo '<td>'.$var[2].'</td>';

            echo '<td>'.$var[3].'</td>';
            
            echo '</tr>';
            
           }

           echo '</table>';
         ?>

          </p>

        </div>

    </section>

      <br><br>