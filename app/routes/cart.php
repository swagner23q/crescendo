<?php

    $app->get('/cart', function() use ($app) {
        $total_price = Product::calculateTotalCartPrice();
        return $app['twig']->render('cart.html.twig', array('total_price' => $total_price));
    });

    $app->get('/cart/delete', function() use ($app) {
        Product::cartDeleteAll();

        return $app['twig']->render('cart.html.twig');
    });
