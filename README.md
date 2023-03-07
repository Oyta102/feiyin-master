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


- 设置Key
~~~
Joint::setkey($publicKey, $privateKey);
~~~
- 商户数据提交与响应 (商户操作接口需要设置key)
~~~
Joint::merchant($url,$param);
~~~
