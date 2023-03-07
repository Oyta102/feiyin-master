<?php
/**
 * @Copyright Oyta
 * @Author Oyta
 * @Email oyta@daucn.com
 * @Version 1.0
 */

namespace Oyta\Feiyin\Common;

class Handle
{
    public static function consu($url,$data){
        $api = Apihost::consumer_url().$url;
        return Httprequst::http_post($api,$data);
    }
    
    public static function chant($url,$data){
        $process = Httprequst::process($data);
        $api = Apihost::merchant_url().$url;
        $res = Httprequst::http_post($api,null,$process);
        return Httprequst::verify($res);
    }
}
