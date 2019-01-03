<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/20 Time: 下午5:37
// +----------------------------------------------------------------------

namespace APP;
use Request\StaticFactory;

trait BaseApp
{
    /**
     * 获取请求的数据，并设置变量
     * @param $enums
     */
    private function getRequest($enums)
    {
        $factory = StaticFactory::factory();
        $result  = $factory->getRequest($enums);
        foreach ($result as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * 设置变量，直接过滤未定义的变量
     * @param $name
     * @param $value
     * @note
     */
    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
        }
    }

}