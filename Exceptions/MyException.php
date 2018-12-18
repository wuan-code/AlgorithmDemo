<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/11 Time: 下午8:00
// +----------------------------------------------------------------------

namespace Exceptions;



use Response\ErrorCode;

class MyException extends \Exception implements InterfaceException
{
    protected $errorCode;
    protected $codeName;
    protected $notice;

    public function __construct(string $codeName, string $notice = null)
    {
        $this->codeName  = $codeName;
        $this->notice    = $notice;
        $this->errorCode = new ErrorCode($codeName, $notice);
        parent::__construct($this->errorCode->msg, $this->errorCode->code);
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }
}