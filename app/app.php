<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Scrabble.php";

    session_start();
    $_SESSION['player_scores'] = array();

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render("home.html.twig");
    });

    $app->post("/results", function() use ($app) {
        $player1 = new Players();
        $player2 = new Players();

        $player1Score = $player1->returnScore($_POST["player1Word"]);
        $player2Score = $player2->returnScore($_POST["player2Word"]);
        array_push($_SESSION['player_scores'], $player1Score);
        array_push($_SESSION['player_scores'], $player2Score);

        return $app['twig']->render("results.html.twig", array('player1Score'=>$player1Score, 'player2Score'=>$player2Score));
    });

    return $app;
?>
