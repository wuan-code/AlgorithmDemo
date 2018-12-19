<?php
// +----------------------------------------------------------------------
// | 桶排序的基本算法
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/18
// +----------------------------------------------------------------------

namespace App\BucketSort;


use Transform\BucketSortTransform;

class Index
{
    protected $data = [
        ['id' => 1, 'name' => '刘一', 'weight' => 10],
        ['id' => 2, 'name' => '陈二', 'weight' => 20],
        ['id' => 3, 'name' => '张三', 'weight' => 30],
        ['id' => 4, 'name' => '李四', 'weight' => 40],
        ['id' => 5, 'name' => '王五', 'weight' => 50],
        ['id' => 6, 'name' => '赵六', 'weight' => 60],
        ['id' => 7, 'name' => '孙七', 'weight' => 70],
        ['id' => 8, 'name' => '周八', 'weight' => 80],
        ['id' => 9, 'name' => '吴九', 'weight' => 90],
        ['id' => 10, 'name' => '郑十', 'weight' => 100],
        ['id' => 11, 'name' => 'Tom', 'weight' => 80],
        ['id' => 12, 'name' => 'John', 'weight' => 99],
        ['id' => 13, 'name' => 'Foo', 'weight' => 70],
        ['id' => 14, 'name' => 'Muller', 'weight' => 25],
        ['id' => 15, 'name' => 'Stephen', 'weight' => 80],
    ];


    public function __construct()
    {
        $this->showData();
    }


    public function showData()
    {
        // 页面展示
        BucketSortTransform::show( $this->data,true);
    }
}