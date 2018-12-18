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
    public static $returnType;
    public static $funcion;

    public abstract static function json($data);

    public abstract static function print($data);

    /**
     * 设置返回的模式
     * @param string $function
     */
    public static function setReturnType($function = '')
    {
        switch ($GLOBALS['mode']) {
            case 'cli':
                self::$returnType = 'print';
                self::$funcion    = $function;
                break;
            case 'fpm-fcgi':
                self::$returnType = 'json';
                self::$funcion    = $function;
                break;
            default:
                self::$returnType = 'print';
                self::$funcion    = $function;
                break;
        }
    }

}