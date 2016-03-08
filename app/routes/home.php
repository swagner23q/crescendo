<?php
    $app->get('/', function() use ($app)
    {
        return $app['twig']->render('home.html.twig');
    });
    $app->get('/logged_in', function() use ($app) {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $user_id = User::passwordVerify();
        $SESSION['user'] = $user_id;
        $user = User::find($user_id);
        return $app['twig']->render('home.html.twig', array('name' => $user->getName()));
    });
    $app->get('/logged_out', function() use ($app) {
        session_destroy();
        return $app['twig']->render('login.html.twig');
    });
