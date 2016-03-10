<?php

    $app->get('/product', function() use ($app)
    {
        $id = 4;
        $product = Product::find($id);
        return $app['twig']->render('product.html.twig',  array('product' => $product));
    });
