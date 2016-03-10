<?php

    $app->get('/products', function() use ($app)
    {
        $products = Product::findByTypeAndGender($search_TypeId, $search_Gender);
        return $app['twig']->render('products.html.twig', array('products' => $products));
    });
