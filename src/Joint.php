<?php
/**
 * @Copyright Oyta
 * @Author Oyta
 * @Email oyta@daucn.com
 * @Version 1.0
 */

namespace Oyta\Feiyin;

use Oyta\Feiyin\Common\Handle;
use Oyta\Feiyin\Common\Setkey;

class Joint
{
    public static function setkey($publicKey, $privateKey){
        return Setkey::set($publicKey, $privateKey);
    }
    
    public static function consumer($url,$param){
        return Handle::consu($url,$param);
    }
    
    
    public static function merchant($url,$param){
        return Handle::chant($url,$param);
    }
}
