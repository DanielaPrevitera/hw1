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
        <link rel='stylesheet' href='ricerca.css'>
        <script src='ricerca.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="./assets/favicon.png">

        <title>DaniBlog - <?php echo $userinfo['name']." ".$userinfo['surname'] ?></title>
        
    </head>

    <body>
     <section id="modale" class="hidden"></section>   
    <div id="overlay">
    </div>
        <header>
            <nav>
                <div class="nav-container">
                    <div id="links">
                        <a href='home.php'>HOME</a>
                        <a href='reviews.php'>RECENSIONI</a>
                        <a href='attori.php'>ATTORI</a>
                        <a href ='gallery.php'>GALLERY</a>
                        <div id="separator"></div>
                        <a href='logout.php' class='button'>LOGOUT</a>
                    </div>

                    
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                
                <div class="userInfo"> 
                    
                    <a href='profile.php' class='profile'><h1><?php echo $userinfo['name']." ".$userinfo['surname'] ?></h1> </a>
                        <div class="avatar" style="background-image: url(<?php echo $userinfo['propic'] == null ? "assets/default_avatar.png" : $userinfo['propic'] ?>)">
                   
                    </div>
                
                   
                </div>               
            </nav>
        </header>
        <h3>Cerca e scopri</h3>
      <section id="search">
      <form autocomplete="off">
        <div class="search">
        <input type="text" name="search" id="searchbox" placeholder="Inserire il nome della serie tv">
        <input type="submit" value="Cerca">
        </div>
      </form>
      
    </section>

        <section class="container">

            <div id="results">
                
            </div>
    </section>

    </body>
</html>

<?php mysqli_close($conn); ?>