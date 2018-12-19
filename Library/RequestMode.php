<?php
// +----------------------------------------------------------------------
// | 获取请求方式的final类，继承Request抽象类(需全部实现抽象类中的方法)
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note   final类其实可以继承，但是默认一般为最终类，所以规则上不允许继承
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 上午10:51
// +----------------------------------------------------------------------

namespace Library;


use Enums\ModeEnum;
use Enums\AppEnum;
use Exceptions\MyException;

final class RequestMode extends Mode
{
    public $count = 0;

    /**
     * 根据运行模式执行相关的操作
     * @return mixed
     * @throws MyException
     */
    public function getMode()
    {
        if (in_array($GLOBALS['mode'], ModeEnum::MODE_METHOD)) {
            $function = ModeEnum::MODE_FUNCTION[$GLOBALS['mode']];
            // 调用自定义函数(call_user_func)
            return call_user_func(array(__CLASS__, $function));
        }
        throw new MyException('MODE_NOT_EXIT');
    }

    /**
     * cli的相关操作
     * @return mixed
     */
    public function cliMode()
    {
//        if ($this->count > 0) {
//            echo "请输入要执行的方法或者输入exit结束本次进程\n";
//        }
//        $project = trim(fgets(STDIN));
//        if ($project == 'exit') exit("已结束该请求\n");
        $project         = 'bucketSort';
        while (!in_array($project, AppEnum::ALL_PROJECT)) {
            echo "该方法不存在，请重新输入\n\n";
            $this->count++;
            return $this->getMode();
        }
        $class = AppEnum::ALL_PROJECT_FUNCTION[$project];
        return $class;

    }

    /**
     * fpm 的相关操作
     * @return mixed
     * @throws MyException
     */
    public function fpmMode()
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