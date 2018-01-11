<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
    <title>Filmer att se</title>

	<!-- Länk till CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/add-movie" role="button">Lägg till film</a>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h2>Filmer att se</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titel</th>
                <th>Genre</th>
                <th>År</th>
                <th>Mediatyp el. Plats</th>
                <th>Info</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($movie as $movies):  ?>
                    <tr>
                        <td><?= $movies['movie_title'] ?></td>
                        <td><a href="/info?genre=<?= $movies['movie_genre'] ?>"><?= $movies['movie_genre'] ?></td>
                        <td><a href="/info?year=<?= $movies['movie_year'] ?>"><?= $movies['movie_year'] ?></a></td>
                        <td><a href="/info?medie=<?= $movies['movie_media'] ?>"><?= $movies['movie_media'] ?></td>
                        <td><a href="<?= $movies['movie_url'] ?>" target="_blank">IMDb</a></td>
                        <td><a href="/update?id=<?= $movies['id'] ?>">Uppdatera</a> <a href="/delete?id=<?= $movies['id'] ?>">Ta bort</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

	<hr>

<footer>
    <p>&copy; 2017 </p>
</footer>
</div>

<!-- Länk till JS
==================================================
 -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>