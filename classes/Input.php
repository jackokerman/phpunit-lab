<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 3/24/14
 * Time: 7:59 PM
 */

class Input {

    public static function get($name, $default = null) {
        return isset($_GET[$name]) ? $_GET[$name] : $default;
    }

} 