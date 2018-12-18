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


abstract class Transform
{
    public static $factory;

    abstract public static function show($data);

    public static function setFactory()
    {
        switch ($GLOBALS['mode']) {
            case 'cli':
                self::$factory = 'Transform\Factory\CliFactory';
                break;
            case 'fpm-fcgi':
                self::$factory = 'Transform\Factory\FpmFactory';
                break;
            default:
                self::$factory = 'Transform\Factory\CliFactory';
                break;
        }
    }

}