<?php
/**
 * @Copyright Oyta
 * @Author Oyta
 * @Email oyta@daucn.com
 * @Version 1.0
 */

namespace Oyta\Feiyin;

class ConfigPor
{
    public static function get(){
        $file = __DIR__ . '/config.php';
        return $file;
    }
}
