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
    <meta charset="utf-8">
    <title>Test della personalità</title>
    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="provided-style.css"/>
    <script src="constants.js" defer="true"></script>
    <script src="quiz.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>  
    <a href='home.php'><strong>Torna al sito</strong></a>
    <article>
      <header>
         
          <h1>DaniBlog</h1>
          <div>
            <span>G</span>
            <span>I</span>
            <span>O</span>
            <span>C</span>
            <span>A</span>
          </div>
      </header>
      <h1>Scegli un personaggio e ti dirò chi sei</h1>

      <section class="question-name">
        <h1>Chi vorresti interpretare?</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="ennuno" data-question-id="one">
          <img src="images/1_1.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enndue" data-question-id="one">
          <img src="./images/1_2.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enntre" data-question-id="one">
          <img src="./images/1_3.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennquattro" data-question-id="one">
          <img src="./images/1_4.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enncinque" data-question-id="one">
          <img src="./images/1_5.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsei" data-question-id="one">
          <img src="./images/1_6.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsette" data-question-id="one">
          <img src="./images/1_7.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennotto" data-question-id="one">
          <img src="./images/1_8.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennove" data-question-id="one">
          <img src="./images/1_9.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>
      </section>

      <section class="question-name">
        <h1>Da che parte stai?</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="ennuno" data-question-id="two">
          <img src="images/2_1.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enndue" data-question-id="two">
          <img src="./images/2_2.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enntre" data-question-id="two">
          <img src="./images/2_3.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennquattro" data-question-id="two">
          <img src="./images/2_4.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enncinque" data-question-id="two">
          <img src="./images/2_5.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsei" data-question-id="two">
          <img src="./images/2_6.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsette" data-question-id="two">
          <img src="./images/2_7.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennotto" data-question-id="two">
          <img src="./images/2_8.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennove" data-question-id="two">
          <img src="./images/2_9.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>
      </section>

      <section class="question-name">
        <h1>Con chi combatteresti il Mind Flayer?</h1>
      </section>

      <section class="choice-grid">
        <div data-choice-id="ennuno" data-question-id="three">
          <img src="images/3_1.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enndue" data-question-id="three">
          <img src="./images/3_2.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enntre" data-question-id="three">
          <img src="./images/3_3.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennquattro" data-question-id="three">
          <img src="./images/3_4.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="enncinque" data-question-id="three">
          <img src="./images/3_5.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsei" data-question-id="three">
          <img src="./images/3_6.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennsette" data-question-id="three">
          <img src="./images/3_7.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennotto" data-question-id="three">
          <img src="./images/3_8.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>

        <div data-choice-id="ennove" data-question-id="three">
          <img src="./images/3_9.jpg"/>
          <img class="checkbox" src="images/unchecked.png"/>
        </div>
      </section>

    </article>
  </body>
</html>
<?php mysqli_close($conn); ?>