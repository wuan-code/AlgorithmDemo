<?php
// +----------------------------------------------------------------------
// |  桶排序的实现类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/19 Time: 上午10:27
// +----------------------------------------------------------------------

namespace APP\BucketSort;


class Solution
{

    public static $instance;

    /**
     * 不允许外部实例
     * Solution constructor.
     */
    private function __construct()
    {

    }

    /**
     * 实例该单例模式
     * @return Solution
     */
    public static function getInstance()
    {
        if (!(self::$instance)) {
            self::$instance = new Solution();
        }
        return self::$instance;

    }

    /**
     * 禁止clone
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


    /**
     * 桶排序的基本算法
     * @param $data
     * @note  根据权重的最大值和最小值，创建相应的桶。
     *          建桶,入桶，出桶
     * @return mixed
     */
    public function bucketSort($data)
    {
        $weight     = array_column($data, 'weight');
        $max_weight = max($weight);
        $min_weight = min($weight);
        //生成桶,默认每个桶中数据只有0个
        $bucket = array_fill($min_weight, $max_weight - $min_weight + 1, 0);
        foreach ($data as $item) {
            //建桶
            if (!$bucket[$item['weight']]) {
                $bucket[$item['weight']] = ['weight' => $item['weight'], 'count' => 0, 'data' => []];
            }
            //入桶
            $bucket[$item['weight']]['count']++;
            $bucket[$item['weight']]['data'][] = ['id' => $item['id'], 'name' => $item['name']];
        }
        // 出桶
        $result = [];
        foreach ($bucket as $key => $value) {
            if (is_array($value) > 0) {
                $result[$key] = $value;

            }
        }
        return $result;
    }

    /**
     * 根据每个用户不同的权重，添加等比例的桶
     * @param int $count 操作总数
     * @param $data
     * @return mixed
     */
    public function sameProportionSort(int $count, &$data)
    {
        $sum_weight     = array_sum(array_map('end', $data));
        $send_count     = 0;
        $employee_count = count($data);
        foreach ($data as $key => &$employee) {
            $per_weight = $employee['weight'] / $sum_weight;
            if ($key == $employee_count - 1) {
                $employee['count'] = $count - $send_count;
            } else {
                $distribut_count   = round($per_weight * $count);
                $employee['count'] = $distribut_count;
                $send_count        += $distribut_count;
            }
            if (empty($employee['count'])) {
                unset($data[$key]);
            }
        }
        return array_values($data);
    }

    /**
     * 计算出来的桶排序的数据的使用
     * @param $data
     * @return array|int
     */
    public function useData(&$data)
    {
        $user = [];
        if ($data) {
            $key = rand(0, count($data) - 1);
            if (isset($data[$key])) {
                $user = [
                    'manege_id' => $data[$key]['id'],
                    'name'      => $data[$key]['name'],
                    'weight'    => $data[$key]['weight'],
                ];
                if ($data[$key]['count'] == 1) {
                    unset($data[$key]);
                    $data = array_values($data);
                } else {
                    $data[$key]['count'] -= 1;
                }
            }
        }
        return $user;
    }
}