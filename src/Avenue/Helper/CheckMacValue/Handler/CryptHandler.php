<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class CryptHandler extends Handler
{
    public function mainProcedure()
    {
        return strtoupper(md5($this->request->getVal()));
    }
} 