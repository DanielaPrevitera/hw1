<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $attore = mysqli_real_escape_string($conn, $_GET['attore']);
    $userid = mysqli_real_escape_string($conn, $userid);  

    $query = "DELETE from attori where user_id = '$userid' AND persona='$attore'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
        echo json_encode(array('ok' => false));
        exit;
    }
   
    mysqli_close($conn);
    echo json_encode(array('ok' => true));
   

    
    $actorArray = array();
    while($entry = mysqli_fetch_assoc($res)) {
        // Scorro i risultati ottenuti e creo l'elenco di post
        $actorArray[] = array('user_id' => $entry['user_id'],
                              'content' => json_decode($entry['content']));
    }
    echo json_encode($actorArray);
    
    exit;

?>