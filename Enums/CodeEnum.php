<?php
// +----------------------------------------------------------------------
// | 返回信息枚举类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/11 Time: 下午7:22
// +----------------------------------------------------------------------

namespace Enums;


class CodeEnum
{

    const MODE_NOT_EXIT = ['code' => 10000, 'msg' => '该运行模式未定义'];
    const OPERATION_DATA_FAIL = ['code' => 10001, 'msg' => '操作失败'];


    const VARIABLE_NOT_EXIT = ['code' => 20000, 'msg' => '该变量不存在'];
    const TRANSFORM_DATA_NOT_EXIT = ['code' => 20001, 'msg' => '待改变的变量不存在'];

    const PROJECT_IS_NOT_EXIT = ['code' => 50000, 'msg' => '请求的方法不存在'];


    public static function getConstant(string $name)
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstant($name);
    }
}