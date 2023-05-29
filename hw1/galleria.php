<?php

$query = urlencode($_GET["q"]);
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.themoviedb.org/3/search/tv?&query=".$query.'&language=it-IT',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiMmI1YzQ4ZjFiMTU2OTgxZmJlMjQzYWJjZTExYTUwZSIsInN1YiI6IjY0NmI4YTI3NTRhMDk4MDE3MjhhYzlmNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.mQIklA3ofi5sPzdGTve-pbyTMiC0_Y8x2KcQGEzIQsM",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 

$data = json_decode(utf8_encode($response));
$chiave=$data->results[0]->id;
?>



<?php


$seriesId=$chiave;
$ID=strval($seriesId);
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.themoviedb.org/3/tv/".$chiave."/images",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiMmI1YzQ4ZjFiMTU2OTgxZmJlMjQzYWJjZTExYTUwZSIsInN1YiI6IjY0NmI4YTI3NTRhMDk4MDE3MjhhYzlmNCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.mQIklA3ofi5sPzdGTve-pbyTMiC0_Y8x2KcQGEzIQsM",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>