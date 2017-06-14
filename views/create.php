<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
    <title>Stefan's Filmsamling</title>

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
        <h2>Lägg till film</h2>
        <form method="post" action="/create-movie">
            <div class="form-group">
                <input type="text" class="form-control" name="movie_title" placeholder="Titel">
                <input type="text" class="form-control" name="movie_genre" placeholder="Genre">
                <input type="text" class="form-control" name="movie_year" placeholder="År">
                <input type="text" class="form-control" name="movie_media" placeholder="Mediatyp">
                <input type="text" class="form-control" name="movie_url" placeholder="Info">
            </div>
            <button type="submit" class="btn btn-default">Ok</button>
        </form>
    </div>
</div>

    <hr>

<footer>
    <p>&copy; 2017 Stefan's Filmsamling.</p>
</footer>
</div>

<!-- Länk till JS
==================================================
 -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>
