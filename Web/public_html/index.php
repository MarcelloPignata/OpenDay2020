<!DOCTYPE html>

<html>



<head>

  <meta charset='utf-8'>

  <meta http-equiv='X-UA-Compatible' content='IE=edge'>

  <title>APPARTAMENTI</title>

  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link rel='stylesheet' type='text/css' media='screen' href='style.css'>

</head>



<body>



  <div class="container">

    <!-- barra di navigazione -->

    <nav class="nav">

      <h2 class="logo"><img src="img/Logo.jpg" alt="" height="90px" width="90px" /></h2>

      <!-- ho inserito 3 possibili pagine web in alto a destra -->

      <ul class="menu">

        <li><a href="index.php">Home</a></li>

        <li><a href="Modifica.html">Modifica</a></li>

        <li><a href="lettura.php">Ordini</a></li>

      </ul>

    </nav>

    <!-- Header -->

    <header class="Descrizione">

      <h2> ---- descrizione di noi ----</h2>

    </header>



    <!-- Box -->

    <br><br>

    <h2>APPARTAAMENTI DISPONIBILI:</h2>



    <section class="box">

      <div>

        <!--<img src="img/img1.jpg" alt="" />

        <h3>Casa:</h3>

        <p>

           <br>

          liguria genova via alla chiesa n 28 <br>

        </p>-->

        



        <?php

        

        $dati = file_get_contents("write");

        $part = explode(PHP_EOL, $dati);

       // print_r($part);

        for ($i = 0; $i <= count($part)-2; $i++) {

          $var = explode(' | ', $part[$i]);

          echo $var[0].'<br/>';

          echo $var[1].'<br/>';

          echo "<img src=".'"'."img/".$var[2].'"'."/>";

          echo $var[3].'<br/>';

          echo $var[4].'<br/>';

          echo $var[5].'<br/>';

        }

        ?>

      </div>



    </section>

    <a href="#" class="btn">HOME <i class="fas fa-chevron-right"></i>

    </a>

  </div>

</body>



</html>