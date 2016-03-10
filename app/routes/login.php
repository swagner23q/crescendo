<?php

    $app->get('/log_in', function() use ($app)
    {
        $_SESSION['cart'] = [];
        $_SESSION['cart'][] = [1,2];
        $_SESSION['cart'][] = [3,4];
        return $app['twig']->render('login.html.twig', array('checkout' => FALSE));
    });
