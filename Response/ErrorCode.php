<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/14 Time: 下午2:57
// +----------------------------------------------------------------------

namespace Response;


use Enums\CodeEnum;

class ErrorCode
{
    public $codeEnum;
    public $code = '';
    public $msg = '';
    public $notice = null;

    public function __construct(string $codeEnum,string $notice = null)
    {
        $this->codeEnum = $codeEnum;
        $code           = CodeEnum::getConstant($codeEnum);
        $this->code     = $code['code'];
        $this->msg      = $code['msg'];
        $this->notice    = $notice;
    }
}