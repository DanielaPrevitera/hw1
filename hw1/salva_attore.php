<?php
    /*******************************************************
        Inserisce nel database il post da pubblicare 
    ********************************************************/
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    attori();

    function attori() {
        global $dbconfig, $userid;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        $userid = mysqli_real_escape_string($conn, $userid);  
        $personaggio = mysqli_real_escape_string($conn, $_GET['personaggio']);
        $attore = mysqli_real_escape_string($conn, $_GET['attore']);
        $image = mysqli_real_escape_string($conn, $_GET['immagine']);


        $query = "SELECT * FROM attori WHERE user_id = '$userid' AND persona='$attore'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        # if song is already present, do nothing
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
            exit;
        }

 # Eseguo
 $query = "INSERT INTO attori(persona, user_id, content) VALUES('$attore','$userid', JSON_OBJECT('personaggio', '$personaggio', 'immagine', '$image', 'attore', '$attore'))";
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