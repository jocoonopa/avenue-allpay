<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class ConvertHandler extends Handler
{
    public function mainProcedure()
    {
        $str = '';

        foreach ($this->request->getVal() as $key => $val) {
            $str .= $key . '=' . $val . '&';
        }

        return substr($str, 0, -1);
    }
} 