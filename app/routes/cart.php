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
        array_push($_SESSION['cart'], [2,2]);

        $total_price = Product::calculateTotalCartPrice();

        $all_products = [];
        $products = [];

        foreach($_SESSION['cart'] as $line_item)
        {

            $product_id = $line_item[0];
            $qty = $line_item[1];
            $product = Product::find($product_id);
            $products[] = $product;
            $products[] = $qty;

            $all_products[] = $products;
        }
        var_dump($all_products);
        return $app['twig']->render('cart.html.twig', array(
                'total_price' => $total_price,
                'all_products' => $all_products));
    });




    $app->get('/cart/delete', function() use ($app) {
        Product::cartDelete();

        return $app['twig']->render('cart.html.twig', array(
                'total_price' => $total_price,
                'products' => $products));

    });
