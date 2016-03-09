<?php

    $app->get('/about', function() use ($app)
    {
        return $app['twig']->render('about.html.twig');
    });
