<?php
// +----------------------------------------------------------------------
// | 返回方式的抽象类，实现了返回方式的接口
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note 定义了成功返回和失败返回，实现了json格式和web格式的返回方法
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午1:51
// +----------------------------------------------------------------------

namespace Response;


abstract class BaseResponse implements Response
{
    abstract public static function success($data);

    abstract public static function error($code, $notice = '');

    /**
     * json返回方式的实现方法
     * @param array $result
     */
    public static function json(array $result = [])
    {
        echo json_encode($result);
        exit;
    }

    /**
     * web返回方式的实现
     * @param $result
     */
    public static function web($result)
    {
        var_dump($result);
        die;
    }
}