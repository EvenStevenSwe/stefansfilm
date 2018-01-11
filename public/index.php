<?php
use App\Database;
use App\Models\MovieModel;

// Sökväg till grundmappen i projektet
$baseDir = __DIR__ . '/..';

// Ladda in Composers autoload-fil
require $baseDir . '/vendor/autoload.php';

// Ladda konfigurationsdata
$config = require $baseDir. '/config/config.php';

// Normalisera url-sökvägar  ---
// create (? = delar strängen) id=2
$path = function ($uri) {
	$uri = ($uri == "/") ? $uri : rtrim($uri, '/');

	$uri = explode('?', $uri);
	$uri = array_shift($uri);

	return $uri;
};

$dsn = "mysql:host=".$config['host'].";dbname=".$config['db'].";charset=".$config['charset'];
$pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);
$db = new Database($pdo);

//$controller = new Controller($baseDir);
$url = $path($_SERVER['REQUEST_URI']);
$movieModel = new MovieModel($db);
switch ($url) {
	case '/':
	    $movie = $movieModel->getAll();
		//$controller->index();
		require $baseDir.'/views/index.php';
	break;

        //Länk till skapa sidan
    case '/add-movie':
        require $baseDir.'/views/create.php';
        break;

        //Funktion för att skapa ny film
    case '/create-movie':
		$id = $movieModel->create([
            "movie_title" => $_POST["movie_title"],
            "movie_genre" => $_POST["movie_genre"],
            "movie_year" => $_POST["movie_year"],
            "movie_media" => $_POST["movie_media"],
            "movie_url" => $_POST["movie_url"]
        ]);

        //Dirigerar tillbaka till förstasidan och skickar med id:t efter att vi har sparat.
		header('Location: /');
	break;

	    //Lista filmer via genre, år eller media
    case '/info':
        $movie = $movieModel->getInfo('table_name', 'movie_genre, movie_year, movie_media');
        //$controller->index();
        require $baseDir.'/views/index.php';
        break;

	    //Länk till att uppdatera
    case '/update':
        $movie = $movieModel->getById($_GET['id']);
        require $baseDir.'/views/update.php';
        break;

        //Funktionen för att uppdatera
    case '/update-movie':
        $movieModel->update($_POST['id'], [
            "movie_title" => $_POST["movie_title"],
            "movie_genre" => $_POST["movie_genre"],
            "movie_year" => $_POST["movie_year"],
            "movie_media" => $_POST["movie_media"],
            "movie_url" => $_POST["movie_url"]
        ]);

        header('Location: /');
        break;

        //Funktionen för att ta bort film
    case '/delete':
        $movieModel->delete($_GET['id']);
        header('Location: /');
        break;

	default:
		header('HTTP/1.0 404 Not Found');
		echo 'Page not found';
	break;
}
