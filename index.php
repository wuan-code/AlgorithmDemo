<?php
header('content-type:text/html;charset=utf-8');
ini_set('memory_limit', '256M');

// 实现类的自动加载(自定义的)
require __DIR__ . '/Library/autoload.php';
spl_autoload_register('loadprint');
// 依赖的自动加载 (spl_autoload_register会顺序执行，第一个自动加载没有找到，自动执行第二个自动加载)
require __DIR__ . '/vendor/autoload.php';
// 添加扩展类
require __DIR__ . '/Library/helpers.php';
$mode         = new \Library\Mode( php_sapi_name());
try {
    $result = $mode->getMode();
} catch (\Exceptions\MyException $e) {
    \Response\ResponseData::error($e);
}
new $result['class']($result['project']);














