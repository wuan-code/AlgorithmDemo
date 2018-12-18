<?php
// +----------------------------------------------------------------------
// | 生成红包
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/4 Time: 下午5:03
// +----------------------------------------------------------------------

namespace APP\Reward;


use Response\ResponseData;

class Reward
{
    private  $total;
    private $num ;
    private $max;
    private $min;

    /**
     * CreateReward constructor.
     * @param   int $total 红包总金额
     * @param   int $num 红包总数量
     * @param   int $max 红包最大值
     * @param float $min
     */
    public function __construct($total = 100, $num = 10 , $max =10, $min =0.1)
    {
        $this->total = $total;
        $this->num = $num;
        $this->max = $max;
        $this->min = $min;
        $this->random_red();

    }


    /**
     * 红包实现类
     */
    public  function random_red()
    {
        #总共要发的红包金额，留出一个最大值;
        $total        = $this->total - $this->max;
        $reward = Solution::getInstance();
        $result_merge = $reward->splitReward($total, $this->num, $this->max - $this->min, $this->min);
        sort($result_merge);
        $result_merge[1] = $result_merge[1] + $result_merge[0];
        $result_merge[0] = $this->max * 100;
        foreach ($result_merge as &$v) {
            $v = floor($v) / 100;
        }
        $this->show($result_merge);
    }

    /**
     * @return bool
     */
    public function show($data)
    {
        ResponseData::success('TODO');
    }



}