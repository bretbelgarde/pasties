<?php

namespace SkullBox\Core;

class AppController
{
  use \SkullBox\Utils\PageRenderer;

  protected object $app;

  public function __construct(\Base $app) {
      $this->app = $app;
  }

  public function index():void {
    $data = ['message' => 'Hello World!'];
    $this->render('home', $data);
  }

  public function add():bool {
    return true;
  }

  public function delete():bool {
    return true;
  }

  public function update():bool {
    return true;
  }
}
