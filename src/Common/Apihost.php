<?php
/**
 * @Copyright Oyta
 * @Author Oyta
 * @Email oyta@daucn.com
 * @Version 1.0
 */

namespace Oyta\Feiyin\Common;

class Apihost
{
    public static function consumer_url(){
        return base64_decode('aHR0cHM6Ly9hcGljYXJkLmh0ZmVpeWluLmNvbS9hcGkvdXNlcmNhcmQ=');
    }
    
    public static function merchant_url(){
        return base64_decode('aHR0cHM6Ly9hcGljYXJkLmh0ZmVpeWluLmNvbS9hcGkvY2FyZA==');
    }
}
