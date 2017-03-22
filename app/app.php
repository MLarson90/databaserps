<?php
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/RPS.php';

  session_start();
  if (empty($_SESSION['list_of_input'])) {
    $_SESSION['list_of_input'] = array();
  }
  if (empty($_SESSION['list_of_pTwo'])) {
    $_SESSION['list_of_pTwo'] = array();
  }
  var_dump($_SESSION['list_of_input']);
  var_dump($_SESSION['list_of_pTwo']);
  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  $app->get("/", function() use($app){
      return $app['twig']->render('index.html.twig');
  });
  $app->post("/rock_input", function() use ($app){
      $player_one = new RPS($_POST['rocks']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/paper_input", function() use ($app){
      $player_one = new RPS($_POST['papers']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/scissor_input", function() use ($app){
      $player_one = new RPS($_POST['scissorss']);
      $player_one->save();
      return $app['twig']->render('player_two.html.twig');
  });
  $app->post("/rock_inputs", function() use ($app){
      $player_two = new RPS($_POST['rocks']);
      $player_two->save_two();
      return $app['twig']->render('results.html.twig');
  });
  $app->post("/paper_inputs", function() use ($app){
      $player_two = new RPS($_POST['papers']);
      $player_two->save_two();
      return $app['twig']->render('results.html.twig');
  });
  $app->post("/scissor_inputs", function() use ($app){
      $player_two = new RPS($_POST['scissorss']);
      $player_two->save_two();
      return $app['twig']->render('results.html.twig');
  });
  $app->post('/delete', function() use ($app){
    $winner = new RPS('input');
    RPS::deleteAll();
    return $app['twig']->render('results.html.twig', array('zach' => $winner, 'steve' => $_SESSION['list_of_input'], 'max' => $_SESSION['list_of_pTwo']));
  });
  return $app;
?>
