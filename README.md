# 飞银卡包系统

## 安装

~~~
composer ...
~~~

## 使用说明

- 引入方法
~~~
use Oyta\Feiyin\Joint;
~~~


- 普通用户数据提交与响应 (用户操作接口不需要设置key)
~~~
Joint::consumer($url,$param);
~~~

- 普通用户数据请求与响应示例
~~~
$param = [
    'moblie'=>'185xxxxxxxx'
  ];
$url = '/cardlist';
$res = Joint::consumer($url,$param);
return $res;
~~~


- 设置Key
~~~
Joint::setkey($publicKey, $privateKey);
~~~
- 商户数据提交与响应 (商户操作接口需要设置key)
~~~
Joint::merchant($url,$param);
~~~

- 商户数据请求与响应示例
~~~
public $publicKey
public $privateKey
Joint::setkey($this->publicKey, $this->privateKey);
$param = [
    'appid' =>'2056371498',
    'timestamp' =>time(),
    'param' => [ //提交的参数都需要增加在param内
        'secret' => 'PZfM6UWHAzyX7JnBFe38u1KLrOgExo4q',
        'mobile' => '18575510399',
        ],
   ];
$url = '/cardlist'
$res = Joint::merchant($url,$param);
return $res;
~~~
