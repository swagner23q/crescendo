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
        );
        $user->save();

        $message = \Swift_Message::newInstance()
        ->setSubject('Thanks for Registering!')
        ->setFrom(array('crescendo.clothing.co@gmail.com' => 'Crescendo Clothing'))
        ->setTo(array($_POST['email']))
        ->setBody("Thanks for registering with Cresendo Clothing, and welcome to the Crescendo family! Keep this email for future reference: Email: " . $_POST['email'] . ", Password: " . $_POST['password'] . ".");

    	$app['mailer']->send($message);


        return $app['twig']->render('register.html.twig', array('user' => $user, 'registered' => TRUE));
    });
