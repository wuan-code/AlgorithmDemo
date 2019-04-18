<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2019/3/22 Time: 下午10:39
// +----------------------------------------------------------------------

namespace APP\Common;


use Response\ResponseData;

class Convert
{
    private $request_data;

    /**
     * Convert constructor.
     * @param string $request
     */
    public function __construct($request = '')
    {
        $this->request_data = $request ?: 'Many people spell MySQL incorrectly';
        $this->convert();

    }

    /**
     * 反转数据的方法
     * @note : 验证输入的数据是否全部是字母
     *        将字符串转换为数组（以空格为条件）
     *        遍历数组
     *          1、反转字母
     *          2、遍历原字母
     *              正则判断每个单词的大小写，将反转的字母变成同样的大小写(strtoupper()和strtolower())
     *
     */
    public function convert()
    {
        // 验证输入是否全部被是字母
        if (!preg_match("/^[a-zA-Z\s]+$/", $this->request_data)) {
            echo "输入的数据存在非字母数据".PHP_EOL;
            return;
        }
        //  将字符串转换为数组
        $new_data = explode(" ", $this->request_data);
        $result   = '';
        // 遍历数组,实现反转数据
        foreach ($new_data ?? [] as $key => $value) {
            $convert_data = strrev($value);
            $data         = '';
            for ($i = 0; $i < strlen($value); $i++) {
                if (preg_match('/^[A-Z]+$/', $value[$i])) {
                    $data .= strtoupper($convert_data[$i]);
                } else {
                    $data .= strtolower($convert_data[$i]);
                }
            }
            $result .= $data . ' ';
        }
        $result = trim($result);
        echo $result.PHP_EOL;
    }
}