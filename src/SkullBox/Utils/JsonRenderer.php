<?php

namespace SkullBox\Utils;

trait JsonRenderer {
    public function renderJSON($data) : void {
        header('Content-Type: application/json; charset=utf-8');
        echo(json_encode($data));
    }
}