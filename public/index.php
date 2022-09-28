<?php
    require '../vendor/autoload.php';

    $app = Base::instance();

    $app->route('GET /', function(){
        echo "Hello World!";
    });

    $app->run();

