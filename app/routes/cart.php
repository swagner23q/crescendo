<?php

    $app->get('/cart', function() use ($app)
    {
        return $app['twig']->render('cart.html.twig');
    });

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

    $app->get('/cart/show_items', function() use ($app) {
        $cart = $_SESSION['cart'];
        $total_price = Product::calculateTotalCartPrice($cart);

        foreach($cart as $item)
        {
            $product_id = $item[0];
            $qty = $item[1];

            $product = Product::find($product_id);

            $gender = $product->getGender();
            $name = $product->getName();
            $price = $product->getPrice();
        }

        return $app['twig']->render('cart.html.twig', array('quantity' => $qty,
                'name' => $name,
                'total_price' => $total_price));
    });



    $app->delete('/cart/delete_item', function() use ($app) {
        $cart = $_SESSION['cart'];


    });
