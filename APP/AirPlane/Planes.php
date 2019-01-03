<?php
// +----------------------------------------------------------------------
// | 数飞机——扫描线算法基础
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/11 Time: 下午4:37
// +----------------------------------------------------------------------

namespace APP\AirPlane;


use Exceptions\MyException;
use Response\ErrorCode;
use Response\ResponseData;
use Transform\PlanesTransform;

class Planes
{
    public $planeMoment = [];
    public $planeSolution;

    public function __construct()
    {
        $this->planeMoment = [
            ['plane'=>1,'startTime' => 1, 'endTime' => 10],
            ['plane'=>2,'startTime' => 2, 'endTime' => 3],
            ['plane'=>3,'startTime' => 5, 'endTime' => 8],
            ['plane'=>4,'startTime' => 4, 'endTime' => 7]
        ];
        $this->planeSolution = Solution::getInstance();
        $this->planes();
    }

    /**
     * 设置变量
     * @param $name
     * @param $value
     * @note 过滤未定义的变量
     */
    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
        }
    }

    public function planes()
    {
        // 页面展示
        PlanesTransform::showTable($this->planeMoment);

        // 调用 __set()魔术方法，设置初始值
        try {
            $this->planeSolution->planeMoment = $this->planeMoment;
        } catch (MyException $e) {
           ResponseData::error($e);
        }

        /*
        $getPlanesMoment = $planeSolution->planeMoment;
        if($getPlanesMoment instanceof ErrorCode){
            ResponseData::error($getPlanesMoment);
        }*/

        $result = $this->planeSolution->countOfAirPlanes();
        if($result instanceof ErrorCode) ResponseData::error($result);
        PlanesTransform::show("空中最多有 {$result['ans']} 架飞机");
        PlanesTransform::show("最多飞机的时间段为 {$result['airPlanes']['startTime']} 点 - {$result['airPlanes']['endTime']}点");
    }


    public function __destruct()
    {

    }

}