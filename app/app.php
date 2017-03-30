<?php
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/PlayerOne.php';
  require_once __DIR__.'/../src/PlayerTwo.php';

  $server = 'mysql:host=localhost:8889;dbname=rockpaperscissor';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  $app->get("/", function() use($app){
      return $app['twig']->render('index.html.twig');
  });
  $app->post("/rock_input", function() use ($app){
      $player_one = new PlayerOne($_POST['rock']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/paper_input", function() use ($app){
      $player_one = new PlayerOne($_POST['paper']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/scissor_input", function() use ($app){
      $player_one = new PlayerOne($_POST['scissors']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/rock_inputs", function() use ($app){
      $player_two = new PlayerTwo($_POST['rocks']);
      $player_two->save();
      return $app['twig']->render('results.html.twig');
  });
  $app->post("/paper_inputs", function() use ($app){
      $player_two = new PlayerTwo($_POST['papers']);
      $player_two->save();
      return $app['twig']->render('results.html.twig');
  });
  $app->post("/scissor_inputs", function() use ($app){
      $player_two = new PlayerTwo($_POST['scissorss']);
      $player_two->save();
      return $app['twig']->render('results.html.twig');
  });
  $app->post('/delete', function() use ($app){
    $player_one_move = PlayerOne::getAll();
    $player_two_move = PlayerTwo::getAll();
    $win = new PlayerOne($player_one_move);
    $winner = $win->checkWinner($player_one_move, $player_two_move);
    return $app['twig']->render('results.html.twig', array('steve' => $winner));
  });
    $app->post('/home', function() use ($app){
      PlayerOne::deleteAll();
      PlayerTwo::deleteAll();
      return $app['twig']->render('index.html.twig');
  });
  return $app;
?>
