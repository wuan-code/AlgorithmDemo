<?php
// +----------------------------------------------------------------------
// | 具体的fpm转换类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/18 Time: 下午8:25
// +----------------------------------------------------------------------

namespace Transform\BaseTransform;


class FpmTransform extends Transform
{
    public  function show($data)
    {
        echo "$data<br/>";
    }

    public  function showTable($data)
    {
        // 页面展示
        echo "<table style='font-size:12px;width:600px;border:1px solid #ccc;text-align:center;'><thead><tr>";

        $keys = getKeysByThreeDimensionalArray($data);
        foreach ($keys as $k => $v){
            echo "<td>{$v}</td>";
        }
        echo "</tr></thead><tbody>";

        foreach ($data as $key => $val) {
            echo "<tr>";
            foreach ($val as $k => $v) {
                echo "<td>{$v}</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

}