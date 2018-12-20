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

    public function countingSort()
    {

    }


    public function __destruct()
    {

    }

}