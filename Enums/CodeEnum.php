<?php
// +----------------------------------------------------------------------
// | 返回信息枚举类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note 反射的了解：在PHP运行状态中，扩展分析PHP程序，
// |                 导出或提取出关于类、方法、属性、参数等的详细信息，包括注释。
// |                 这种动态获取的信息以及动态调用对象的方法的功能称为反射API
// +----------------------------------------------------------------------
// | Date       2018/12/11 Time: 下午7:22
// +----------------------------------------------------------------------

namespace Enums;


class CodeEnum
{

    const MODE_NOT_EXIT = ['code' => 10000, 'msg' => '该运行模式未定义'];
    const OPERATION_DATA_FAIL = ['code' => 10001, 'msg' => '操作失败'];
    const REQUEST_ERROR = ['code' => 10002, 'msg' => '请求错误'];


    const VARIABLE_NOT_EXIT = ['code' => 20000, 'msg' => '该变量不存在'];
    const TRANSFORM_DATA_NOT_EXIT = ['code' => 20001, 'msg' => '待改变的变量不存在'];

    const PROJECT_IS_NOT_EXIT = ['code' => 50000, 'msg' => '请求的方法不存在'];



    /**
     * 获取枚举常量信息的方法
     * @param string $name
     * @note  ReflectionClass：PHP的反射类
     * @return mixed
     */
    public static function getConstant(string $name)
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstant($name);
    }
}