<?php
// +----------------------------------------------------------------------
// | Fpm显示类型的工厂类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/18 Time: 下午8:27
// +----------------------------------------------------------------------

namespace Transform\TransformFactory;


use Transform\BaseTransform\FpmTransform;

class FpmFactory implements Factory
{
    public function create()
    {
        return new FpmTransform();
    }

}