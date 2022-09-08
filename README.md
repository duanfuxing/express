<h1 align="center"> Express </h1>

<p align="center">支持快递100的快递查询SDK</p>


## 安装

```shell
$ composer require duan617/express
```
## 配置

在使用本扩展之前，你需要去 [快递100](https://www.kuaidi100.com/openapi/applyapi.shtml) 或者 [快递鸟](http://www.kdniao.com/reg) 注册申请，获取到APP_id和APP_key。

## Usage
### 快递100
```php
use Flex\Express\Express100;

$response = app('express')->KuaiDi100->getCode();
```

 
 ## 参考
 
 - [快递100接口文档](https://www.kuaidi100.com/openapi/api_post.shtml)
 - [快递100快递公司编码](https://blog.csdn.net/u011816231/article/details/53063611)
 - [快递鸟接口文档](http://www.kdniao.com/documents)
 - [快递鸟快递公司编码](http://www.kdniao.com/documents)

