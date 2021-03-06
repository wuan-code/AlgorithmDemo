<?php
// +----------------------------------------------------------------------
// | 返回信息的接口
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note  包含了json返回和web返回
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午1:15
// +----------------------------------------------------------------------

namespace Response;


interface Response
{

    public static function json(array $result = []);

    public static function web($result);

}