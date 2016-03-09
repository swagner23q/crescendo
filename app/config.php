<?php
    session_start();

    if ( !isset($_SESSION['user']) ) {
        $_SESSION['user']="no user";
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $app = new Silex\Application();


    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->register(new Silex\Provider\SwiftmailerServiceProvider());
    $app['swiftmailer.options'] = array(
    	    'host'       => 'smtp.gmail.com',
    	    'port'       => 465,
    	    'username'   => 'crescendo.clothing.co@gmail.com',
    	    'password'   => 'Epicodus2016',
    	    'encryption' => 'ssl',
    	    'auth_mode'  => 'login'
    	);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
