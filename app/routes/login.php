<?php

    $app->get('/log_in', function() use ($app)
    {
        var_dump($_SESSION['user']);
        return $app['twig']->render('login.html.twig');
    });
