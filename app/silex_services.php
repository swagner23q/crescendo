<?php
$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();
