<?php
// +----------------------------------------------------------------------
// | 计数排序
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note 假设我们有一个待排序的整数序列A，其中元素的最小值不小于0，最大值不超过K。
// |             建立一个长度为K的线性表C，用来记录不大于每个值的元素的个数。
// +----------------------------------------------------------------------
// | Date       2018/12/20 Time: 下午2:12
// +----------------------------------------------------------------------

namespace APP\CountingSort;

use APP\BaseApp;
use Enums\SortEnum;
use Transform\BucketSortTransform;

class Index
{
    use BaseApp;

    protected $maximum;
    protected $num;

    public function __construct()
    {
        $this->getRequest(SortEnum::COUNTING_SORT);
        $this->countingSort();
    }

    /**
     * 计数排序
     */
    public function countingSort()
    {
        $requestArray = $result = [];
        // 生成数组
        for ($i = 1; $i <= $this->num; $i++) {
            $requestArray[$i] = rand(1, $this->maximum);
        }
        $startTime = microtime(true);
        // 计算待排序的数组中每个元素的个数
        $newArray = [];
        foreach ($requestArray as $key => $value) {
            $newArray[$value]['count'] = isset($newArray[$value]) ? $newArray[$value]['count'] + 1 : 1;
        }
        ksort($newArray);
        foreach ($newArray as $k => $v) {
            for ($j = 0; $j < $v['count']; $j++) {
                $result[] = $k;
            }
        }
        $endTime = microtime(true);
        $timeUse = $endTime - $startTime;
        BucketSortTransform::show("初始化生成的数据:");
        BucketSortTransform::show($requestArray);
        BucketSortTransform::show("计算的结果是:");
        BucketSortTransform::show($result);
        BucketSortTransform::show("用时时长:" . $timeUse);
    }


    public function __destruct()
    {

    }

}