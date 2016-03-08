<?php

    $app->get('/register', function() use ($app)
    {
        return $app['twig']->render('register.html.twig');
    });

    $app->post('/register', function() use ($app)
    {
        $user = new User(
            $_POST['f_name'],
            $_POST['l_name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['password'],
            $_POST['ship_street'],
            $_POST['ship_apt'],
            $_POST['ship_city'],
            $_POST['ship_state'],
            $_POST['ship_postal'],
            $_POST['bill_street'],
            $_POST['bill_apt'],
            $_POST['bill_city'],
            $_POST['bill_state'],
            $_POST['bill_postal']
        )
        $user->save();
        return $app['twig']->render('register_confirm.html.twig', array('user' => $user));
    });
