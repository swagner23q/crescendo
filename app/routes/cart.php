<?php

    $app->get('/cart', function() use ($app)
    {
        return $app['twig']->render('cart.html.twig');
    });

    $app->post('/cart/add_item', function() use ($app) {
      $cart = $_SESSION['cart'];
      $product_id = $_POST['product_id'];
      $qty = $_POST['qty'];

      array_push($cart, $product_id);
      array_push($cart, $qty);

      return $app['twig']->render('product.html.twig', array('added' => TRUE));
    });

    $app->delete('/cart/delete_item', function() use ($app) {
        $cart = $_SESSION['cart'];


    });
