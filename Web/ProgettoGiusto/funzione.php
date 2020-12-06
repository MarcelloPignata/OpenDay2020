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
          <li><a href="Index.html">Home</a></li>
          <li><a href="Modifica.html">Modifica</a></li>
          <li><a href="lettura.php">Ordini</a></li>
        </ul>
      </nav>
      <section class="center">
        <div class="content">
          <h2>Dati inviati correttamete:</h2>
          <p>

          <?php

     function test(){
          $dato=$_POST["T1"];
          $file = fopen("file2", "a");
          fwrite($file, "$dato");
          fwrite($file, "\r\n"); 
          fclose($file);
          echo file_get_contents("file2");
          }
       test()
       ?>
          </p>
        </div>
    </section>
      <br><br>