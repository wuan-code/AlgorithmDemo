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

    public static function otherShow($data)
    {
        $bucketData = [];
        foreach ($data as $key => $item) {
            $userData     = implode(array_column($item['data'], 'name'), ',');
            $bucketData[] = [
                'weight'   => $item['weight'],
                'userData' => $userData,
                'count'    => $item['count'],
            ];
        }
        self::showTable($bucketData);
    }


}