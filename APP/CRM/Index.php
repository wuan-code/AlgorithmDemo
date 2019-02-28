<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2019/2/27 Time: 上午10:44
// +----------------------------------------------------------------------

namespace APP\CRM;


use Response\ResponseData;

class Index
{
    public $type = ['first_level'    => 'getFirstLevel',
                    'second_level'   => 'getSecondLevel',
                    'third_level'    => 'getThirdLevel',
                    'process_result' => 'getProcessResult',];

    protected $STDIN;

    public function __construct($stdIN = '')
    {
        $this->STDIN = $stdIN ? $stdIN[1] : 'first_level';
        $this->getData();
    }

    public function getData()
    {
        if (!in_array($this->STDIN, array_keys($this->type))) {
            ResponseData::error('VARIABLE_NOT_EXIT');
        }
        $function = $this->type[$this->STDIN];
        return call_user_func(array(__CLASS__, $function));
    }


    protected function getFirstLevel()
    {
        $data = [
            ['id'=>1,'name'=>'订单异常'],
            ['id'=>2,'name'=>'物流异常'],
            ['id'=>3,'name'=>'污损处理'],
        ];
        $result = serialize($data);
        ResponseData::success($result);
    }

    protected function getSecondLevel()
    {
        $data2  = [
            1 => [['id' => 11, 'name' => ' 错寄'], ['id' => 12, 'name' => '错付'],
                ['id' => 13, 'name' => '商品部分缺失'], ['id' => 14, 'name' => '私物'],
                ['id' => 15, 'name' => '无']],
            2 => [['id' => 21, 'name' => '失联'], ['id' => 22, 'name' => '拒收'],
                ['id' => 23, 'name' => '主动召回'], ['id' => 24, 'name' => '签收未收'],
                ['id' => 25, 'name' => '物流异常'], ['id' => 26, 'name' => '无']],
            3 => [['id' => 31, 'name' => '普通污损'], ['id' => 32, 'name' => '二次污损'],
                ['id' => 33, 'name' => '无']]
        ];
        $result = serialize($data2);
        ResponseData::success($result);
    }

    protected function getThirdLevel()
    {
        $data3  = [
            11 => [['id' => 111, 'name' => '联系不上']],
            12 => [['id' => 121, 'name' => '联系不上']],
            13 => [['id' => 131, 'name' => '联系不上']],
            14 => [['id' => 141, 'name' => '联系不上']],
            21 => [['id' => 211, 'name' => '联系不上']],
            22 => [['id' => 221, 'name' => '无法收货'], ['id' => 222, 'name' => '不需要了'],
                ['id' => 223, 'name' => '搭配不满意'], ['id' => 224, 'name' => '已从其他渠道购衣'],
                ['id' => 225, 'name' => '其他原因'], ['id' => 227, 'name' => '联系不上'], ['id' => 226, 'name' => '无']],
            23 => [['id' => 231, 'name' => '联系不上']],
            24 => [['id' => 241, 'name' => '联系不上']],
            25 => [['id' => 251, 'name' => '联系不上']],
            26 => [['id' => 261, 'name' => '联系不上']],
            31 => [['id' => 311, 'name' => '不了解试穿规则'], ['id' => 312, 'name' => '对于污损不知情'],
                ['id' => 313, 'name' => '承认污损'], ['id' => 314, 'name' => '联系不上'],
                ['id' => 315, 'name' => '无']],
            32 => [['id' => 321, 'name' => '不了解试穿规则'], ['id' => 322, 'name' => '对于污损不知情'],
                ['id' => 323, 'name' => '承认污损'], ['id' => 324, 'name' => '联系不上'],
                ['id' => 325, 'name' => '无']]
        ];
        $result = serialize($data3);
        ResponseData::success($result);
    }

    protected function getProcessResult()
    {
        $data4  = [
            1 => [['id' => 1, 'name' => ' 安排寄回'], ['id' => 2, 'name' => '等待客户寄回'],
                ['id' => 3, 'name' => '重新定价'], ['id' => 4, 'name' => '暂时无法联系'],
                ['id' => 15, 'name' => '现金转回客户'], ['id' => 16, 'name' => '私物失联保留15天'],
                ['id' => 21, 'name' => '垂衣承担'], ['id' => 22, 'name' => '无须处理'],
                ['id' => 5, 'name' => '无处理结果']],
            2 => [['id' => 6, 'name' => '重新派件'], ['id' => 7, 'name' => '等待召回'],
                ['id' => 8, 'name' => '快递理赔'], ['id' => 17, 'name' => '安排转寄'],
                ['id' => 18, 'name' => '已收到盒子'], ['id' => 19, 'name' => '垂衣承担'],
                ['id' => 20, 'name' => '异常已解决，正常流转'],
                ['id' => 9, 'name' => '无须处理'], ['id' => 10, 'name' => '无处理结果']],
            3 => [['id' => 11, 'name' => '免责'], ['id' => 12, 'name' => '安排寄回'],
                ['id' => 13, 'name' => '拉黑'], ['id' => 23, 'name' => '无须处理']
                , ['id' => 14, 'name' => '无处理结果']]
        ];
        $result = serialize($data4);
        ResponseData::success($result);
    }

}