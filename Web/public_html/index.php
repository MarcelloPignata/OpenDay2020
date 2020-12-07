<!DOCTYPE html>

<html>



<head>

  <meta charset='utf-8'>

  <meta http-equiv='X-UA-Compatible' content='IE=edge'>

  <title>APPARTAMENTI</title>

  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ="
      crossorigin="anonymous"
    />
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
    <br> <br> <br>
    <br> <br> <br>

    <p> <span class="giallo">Questo sito serve:<br> 
    tramite questo sito web si possono visualizzare gl'ordini effettuati dai clienti con l'applicazione,in ordine<br> cronologico di inserimento tramite il tasto "ordini".<br> 
    E' possbile anche apportare delle modifiche alle informazioni riguardante gli appartamenti, aggiungendone<br> di nuovi disponibili per la clientela o eliminarne alcuni che non sono più a affittabili.<br> 
    tramite questo sistema si può avere un maggiore controllo sull'attività che i clienti svolgono dall'applicazione.<br>
    Sono presenti anche i collegamenti ai social media principali cosi da poter gestire le proprio pagine per<br> promuovere la propria app nel mondo digitale in modo più diretto e veloce. <br>
  </span>
    


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



          echo '<h3>'.$var[1].'</h3>';

          echo '<h4>'."ID:  ".$var[0].'</h4>';

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

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-inner">
          <h2>Seguimi su:</h2>
          <a href="https://www.facebook.com">
          <i class="fab fa-facebook fa-2x"></i>
          </a>
          <a href="https://www.instagram.com">
          <i class="fab fa-instagram fa-2x"></i>
          </a>
          <a href="https://www.twitter.com">
          <i class="fab fa-twitter fa-2x"></i>
          </a>
          <a href="https://www.linkedin.com">
          <i class="fab fa-linkedin fa-2x"></i>
          </a>
        </div>
      </footer>

  </div>

</body>



</html>