<?php
// +----------------------------------------------------------------------
// | 变换数据的抽象类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午7:56
// +----------------------------------------------------------------------

namespace Transform;


use Library\Mode;

abstract class Transform
{
    public static $factory;

    public static function setFactory()
    {
        $request       = (new Mode())->getModeTransFormFactory();
        self::$factory = (new $request)->create();
    }

    public static function show($data)
    {
        if (!isset(self::$factory)) self::setFactory();
        self::$factory->show($data);
    }


    public static function showTable($data)
    {
        if (!isset(self::$factory)) self::setFactory();
        self::$factory->showTable($data);
    }

    abstract static function otherShow($data);
}