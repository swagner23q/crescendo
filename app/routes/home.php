<?php

    $app->get('/', function()
    {
        return 'Hello, World!';}
    );

    $app->('/logged_in', function() use ($app){
        $email = $_GET['email'];
        $password = $_GET['password'];

        $user_id = User::verifyPassword();

        $SESSION['user'] = $user_id;
        $user = User::find($user_id);

        return $app['twig']->render('home.html.twig', array('name' => $user->getName()));
    });

    $app->('/logged_out', function() use ($app) {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
        }

        return $app['twig']->render('login.html.twig', $message => "Login to begin a session.");
    });
