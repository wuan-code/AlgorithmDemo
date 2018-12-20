<?php
// +----------------------------------------------------------------------
// | 应用的枚举类
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午4:40
// +----------------------------------------------------------------------

namespace Enums;


class AppEnum
{
    // 默认的项目
    const DEFAULT_PROJECT = ['plane'];
    // 所有可执行的项目
    const ALL_PROJECT = ['plane', 'reward', 'bucketSort', 'countingSort'];
    // 项目对应的方法（其实可以合并在一起，用array_keys()方法来获取key）
    const ALL_PROJECT_FUNCTION = ['plane'        => 'APP\AirPlane\Planes',
                                  'reward'       => 'APP\Reward\Reward',
                                  'bucketSort'   => 'APP\BucketSort\Index',
                                  'countingSort' => 'APP\CountingSort\Index'];

}