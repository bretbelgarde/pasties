<?php

namespace SkullBox\Utils;

trait PageRenderer {
  public function render(string $template, array $data = null):void {
    if (!is_null($data)) \Base::instance()->set('DATA', $data);
    echo \Template::instance()->render('../templates/' . $template . '.html');
  }
}
