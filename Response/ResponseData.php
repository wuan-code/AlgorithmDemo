<?php
// +----------------------------------------------------------------------
// | 返回数据操作
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note 继承返回方式的抽象类，实现了成功返回和失败返回
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午1:16
// +----------------------------------------------------------------------

namespace Response;


use Enums\CodeEnum;
use Enums\ResponseEnum;
use Exceptions\MyException;
use Library\Mode;

class ResponseData extends BaseResponse
{
    private static $returnType;

//    /**
//     * 声明魔术方法
//     * @param $property
//     * @param $value
//     * @note 调用方式：实例化该类，直接声明变量并设置变量值
//     * @throws MyException
//     */
//    public function __set($property, $value)
//    {
//        if (!in_array($property, ResponseEnum::RESPONSE_RETURN_TYPE) ||
//            !in_array($value, ResponseEnum::RESPONSE_TYPE)
//        ) {
//            throw new MyException('VARIABLE_NOT_EXIT');
//        }
//        self::$property = $value;
//    }

    /**
     * 成功的操作
     * @param array $data
     * @return mixed
     */
    public static function success($data = [])
    {
        if (!self::$returnType) self::setReturnType();
        $response         = [
            "status" => "sucess",
            "code"   => 200,
            "msg"    => "请求成功",
        ];
        $response['data'] = ($data instanceof SuccessCode) ? $data->data : $data;
        // 调用BaseResponse的方法
        return call_user_func_array(array(__CLASS__, self::$returnType), [$response]);
    }

    /**
     * 失败的操作
     * @param $codeEnum
     * @param string $notice
     * @return mixed
     */
    public static function error($codeEnum, $notice = '')
    {
        if (!self::$returnType) self::setReturnType();
        // 适配直接调用
        if (is_string($codeEnum)) {
            $codeEnum = CodeEnum::getConstant($codeEnum) ? CodeEnum::getConstant($codeEnum) : CodeEnum::getConstant('OPERATION_DATA_FAIL');
            $response = [
                "status" => "error",
                "code"   => $codeEnum['code'],
                "msg"    => empty($notice) ? $codeEnum['msg'] : $codeEnum['msg'] . " (提示:{$notice})",
            ];
            return call_user_func_array(array(__CLASS__, self::$returnType), [$response]);
        }
        // 适配ErrorCode对象
        if ($codeEnum instanceof ErrorCode) {
            $response = [
                "status" => "error",
                "code"   => $codeEnum->code,
                "msg"    => empty($codeEnum->notice) ? $codeEnum->msg : $codeEnum->msg . " (提示:{$codeEnum->notice})",
            ];
            return call_user_func_array(array(__CLASS__, self::$returnType), [$response]);
        }

        // 适配异常
        if ($codeEnum instanceof MyException || $codeEnum instanceof \Exception) {
            $errorCode = $codeEnum->getErrorCode();
        } else {
            $errorCode = new ErrorCode('OPERATION_DATA_FAIL');
        }
        $response = [
            "status" => "error",
            "code"   => $errorCode->code,
            "msg"    => empty($errorCode->notice) ? $errorCode->msg : $errorCode->msg . " (提示:{$errorCode->notice})",
        ];
        return call_user_func_array(array(__CLASS__, self::$returnType), [$response]);
    }


    /**
     * 设置返回的模式
     */
    public static function setReturnType()
    {
        $mode = (new Mode())->mode;
        switch ($mode) {
            case 'cli':
                self::$returnType = 'web';
                break;
            case 'fpm-fcgi':
                self::$returnType = 'json';
                break;
            default:
                self::$returnType = 'web';
                break;
        }
    }

}