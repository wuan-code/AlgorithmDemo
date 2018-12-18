<?php
// +----------------------------------------------------------------------
// | 扩展方法库
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/18 Time: 下午4:44
// +----------------------------------------------------------------------


if (!function_exists("transformPlanes")) {
    /**
     * 转换飞机的数据
     * @param $data
     * @return array
     */
     function transformPlanes($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            $result[] = ['time' => $value['startTime'], 'flog' => 0];
            $result[] = ['time' => $value['endTime'], 'flog' => 1];
        }
        sort($result);
        return $result;
    }
}



if (!function_exists("getKeysByThreeDimensionalArray")) {
    /**
     * 获取三维数组的keys
     * @param $data
     * @return array
     */
    function getKeysByThreeDimensionalArray($data)
    {
        $keys = [];
        foreach ($data as  $value){
            foreach ($value as $k => $v){
                $keys[$k]= $k;
            }
        }
        return $keys;
    }
}