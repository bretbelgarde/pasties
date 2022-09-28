<?php
    require '../vendor/autoload.php';
    define('ROOT', dirname(__DIR__));

    $app = Base::instance();

    // TODO: Move to config.ini
    $app->mset([
      'DEBUG'    => 3,
      'AUTOLOAD' => ROOT . '/src/',
      'DB'       => new DB\Jig(ROOT . '/data/', DB\Jig::FORMAT_JSON)
    ]);


    // TODO Move to Routes.ini
    $app->route('GET /', '\AppController->index');

    $app->route('GET /test', function() {


    });

    $app->run();
