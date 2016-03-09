<?php

    $app->get('/log_in', function() use ($app)
    {
        return $app['twig']->render('login.html.twig');
    });
