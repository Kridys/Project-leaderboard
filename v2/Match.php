<?php
// création de la connexion
$dsn = 'mysql:dbname=leaderboard_lol;host=127.0.0.1';
$user = 'root';
$password = 'Wr3nch&Retr0';
$connection = new PDO($dsn, $user, $password);
// suppression d'un joueur
if (isset($_GET['delete_id'])) {
    $statement = $connection->prepare("
        DELETE
        FROM joueur
        WHERE id = :delete_id
    ");

    $statement->bindValue(':delete_id', $_GET['delete_id']);
    $statement->execute();
}
// ajout d'un joueur
if (isset($_POST['name'])) {
    $statement = $connection->prepare("
        INSERT INTO joueur(name, victoire, defaite, team)
        VALUES(:name, :victoire, :defaite, :team)
    ");

    $statement->bindValue(':name', $_POST['name']);
    $statement->bindValue(':victoire', $_POST['victoire']);
    $statement->bindValue(':defaite', $_POST['defaite']);
    $statement->bindValue(':team', $_POST['team']);
    $statement->execute();
}
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Match</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="">League Of Legend</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu principal -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Classement1.php">
                        <i class="fas fa-trophy"></i> Classement
                    </a>
                    <a class="nav-link" href="Match.php">
                        <i class="fas fa-trophy"></i> Match
                    </a>

                </li>
            </ul>

            <!-- Formulaire de recherche -->
            <form action="recherche.php" method="post" class="form-inline my-2 my-lg-0">
                <input name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i> <span class="d-md-none">Rechercher</span>
                </button>
            </form>
        </div>
    </nav>

<br><br><br>
    <main role="main"><br><br>
        <div class="container">
            <h2>Match :</h2>


                <div class="alert alert-success" role="alert">
                    Il n'y a pas de joueur
                </div>

            <hr />

            <div class="container">
                <h2>Ajouter un joueur</h2>
                <form action="Match.php" method="POST">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <label for="category">Joueur</label>
                        <input name="joueur" type="joueur" class="form-control" id="joueur" placeholder="Nom du joueur"><br>


                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un joueur</button><br><br>
                </form>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="container">
        <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.leagueofgraphs.com/lcs/lcs-players">League of Graphs</a></p>
    </footer>
</body>
</html>
