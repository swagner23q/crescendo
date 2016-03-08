<?php



    $app->get('/login', function() use ($app)
    {
        return $app['twig']->render('home.html.twig');
    });
