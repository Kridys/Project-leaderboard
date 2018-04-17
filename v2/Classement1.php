<?php
// création de la connexion
$dsn = 'mysql:dbname=leaderboard_lol;host=127.0.0.1';
$user = 'root';
$password = 'Wr3nch&Retr0';
$connection = new PDO($dsn, $user, $password);
// affichage du classemment
$statement = $connection->prepare("
    SELECT *
    FROM joueur
    ORDER BY id ASC, name ASC, victoire ASC, defaite ASC, team ASC
");
$statement->execute();
$joueurs = $statement->fetchAll();

 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Classement1</title>

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
            <h2>Meilleur joueur :</h2>

            <?php if (count($joueurs) === 0) { ?>
                <div class="alert alert-success" role="alert">
                    Il n'y a pas de joueur
                </div>
            <?php } else { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Joueur</th>
                            <th scope="col">Victoire</th>
                            <th scope="col">Défaite</th>
                            <th scope="col">Team</th>

                        </tr>
                    </thead>
                    <?php foreach ($joueurs as $joueur) { ?>
                        <tr>
                            <td><?= $joueur['id'] ?></td>
                            <td><?= $joueur['name'] ?></td>
                            <td><?= $joueur['victoire'] ?></td>
                            <td><?= $joueur['defaite'] ?></td>
                            <td><?= $joueur['team'] ?></td>
                            <td style="text-align: right">
                                <a href="Classement1.php?delete_id=<?= $joueur['id'] ?>">Supprimer</a>
                            <td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>

            <hr />
        </div>
    </main>
    <!-- Footer -->
    <footer class="container">
        <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.leagueofgraphs.com/lcs/lcs-players">League of Graphs</a></p>
    </footer>
</body>
</html>
