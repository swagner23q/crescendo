<?php

    $app->get('/product/{id}', function($id) use ($app)
    {
        $product = Product::find($id);
        return $app['twig']->render('product.html.twig',  array('product' => $product, 'added' => False));
    });

    $app->post('/cart/add_item', function() use ($app) {

      $product_id = $_POST['product_id'];
      $qty = $_POST['qty'];

      $product = Product::find($product_id);

      $item = array();

      array_push($item, $product_id);
      array_push($item, $qty);

      array_push($_SESSION['cart'], $item);

      $total_price = Product::calculateTotalCartPrice();

      return $app['twig']->render('product.html.twig', array('added' => TRUE, 'total_price' => $total_price, 'product' => $product));
    });
