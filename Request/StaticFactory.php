<?php
// +----------------------------------------------------------------------
// | 静态工厂模式化实现调用
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/20 Time: 下午2:39
// +----------------------------------------------------------------------

namespace Request;


final class StaticFactory
{
    public static function factory()
    {
        switch ($GLOBALS['mode']) {
            case 'cli':
                return new CliRequest();
                break;
            case 'fpm-fcgi':
                return new FpmRequest();
                break;
            default:
                return new CliRequest();
                break;
        }

    }
}