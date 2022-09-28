<?php

class AppController
{
  use PageRenderer;
  protected $app;

  public function __construct(Base $app) {
      $this->app = $app;
  }

  public function index() {
    $data = ['message' => 'Hello World!'];
    $this->render('home', $data);
  }

  public function add() {

  }

  public function delete() {

  }

  public function update() {

  }
}
