<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2019/1/3 Time: 下午3:46
// +----------------------------------------------------------------------

namespace Library\Mode;


use Enums\AppEnum;
use Exceptions\MyException;

class FpmMode extends Mode
{
    /**
     * fpm 的相关操作
     * @return mixed
     * @throws MyException
     */
    public static function ModeRequest()
    {
        $getData = $_GET;
        if (!isset($getData['project'])) {
            $default_project = AppEnum::DEFAULT_PROJECT;
            $project         = current($default_project);
        } else {
            $project = $getData['project'];
        }
        if (!in_array($project, AppEnum::ALL_PROJECT)) {
            throw new MyException('PROJECT_IS_NOT_EXIT');
        }
        $class = AppEnum::ALL_PROJECT_FUNCTION[$project];
        return $class;
    }

}