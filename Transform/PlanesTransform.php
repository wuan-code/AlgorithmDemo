<?php
// +----------------------------------------------------------------------
// | 数飞机算法的转化数据实现类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note  不用抽象类，是因为可能添加其他的方法，现在只实例化了抽象类的show()方法
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午4:58
// +----------------------------------------------------------------------

namespace Transform;


use jc21\CliTable;
use jc21\CliTableManipulator;

class PlanesTransform extends Transform
{

    public static function show($data, $table = false)
    {
        if (!isset(self::$factory)) self::setFactory();
        $factory = (new self::$factory)->create();
        if ($table) {
            $factory->showTable($data);
        } else {
            $factory->show($data);
        }

    }

}