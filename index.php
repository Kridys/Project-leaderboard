<?php try
{
	$bdd = new PDO('mysql:host=localhost;dbname=leaderboard_lol;charset=utf8', 'root', 'Wr3nch&Retr0', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
require_once('player.php');
$playerNmbr= $bdd->query("SELECT count(*) AS count FROM player")->fetchColumn();

$winrate=0;
for ($i=0;$i<= $playerNmbr;$i++){
  $win= $bdd->query("SELECT winrate FROM player WHERE id = $i")->fetchColumn();
  if($winrate< $win){
    $winrate=$win;
  }
  // echo $i;
  echo $winrate." ";
}


$player1 = new Player();
$player1->name= $bdd->query("SELECT name FROM player where winrate = '$winrate' ")->fetchColumn();

 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Classement</h1>
                <p style="font-size: 2em;">
                 <?= $player1->name ?>
                </p>

                <p><a href="#" class="btn btn-primary btn-lg" role="button">Button</a></p>
            </div>
        </div>
    </main>

    <footer class="container">
        <p>&copy; Bootstrap 2018</p>
    </footer>
</body>
</html>
