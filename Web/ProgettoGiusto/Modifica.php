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
        <ul class="mmenu">
            <!-- ho inserito 3 possibili pagine web in alto a destra -->
          <li><a href="Index.html">Home</a></li>
          <li><a href="Modifica.html">Modifica</a></li>
          <li><a href="lettura.php">Ordini</a></li>
        </ul>
      </nav>

    <!--bottoni per o eliminare o inserire un appartamento-->
    <header class="Descrizione">
    <a  value = "cance" onclick = "cancel()" class="btn">Elimina</a>
    <a  value = "New" onclick = "appartamento()" class="btn">Nuovo appartamento</a>
    </header>

    <!-- inserimento appartamento-->
    <section class="center">
        <div class="content" id = "nascondi">
          <h2>NUOVO APPARTAMENTO:</h2>
          <p>
            <label>ID</label><input type = "text" id = "ID">
    <br><br>
    <label>TITOLO</label><input type = "text" id = "titolo">
    <br><br>
    
    <label>luogo</label>
    <select id = "Regione">
    <option value = "Abruzzo">Abruzzo</option>
    <option value = "Basilicata">Basilicata</option>
    <option value = "Calabria">Calabria</option>
    <option value = "Campania">Campania</option>
    <option value = "Emilia">Emilia-Romagna</option>
    <option value = "Friuli">Friuli-Venezia-Giulia</option>
    <option value = "Lazio">Lazio</option>
    <option value = "Liguria">Liguria</option>
    <option value = "Lombardia">Lombardia</option>
    <option value = "Marche">Marche</option>
    <option value = "Molise">Molise</option>
    <option value = "Piemonte">Piemonte</option>
    <option value = "Puglia">Puglia</option>
    <option value = "Sardegna">Sardegna</option>
    <option value = "Sicilia">Sicilia</option>
    <option value = "Toscana">Toscana</option>
    <option value = "Trentito">Trentito-alto-adige</option>
    <option value = "Umbria">Umbria</option>
    <option value = "Aosta">Valle d'Aosta</option>
    <option value = "Veneto">Veneto</option>
    </select>
    <br> <br>
    <label>Città </label><input type = "text" id = "Citta">
    <br> <br>
    <label>via (inserire anche numero civico) </label><input type = "text" id = "Via">
    <br><br>
    <form action="funzioni.php">
    <input type="file" id="myFile" name="filename">
    </form>
    <br><br>
    <label>Descrizione</label><input type = "text" id = "Descrizione" >
    <br><br>
    
    <a  value = "Calcola" onclick = "Inserisci()" class="btn">INSERISCI</a>
    <?php
     function Inserisci(){
       file_put_contents("file1","rosso");
 
     }   
?>
  </p>
        </div>
    </section>

    <!-- elimina appartamento-->
    <section class = "center">
        <div class = "content" id = "nascondi2">
            <p>
                <h2>ELIMINA APPARTAMENTO:</h2>

                <label>Inserire ID dell'appartamento che vuoi eliminare:   </label><input type = "text" id = "ID">
                <br><br>

                <a  value = "Calcola" onclick = "Elimina()" class="btn">ELIMINA</a>
            </p>
            
        </div>
    </section>
</div>
</body>
</html>