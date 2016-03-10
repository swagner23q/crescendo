<?php

    $app->get('/products/{gender}/{type_id}', function($gender, $type_id) use ($app)
    {
        $products = Product::findByTypeAndGender($type_id, $gender);
        // $current_type_id = $type_id
        return $app['twig']->render('products.html.twig', array('products' => $products, 'gender' => $gender, 'type_id' => $type_id));
    });
