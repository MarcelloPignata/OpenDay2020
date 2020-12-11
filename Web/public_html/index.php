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
    <h1 class = "titolo"> TRIBOGO </h1>
    <br> <br> <br> <br>
    
    <p> Questo sito serve:<br> 
    per inserire i vari appartamenti che poi si visualizzeranno sull'applicazione.<br>
    per visualizzare tutti gl'ordini che hanno fatto nell'applicazione.<br> 

       </p>
    <video autoplay muted loop class = "video-back">
    <source src = "img/video.mp4" type= "video/mp4">
    </video>
    </header>

    



    <!-- Box -->

    <br><br>

    
    <h2>APPARTAAMENTI DISPONIBILI:</h2>


    <section class="box">
    

  
        <?php

        

        $dati = file_get_contents("appartamenti.csv");

        $part = explode(PHP_EOL, $dati);

       // print_r($part);

        for ($i = 0; $i <= count($part)-1; $i++) {

          $var = explode('|', $part[$i]);

          echo '<div>';



          echo '<h3>'.$var[1].'</h3>'."-->";

          echo "ID:  ".$var[0].'<br/>';

          echo "<img src=".'"'."img/".$var[2].'"'."/>";

          echo "POSTO:  ".$var[3].'<br/>';

          echo "COSTO:  ".$var[4]."€".'<br/>';

          echo "POSTI LETTO:  ".$var[5].'<br/>';

          echo "DESCRIZIONE:  ".'<br/>';

          echo $var[6].'<br/>';


          echo '</div>';
          

        }

        ?>

    </section>

    <a href="#" class="btn">HOME <i class="fas fa-chevron-right"></i>

    </a>

  </div>

</body>



</html>