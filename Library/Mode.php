<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2019/1/3 Time: 下午3:53
// +----------------------------------------------------------------------

namespace Library;


use Enums\ModeEnum;
use Exceptions\MyException;

final class Mode
{
    public $mode;

    public function __construct($mode = '')
    {
        if (!$this->mode) {
            $this->mode = $mode ?: php_sapi_name();
        }
    }

    /**
     * __set()魔术方法
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * __get()魔术方法
     * @param $propertyName
     * @return mixed
     */
    public function __get($propertyName)
    {
        return isset($this->$propertyName) ? $this->$propertyName : false;
    }


    /**
     * 根据运行模式执行相关的操作
     * @return mixed
     * @throws MyException
     */
    public function setModeRequest()
    {
        $ModeMethod = $this->isModeMethod();
        if ($ModeMethod) {
            return $ModeMethod::ModeRequest();
        } else {
            throw new MyException('MODE_NOT_EXIT');
        }
    }


    /**
     * 根据运行模式执行对应的请求方法
     * @return mixed
     */
    public function getModeRequest()
    {
        return ModeEnum::MODE_REQUEST[$this->mode];
    }


    public function getModeTransFormFactory()
    {
        return ModeEnum::MODE_TRANSFORM_FACTORY[$this->mode];
    }

    /**
     * 判断是否是已经定义的运行模式
     * @return bool
     */
    protected function isModeMethod()
    {
        return isset(ModeEnum::MODE_METHOD[$this->mode]) ? ModeEnum::MODE_METHOD[$this->mode] : false;
    }


}