<?php

    $app->get('/checkout', function() use ($app)
    {
        if ($_SESSION['user'] == NULL)
        {
            $variable_render = 'login.html.twig';
            $logged_in = FALSE;
            $cart_total = FALSE;
        } else {
            $variable_render = 'checkout.html.twig';
            $logged_in = TRUE;
            $cart_total = Product::calculateTotalCartPrice();
        }

        return $app['twig']->render($variable_render, array('checkout' => TRUE, 'logged_in' => $logged_in, 'cart_total' => $cart_total));
    });
