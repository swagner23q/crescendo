<?php

    $app->get('/checkout', function() use ($app)
    {
        if ($_SESSION['user'] == NULL)
        {
            $variable_render = 'login.html.twig';
            $logged_in = FALSE;
        } else {
            $variable_render = 'checkout.html.twig';
            $logged_in = TRUE;
        }

        return $app['twig']->render($variable_render, array('checkout' => TRUE, 'logged_in' => $logged_in));
    });
