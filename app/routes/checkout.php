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

    $app->post('/checkout', function() use ($app)
    {
        $order = new Order($_SESSION['user'], $_POST['ship_type'], date("Y-d-m"), $_SESSION['cart']);
        $order->save();
        $order->checkout();
        $logged_in = TRUE;
        $cart_total = Product::calculateTotalCartPrice();

        $user = User::find($_SESSION['user']);
        $message = \Swift_Message::newInstance()
        ->setSubject('Crescendo Order #'.$order->getId())
        ->setFrom(array('crescendo.clothing.co@gmail.com' => 'Crescendo Clothing'))
        ->setTo(array($user->getEmail()))
        ->setBody("Order Number #".$order->getId()."\nTotal Cost $".$cart_total);

    	$app['mailer']->send($message);

        return $app['twig']->render('checkout.html.twig', array('checkout' => TRUE, 'logged_in' => $logged_in, 'cart_total' => $cart_total));
    });
