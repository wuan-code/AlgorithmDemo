<?php
// +----------------------------------------------------------------------
// | 桶排序的基本算法
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note 桶排序适用于元素集合不大的场景:例如排行榜（0-100分）
// +----------------------------------------------------------------------
// | Date       2018/12/18
// +----------------------------------------------------------------------

namespace APP\BucketSort;


use APP\BaseApp;
use Enums\SortEnum;
use Transform\BucketSortTransform;

class Index
{
    use BaseApp;

    public $bucketSortSolution;

    protected $num;

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
        $this->bucketSortSolution = Solution::getInstance();
        $this->show();
        $this->bucketSort();
        $this->sameProportionSort();
    }


    /**
     * 原始数据显示
     */
    private function show()
    {
        BucketSortTransform::show("原始数据:");
        BucketSortTransform::showTable($this->data);
    }


    /**
     * 基本桶排序
     */
    private function bucketSort()
    {
        $startTime = microtime(true);
        $newData   = $this->bucketSortSolution->bucketSort($this->data);
        $endTime   = microtime(true);
        $timeUse   = $endTime - $startTime;
        BucketSortTransform::show("桶排序的计算结果:");
        BucketSortTransform::otherShow($newData);
        BucketSortTransform::show("使用时间:" . $timeUse);

    }

    /**
     * 按照权重比例随机排序
     */
    public function sameProportionSort()
    {
        // 获取需要用户输入的数据
        $this->getRequest(SortEnum::BUCKET_SORT);

        $useData   = [];
        $startTime = microtime(true);
        $sortData  = $this->bucketSortSolution->sameProportionSort($this->num, $this->data);
        for ($i = 0; $i < $this->num; $i++) {
            $useData[$i]       = $this->bucketSortSolution->useData($sortData);
            $useData[$i]['id'] = $i + 1;
        }
        $endTime = microtime(true);
        $timeUse = $endTime - $startTime;
        $newData = [];
        foreach ($useData as $item) {
            if (isset($newData[$item['manege_id']])) {
                $newData[$item['manege_id']]['count'] += 1;
            } else {
                $newData[$item['manege_id']] = [
                    'id'     => $item['manege_id'],
                    'name'   => $item['name'],
                    'weight' => $item['weight'],
                    'count'  => 1,
                ];
            }
        }
        BucketSortTransform::show("具体分配详情:");
        BucketSortTransform::showTable($useData);
        BucketSortTransform::show("按权重比例随机的排序");
        BucketSortTransform::show(str_repeat('-*-*', 10));
        foreach ($newData as $key => $value) {
            BucketSortTransform::show("操作人id:{$value['id']}\t名字:{$value['name']}\t权重:{$value['weight']}\t次数:{$value['count']}\t\t\t比例:" . round(($value['count'] / $this->num * 100), 2) . "%");
        }
        BucketSortTransform::show(str_repeat('-*-*', 10));
        BucketSortTransform::show("使用时间:" . $timeUse);
    }
}