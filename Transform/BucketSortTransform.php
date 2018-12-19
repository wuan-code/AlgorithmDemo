<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/19 Time: 上午10:28
// +----------------------------------------------------------------------

namespace Transform;


class BucketSortTransform extends Transform
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