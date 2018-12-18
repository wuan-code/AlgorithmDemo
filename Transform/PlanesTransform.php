<?php
// +----------------------------------------------------------------------
// | 转换返回数据
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午4:58
// +----------------------------------------------------------------------

namespace Transform;


use jc21\CliTable;
use jc21\CliTableManipulator;

class PlanesTransform extends Transform
{
    /**
     * 页面显示
     * @param $data
     * @param string $function
     * @return mixed
     */
    public static function show($data, $function = '')
    {
        self::setReturnType($function);
        return call_user_func_array(array(__CLASS__, self::$returnType), [$data]);
    }

    public static function json($data)
    {
        if (self::$function == 'Table') {
            self::jsonTable($data);
        } else {
            echo "$data<br/>";
        }
    }

    public static function print($data)
    {
        if (self::$function == 'Table') {
            self::printTable($data);
        } else {
            echo "$data\n\n";
        }
    }


    public static function jsonTable($data)
    {
        // 页面展示
        echo "<table style='font-size:12px;width:600px;border:1px solid #ccc;text-align:center;'><thead><tr>";
        foreach ($data[0] as $key => $value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr></thead><tbody>";

        foreach ($data[1] as $key => $val) {
            echo "<tr>";
            foreach ($val as $k => $v) {
                echo "<td>{$v}</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }


    /**
     * 终端显示(使用composer的依赖包)
     * @param $data
     */
    public static function printTable($data)
    {
        $table = new CliTable();
        $table->setTableColor('green');
        $table->setHeaderColor('cyan');
        $table->addField('plane', 'plane');
        $table->addField('startTime', 'startTime');
        $table->addField('endTime', 'endTime');
        $table->injectData($data[1]);
        $table->display();
        echo "\n\n";
    }


}