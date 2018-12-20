### php实现简单的算法代码

#### 不要做一个只会new的程序员,多写点新特性,多用些魔术方法,多看看设计模式化

**开始只是觉得无聊，网上找了些常用的算法，尝试着用php来实现。后来觉得只写业务实现，代码真的很烂，于是就越写越多，添加了一堆常用的代码，有些是刻意加上去的，通过代码实践，增强理解。**

**不是写框架，不是写框架，不是写框架！！！router以后可能会加，log、redis、队列这些东西，当使用到的时候会添加**

#### 如果想在本地cli实现程序，需要安装依赖  composer update ,执行方法和效果如下
![image](https://github.com/yaobin24/AlgorithmDemo/blob/master/screenshot/cli.png)
> 关于jc21/clitable依赖包的问题：该依赖包中文显示会少两个空格，所以需要在依赖包里面添加一段正则(CliTable.php的getFormattedRow())
```
$fieldLength  = strlen($field) + 1;

if(preg_match('/^[\x7f-\xff]+$/', trim($field))) {
    $field = $field.'  ';
}

$field        = ' '.($this->getUseColors() ? $this->getColorFromName($color) : '').$field;
$response    .= $field;

```

#### 你将接触到到的知识点

1、interface:Response\Response.php

2、abstract:Response\BaseResponse.php

3、extends:Response\ResponseData.php

4、final:Library\RequestMode.php

5、trait:APP\BaseApp (详情参考：http://php.net/manual/en/language.oop5.traits.php)


6、instanceof:APP\AirPlane\Planes.php( instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例)

7、Enum:枚举

8、反射API:Enums\CodeEnum.php (ReflectionClass)


9、异常（try...catch throw):index.php 

10、单例模式:APP\AirPlane\Solution.php （题外话：还有多例模式(Multiton),比如连接数据库:mysql,oracle,sql server）

11、自动加载:index.php
>题外话：为了实现cli的table展示，添加了composer，当时遇到一个小坑，composer的自动加载和我自己写的自动加载冲突了，刚开始没看手册，走了很多弯路。
特别重要：spl_autoload_register() 按定义时的顺序逐个执行 **多看手册**


12、工厂模式:Transform

13、扫描线算法基础:AirPlane(计算空中飞机)

14、桶排序:BucketSort（根据权重，按比例分配）


### 线性排序算法：计数排序、桶排序、基数排序

