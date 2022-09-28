<?php
namespace pinebox;


class AppController
{

    protected $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function index() {

    }

    private function render($data, $template) {
        $this->app->set('data', $data);
        echo \Template::instance()->render($template);
    }

}