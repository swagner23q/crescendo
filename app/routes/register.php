<?php

    $app->get('/register', function() use ($app)
    {
        return $app['twig']->render('register.html.twig');
    });

    // $app->post('/register', function() use ($app)
    // {
    //     return $app['twig']->render('register_confirm.html.twig', array());
    // });
