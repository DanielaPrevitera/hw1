<?php
    /*******************************************************
        Inserisce nel database il post da pubblicare 
    ********************************************************/
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    serie();

    function serie() {
        global $dbconfig, $userid;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        $userid = mysqli_real_escape_string($conn, $userid);  
        $descrizione = mysqli_real_escape_string($conn, $_GET['descrizione']);
        $titolo = mysqli_real_escape_string($conn, $_GET['titolo']);
        $image = mysqli_real_escape_string($conn, $_GET['immagine']);


        $query = "SELECT * FROM serie WHERE user_id = '$userid' AND titolo='$titolo'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        # if song is already present, do nothing
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
            exit;
        }

 # Eseguo
 $query = "INSERT INTO serie(titolo, user_id, content) VALUES('$titolo','$userid', JSON_OBJECT('titolo', '$titolo', 'immagine', '$image', 'descrizione', '$descrizione'))";
 error_log($query);
 # Se corretta, ritorna un JSON con {ok: true}
 if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
     echo json_encode(array('ok' => true));
     exit;
 }

 mysqli_close($conn);
 echo json_encode(array('ok' => false));

    }

        ?>