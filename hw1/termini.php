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
        <link rel='stylesheet' href='gallery.css'>
        <script src='script.js' defer></script>
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
                        <a href='attori.php'>ATTORI</a>
                        <a href='reviews.php'>RECENSIONI</a>
                        <a href='ricerca.php'>CERCA SERIE</a>
                        <a href='gallery.php'>GALLERY</a>
                        <div id="separator"></div>
                        <a href='logout.php' class='button'>LOGOUT</a>
                    </div>

                    

                </div>
                
                <div class="userInfo"> 
                    
                    <a href='profile.php' class='profile'><h1><?php echo $userinfo['name']." ".$userinfo['surname'] ?></h1> </a>
                        <div class="avatar" style="background-image: url(<?php echo $userinfo['propic'] == null ? "assets/default_avatar.png" : $userinfo['propic'] ?>)">
                   
                    </div>
                
                   
                </div>               
            </nav>
</header>
        <main>
        <h3>Termini e condizioni di DaniBlog</h3>
        <section>
            <p><span>Benvenuto/a su DaniBlog!</span></p>
            <p>Prima di utilizzare il nostro sito web, ti invitiamo a leggere attentamente i seguenti termini e condizioni che regolano l'uso dei nostri servizi. Accedendo e utilizzando il nostro sito, accetti di essere vincolato/a dai seguenti termini e condizioni:</p>

            <ol>
                <li>
                    <strong>Contenuto del Sito:</strong>
                    <p>Il nostro sito web fornisce informazioni, recensioni, notizie e altro materiale relativo alle serie TV. Tutti i contenuti presenti sul sito sono forniti a scopo puramente informativo e non costituiscono consulenza professionale o suggerimenti personalizzati. L'utente è responsabile dell'utilizzo e dell'interpretazione dei contenuti presenti sul sito.</p>
                </li>
                <li>
                    <strong>Proprietà Intellettuale:</strong>
                    <p>Tutti i diritti di proprietà intellettuale relativi al contenuto del sito, inclusi testi, immagini, loghi, video e grafiche, sono di proprietà di [Nome del Sito] o dei rispettivi proprietari. È vietata la riproduzione, la distribuzione o l'utilizzo non autorizzato del materiale presente sul sito senza il consenso scritto del titolare dei diritti.</p>
                </li>
                <li>
                    <strong>Utilizzo del Sito:</strong>
                    <p>L'utente accetta di utilizzare il nostro sito web solo per scopi leciti e conformi alle leggi vigenti. Non è consentito utilizzare il sito per scopi illegali, diffamatori, minatori di dati, invasivi della privacy o che possano danneggiare il nostro sito o le sue funzionalità. Ci riserviamo il diritto di sospendere o revocare l'accesso all'utente che violi questi termini e condizioni.</p>
                </li>
                <li>
                    <strong>Collegamenti a Terze Parti:</strong>
                    <p>Il nostro sito può contenere collegamenti ad altri siti web di terze parti. Questi collegamenti sono forniti per comodità dell'utente e non implicano alcuna approvazione o responsabilità da parte nostra riguardo ai contenuti o alle politiche di tali siti. L'accesso a siti esterni avviene a proprio rischio e l'utente è tenuto a leggere e accettare i termini e le condizioni di tali siti.</p>
                </li>
                <li>
                    <strong>Limitazione di Responsabilità:</strong>
                    <p>Facciamo del nostro meglio per fornire informazioni accurate e aggiornate sul nostro sito web, ma non garantiamo l'accuratezza, la completezza o l'adeguatezza dei contenuti. Non siamo responsabili per eventuali errori o omissioni presenti sul sito. L'utente accetta di utilizzare il sito a proprio rischio. Decliniamo qualsiasi responsabilità per danni diretti, indiretti, incidentali o consequenziali derivanti dall'utilizzo del sito o dalla sua indisponibilità.</p>
                </li>
                <li>
                    <strong>Modifiche ai Termini e Condizioni:</strong>
                    <p>Ci riserviamo il diritto di modificare questi termini e condizioni in qualsiasi momento senza preavviso. Eventuali modifiche saranno effettive immediatamente dopo la pubblicazione sul sito. Si consiglia di controllare periodicamente questa pagina per eventuali aggiornamenti.</p>
                </li>
            </ol>

            <p>Accedendo e utilizzando il nostro sito web, dichiari di avere almeno 18 anni o di essere in possesso del consenso dei tuoi genitori o di un tutore legale. Se non accetti o non sei d'accordo con i suddetti termini e condizioni, ti invitiamo a non utilizzare il nostro sito web.</p>

            <p>Grazie per la comprensione e buona navigazione sul nostro sito dedicato alle serie TV!</p>
        </section>
    </main>