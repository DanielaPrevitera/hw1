<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>

  <?php 
    // Carico le informazioni dell'utente loggato per visualizzarle nella sidebar (mobile)
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
  ?>

  <head>
    <title>DaniBlog</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="./assets/favicon.png">
    <script src="home.js" defer="true"></script>
  </head>
  
  <body>
  <section id="modale" class="hidden"></section>
    <div id="overlay" class="hidden">
    </div>
    <header>
      <nav>
        <div id="logo">
          DaniBlog
        </div>
        <div id="links">
        <a href='home.php'>HOME</a>
         
          <a href='reviews.php'>RECENSIONI</a>
          <a href ='gallery.php'>GALLERY</a>
          <a href='attori.php'>ATTORI</a>     
          <a href='ricerca.php'>CERCA SERIE</a>
          <div id="separator"></div>
          <a href='profile.php'>PROFILO</a>
          <a href='quiz.php'>GIOCA</a>
     
        
          <a href='logout.php' class='button'>LOGOUT</a>
        </div>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
      <h1>Curiosità tutte da scoprire su tantissime serie tv!</h1>
      <a class="subtitle">
        Un mondo a portata di click
   
    </header> </section>
    <section class="container">

            <div id="results">
                
            </div>
    </section>
      </a>
    <section id="search">
      <form autocomplete="off">
        <div class="search">
          <label for='search'>Scopri le serie in tendenza</label>
          <input type='text' name="search" class="searchBar" placeholder="day/week">
          <input type="submit" value="Cerca">
        </div>
      </form>
      
    </section>
    <section class="container">

            <div id="results">
                
            </div>
    </section>
    <footer>
      <nav>
      <footer>
  <nav>
    <div class="footer-container">
     
      <div class="footer-col"> 
        <h1>DaniBlog</h1>
        <p>1000016746</p>
       <p><a href="termini.php">Termini e condizioni</a></p>
      </div>
      <div class="footer-col">
  <a href="https://www.unict.it/" target="_blank">
    <img src=".\assets\UniCT-Logo-Bianco.png" alt="Logo Università di Catania">
  </a>
</div>

      <div class="footer-col">
        <strong>SOCIAL</strong>
        <div class="social-icons">
          <a href="https://www.facebook.com/"><i class="fab fa-facebook fa-2x"></i> </a>   
          <br></br>
          <a href="https://twitter.com/"><i class="fab fa-twitter fa-2x"></i></a>
          <br></br>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x"></i></a>
          
        </div>
      </div>
    </div>
  </nav>
</footer>

  </body>
  </html>