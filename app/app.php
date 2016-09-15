<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Scrabble.php";

    session_start();

    if (empty($_SESSION['player1']))
    {
        $_SESSION['player1'] = "";
    };
    if (empty($_SESSION['player2']))
    {
        $_SESSION['player2'] = "";
    };

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['player1']));
    });

    $app->post("/results", function() use ($app) {
        if (empty($_SESSION['player1']))
        {
            $_SESSION['player1'] = new Players();
        };
        if (empty($_SESSION['player2']))
        {
            $_SESSION['player2'] = new Players();
        };

        $player1 = $_SESSION['player1'];
        $player2 = $_SESSION['player2'];
        $player1Score = $player1->returnScore($_POST["player1Word"]);
        $player2Score = $player2->returnScore($_POST["player2Word"]);

        return $app['twig']->render("results.html.twig", array('player1'=>$player1, 'player2'=>$player2));
    });

    $app->get("/clear", function() use ($app) {
        Players::deleteAll();
        return $app['twig']->render("home.html.twig");
    });

    return $app;
?>
