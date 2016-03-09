<?php

    $app->get('/about', function()
    {
        var_dump($_SESSION['user']);
        return 'Hello, World!';}
    );
