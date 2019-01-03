<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | author    武安y<yaobin24@126.com>
// +----------------------------------------------------------------------
// | note
// +----------------------------------------------------------------------
// | Date       2018/12/20 Time: 下午2:33
// +----------------------------------------------------------------------

namespace Request;


class CliRequest implements Request
{
    private $_count = 0;

    public function getRequest(array $data)
    {
        if ($this->_count == 0) {
            echo "请输入相关的信息:\n";
        } else {
            echo "输入的信息不正确，请重新输入:\n";
        }
        $request = trim(fgets(STDIN));
        if ($request == 'exit') exit("已结束该请求\n");
        $request = explode(',', $request);
        while (count($request) != count($data) || (count($request) == 1 && empty($request[0]))) {
            $this->_count++;
            return $this->getRequest($data);
        }
        $result = array_combine($data, $request);
        return $result;

    }
}