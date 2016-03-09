<?php
    $app->get('/', function() use ($app)
    {
        return $app['twig']->render('home.html.twig');
    });

    $app->get('/logged_in', function() use ($app) {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $user_id = User::passwordVerify($email, $password);
        if($user_id){
            $SESSION['user'] = $user_id;
            $user = User::find($user_id);
            $page_to_render = "home.html.twig";
            $name = $user->getFirstName();
            $error_message = FALSE;
        } else {
            $SESSION['user'] = NULL;
            $page_to_render = "login.html.twig";
            $error_message = "Sorry, try again!";
            $name = FALSE;
        }
        return $app['twig']->render($page_to_render, array('name' => $name, 'error_message' => $error_message));
    });

    $app->get('/logged_out', function() use ($app) {
        session_destroy();
        return $app['twig']->render('home.html.twig');
    });
