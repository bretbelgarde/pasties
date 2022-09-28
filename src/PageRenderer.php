<?php
trait PageRenderer {
  public function render($template, $data = null) {
    if (!is_null($data)) Base::instance()->set('DATA', $data);
    echo Template::instance()->render('../templates/' . $template . '.html');
  }
}
