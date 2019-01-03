<?php
// +----------------------------------------------------------------------
// | 运行模式的枚举
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 上午10:58
// +----------------------------------------------------------------------

namespace Enums;


class ModeEnum
{
    const MODE_METHOD = ['cli' => 'Library\Mode\CliMode', 'fpm-fcgi' => 'Library\Mode\FpmMode'];

    const MODE_REQUEST = ['cli' => 'Request\CliRequest', 'fpm-fcgi' => 'Request\FpmRequest'];

    const MODE_TRANSFORM_FACTORY = ['cli' => 'Transform\TransformFactory\CliFactory', 'fpm-fcgi' => 'Transform\TransformFactory\FpmFactory'];


}