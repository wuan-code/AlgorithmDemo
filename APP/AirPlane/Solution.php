<?php
// +----------------------------------------------------------------------
// | 数飞机的解决方案
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/11 Time: 下午4:38
// +----------------------------------------------------------------------

namespace APP\AirPlane;


use Enums\PlaneEnum;
use Exceptions\MyException;
use Library\ErrorCode;

class Solution
{
    public static $instance;

    private $planeMoment;

    private $planeMomentData;

    private $count = 0;
    private $ans = 0;

    private $airPlanes = [];

    /**
     * 不允许外部实例
     * Solution constructor.
     */
    private function __construct()
    {

    }

    /**
     * 实例该单例模式
     * @return Solution
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Solution();
        }
        return self::$instance;

    }

    /**
     * 禁止clone
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


    /**
     * 声明魔术方法需要两个参数，直接为私有属性赋值时自动调用，并可以屏蔽一些非法赋值
     * @param $property
     * @param $value
     * @throws MyException
     */
    public function __set($property, $value)
    {
        if (!in_array($property, PlaneEnum::SOLUTION_VARIABLE)) {
            throw new MyException('VARIABLE_NOT_EXIT');
        }
        $this->$property = $value;
    }


    /**
     * 在类中添加__get()方法，在直接获取属性值时自动调用一次，以属性名作为参数传入并处理
     * @param $propertyName
     *
     * @return mixed| ErrorCode
     */
    public function __get($propertyName)
    {
        if (!in_array($propertyName, PlaneEnum::SOLUTION_VARIABLE)) {
            return new ErrorCode('VARIABLE_NOT_EXIT');
        }
        return $this->$propertyName;
    }


    /**
     * 转换数组，变成需要的数据
     * @param $property
     * @throws MyException
     */
    public function transformData($property)
    {
        if (!$this->$property || !is_array($this->$property)) {
            throw new MyException('TRANSFORM_DATA_FAIL');
        }
        $data = $property . 'Data';
        foreach ($this->$property as $key => $value) {
            $this->$data[] = ['time' => $value['startTime'], 'flog' => 0];
            $this->$data[] = ['time' => $value['endTime'], 'flog' => 1];
        }
        sort($this->$data);
    }

    public function countOfAirPlanes()
    {
        $maxArray = [];
        foreach ($this->planeMomentData as $key => $value) {
            if ($value['flog'] == 0) {
                $this->count++;
            } else {
                $this->count--;
            }
            $this->ans = max($this->ans, $this->count);
            if ($this->count == $this->ans) {
                $maxArray[$key] = [
                    'time'      => $this->ans,
                    'startTime' => $value['time'],
                ];
            }
            if (in_array($key - 1, array_keys($maxArray))) {
                $maxArray[$key - 1]['endTime'] = $value['time'];
            }
        }
        $this->airPlanes = max($maxArray);
        return [$this->airPlanes, $this->ans];
    }
}