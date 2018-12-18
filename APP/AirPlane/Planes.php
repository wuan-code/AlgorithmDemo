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

    public function __construct()
    {
        $this->planeMoment = [
            ['plane'=>1,'startTime' => 1, 'endTime' => 10],
            ['plane'=>2,'startTime' => 2, 'endTime' => 3],
            ['plane'=>3,'startTime' => 5, 'endTime' => 8],
            ['plane'=>4,'startTime' => 4, 'endTime' => 7]
        ];
        $this->planes();
    }

    public function planes()
    {
        // 页面展示
        $table = [
            ['飞机','起飞时间','降落时间'],
        ];
        array_push($table,$this->planeMoment);
        PlanesTransform::show($table,'Table');
        //实例化单例模式
        $planeSolution = Solution::getInstance();
        // 调用 __set()魔术方法，设置初始值
        try {
            $planeSolution->planeMoment = $this->planeMoment;
        } catch (MyException $e) {
           ResponseData::error($e);
        }

        /* //调用__get()魔术方法，获取数据
        $getPlanesMoment = $planeSolution->planeMoment;
        if($getPlanesMoment instanceof ErrorCode){
            TraitResponse::fail($getPlanesMoment);
        }*/

        $result = $planeSolution->countOfAirPlanes();
        if($result instanceof ErrorCode) ResponseData::error($result);
        PlanesTransform::show("空中最多有 {$result['ans']} 架飞机");
        PlanesTransform::show("最多飞机的时间段为 {$result['airPlanes']['startTime']} 点 - {$result['airPlanes']['endTime']}点");
    }


    public function __destruct()
    {

    }

}