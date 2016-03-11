<?php

$app->get('/profile', function() use ($app) {
    $user = User::find($_SESSION['user']);
    return $app['twig']->render('profile.html.twig', array('user' => $user));
});

$app->patch("/profile", function() use ($app) {
    $new_f_name = $_POST['f_name'];
    $new_l_name = $_POST['l_name'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];
    $new_password = $_POST['password'];
    $new_ship_street = $_POST['ship_street'];
    $new_ship_apt = $_POST['ship_apt'];
    $new_ship_city = $_POST['ship_city'];
    $new_ship_state = $_POST['ship_state'];
    $new_ship_postal = $_POST['ship_postal'];
    $new_bill_street = $_POST['bill_street'];
    $new_bill_apt = $_POST['bill_apt'];
    $new_bill_city = $_POST['bill_city'];
    $new_bill_state = $_POST['bill_state'];
    $new_bill_postal = $_POST['bill_postal'];
    $user = User::find($_SESSION['user']);
    $user->update($new_f_name, $new_l_name, $new_email, $new_phone, $new_password, $new_ship_street, $new_ship_apt, $new_ship_city, $new_ship_state, $new_ship_postal, $new_bill_street, $new_bill_apt, $new_bill_city, $new_bill_state, $new_bill_postal);
    return $app['twig']->render('profile.html.twig', array('user' => $user));
});
