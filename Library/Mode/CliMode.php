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

class CliMode extends Mode
{
    protected  static  $count = 0;
    protected static $helpType =['show','help','h','ll','ls'];
    protected static $exitType =['exit','die','e','quit'];

    /**
     * cli的相关操作
     * @return mixed
     */
    public static function ModeRequest()
    {
        if (self::$count > 0) {
            echo "请输入要执行的方法或者输入exit结束本次进程\n";
        }
        $stdin = trim(fgets(STDIN));
        if(in_array($stdin,self::$helpType)){
            echo "\n";
            foreach (AppEnum::ALL_PROJECT as $item){
                echo $item."\n";
            }
            echo "\n";
            self::$count++;
            return self::ModeRequest();
        }


        $project = explode(' ',$stdin);
        if (in_array($project[0],self::$exitType)) exit("已结束该请求\n");
        while (!in_array($project[0], AppEnum::ALL_PROJECT)) {
            echo "该方法不存在，请重新输入\n\n";
            self::$count++;
            return self::ModeRequest();
        }
        $class = AppEnum::ALL_PROJECT_FUNCTION[$project[0]];
        unset($project[0]);
        return compact('class','project');

    }
}