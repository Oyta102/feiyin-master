<?php
/**
 * @Copyright Oyta
 * @Author Oyta
 * @Email oyta@daucn.com
 * @Version 1.0
 */

namespace Oyta\Feiyin\Common;
use Oyta\Feiyin\ConfigPor;

class Httprequst
{
    public static function http_post($url,$data,$header){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        $head = curl_getinfo($ch);
        return $result;
    }
    
    
    public static function process($data){
        $key = ConfigPor::get();
        $rsa = new Rsa($key['publicKey'],$key['privateKey']);
        $sort = json_encode($data);
        $sign = $rsa->sign($sort);
        $con = $rsa->pubEncrypt($sort);
        $result = array(
            'X-Oyta-Content:'.$con,     //数据密文设置到header头
            'X-Oyta-Signtrue:'.$sign,   //签名设置到header头
        );
        return $result;
    }
    
    public static function verify($data){
    
        $key = ConfigPor::get();
        $rsa = new Rsa($key['publicKey'],$key['privateKey']);
        $cade = json_decode($data,true);
        $ery = $rsa->privDecrypt($cade['Params']); //商户使用私钥对数据解密
        $sign = $rsa->verify($ery,$cade['Signtrue']); //商户使用平台公钥对数据验签
        if($sign != 1){
            return '验签失败';
        }
        $result =  json_decode($ery,true); //转换json为数组,最终数据
        return $result;
    }
    
}
