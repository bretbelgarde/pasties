<?php
    require_once '../vendor/autoload.php';
    define('ROOT', dirname(__DIR__));

    $app = Base::instance();

    // TODO: Move to config.ini
    $app->mset([
      'DEBUG'    => 3,
      'AUTOLOAD' => ROOT . '/src/',
      'DB'       => new DB\Jig(ROOT . '/data/', DB\Jig::FORMAT_JSON),
    ]);


    // TODO Move to Routes.ini
    $app->route('GET /', '\SkullBox\Core\AppController->index');
    $app->route([
      'GET /get',
      'GET /get/@id'
    ], '\SkullBox\Core\AppController->getPasties');
    $app->route('POST /add',        '\SkullBox\Core\AppController->addPastie');
    $app->route('POST /update/@id', '\SkullBox\Core\AppController->updatePastie');
    $app->route('POST /delete',     '\SkullBox\Core\AppController->deletePastie');
    
    $app->run();
