<?php

namespace SkullBox\Utils;

trait GetJSONPost {
    public function getJSONPost() {
        /*
         * NOTE must use file_get_contents('php://input') to get
         * json from an AJAX request.
         */
        return json_decode(file_get_contents('php://input'), true);
    }
}
