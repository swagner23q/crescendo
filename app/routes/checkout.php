<?php

    $app->get('/checkout', function() use ($app)
    {
        if ($_SESSION['user'] == NULL)
        {
            $variable_render = 'login.html.twig';
        }

        return $app['twig']->render($variable_render, array('checkout' => TRUE));
    });
