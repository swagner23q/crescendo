<?php

    $app->post('/cart/add_item', function() use ($app) {
      $cart = $_SESSION['cart'];

      $product_id = $_POST['product_id'];
      $qty = $_POST['qty'];

      $item = array();

      array_push($item, $product_id);
      array_push($item, $qty);

      array_push($cart, $item);

      $total_price = Product::calculateTotalCartPrice($cart);

      return $app['twig']->render('product.html.twig', array('added' => TRUE, 'total_price' => $total_price));
    });

    $app->get('/cart', function() use ($app) {
        array_push($_SESSION['cart'], [1,3]);
        $total_price = Product::calculateTotalCartPrice();
        return $app['twig']->render('cart.html.twig', array('total_price' => $total_price));
    });




    $app->get('/cart/delete', function() use ($app) {
        Product::cartDeleteAll();

        return $app['twig']->render('cart.html.twig');

    });
