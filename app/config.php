<?php
    session_start();

    if ( !isset($_SESSION['user']) ) {
        $_SESSION['user']= NULL;
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $app = new Silex\Application();

    // $app["debug"] = TRUE; 

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
        $twig->addGlobal('session', $_SESSION);
        $twig->addFunction('findProduct', new Twig_Function_Function('Product::find'));
        return $twig;
    }));

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
