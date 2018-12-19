<?php
// +----------------------------------------------------------------------
// | 具体的cli转换类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/18 Time: 下午8:25
// +----------------------------------------------------------------------

namespace Transform\BaseTransform;


use jc21\CliTable;

class CliTransform extends Transform
{
    public  function show($data)
    {
        echo "$data\n\n";
    }

    public  function showTable($data)
    {
        $table = new CliTable();
        $table->setChars(array(
            'top'          => '-',
            'top-mid'      => '+',
            'top-left'     => '+',
            'top-right'    => '+',
            'bottom'       => '-',
            'bottom-mid'   => '+',
            'bottom-left'  => '+',
            'bottom-right' => '+',
            'left'         => '|',
            'left-mid'     => '+',
            'mid'          => '-',
            'mid-mid'      => '+',
            'right'        => '|',
            'right-mid'    => '+',
            'middle'       => '| ',
        ));
        $table->setTableColor('green');
        $table->setHeaderColor('yellow');
        $keys = getKeysByThreeDimensionalArray($data);
        foreach ($keys as $k => $v){
            $table->addField($v, $k);
        }
        $table->injectData($data);
        $table->display();
        echo "\n\n";
    }

}