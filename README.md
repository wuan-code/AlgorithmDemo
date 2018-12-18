### php实现简单的算法代码（现在只实现了数飞机）
**开始只是觉得无聊，网上找了些常用的算法，尝试着用php来实现。后来觉得只写业务实现，代码真的很烂，于是就越写越多，添加了一堆常用的代码，有些是刻意加上去的，通过代码实践，增强理解。**

**不是写框架，不是写框架，不是写框架！！！router以后可能会加，log、redis、队列这些东西，当使用到的时候会添加**

#### 如果想在本地cli实现程序，需要安装依赖  composer update ,执行方法和效果如下
![image](https://github.com/yaobin24/AlgorithmDemo/blob/master/screenshot/cli.png)

#### 你将接触到到的知识点
1、interface:Response\Response.php

2、abstract:Response\BaseResponse.php

3、extends:Response\ResponseData.php

4、final:Library\RequestMode.php

5、反射API:Enums\CodeEnum.php (ReflectionClass)

6、instanceof:APP\AirPlane\Planes.php( instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例)

7、异常（try...catch throw):index.php 

8、单例模式:APP\AirPlane\Solution.php

9、自动加载:index.php
>题外话：为了实现cli的table展示，添加了composer，当时遇到一个小坑，composer的自动加载和我自己写的自动加载冲突了，刚开始没看手册，走了很多弯路。特别重要：spl_autoload_register() 按定义时的顺序逐个执行 
*多看手册*

10、trait:Library\Log.php (todo... 详情参考：http://php.net/manual/en/language.oop5.traits.php)

11、工厂模式:Transform
