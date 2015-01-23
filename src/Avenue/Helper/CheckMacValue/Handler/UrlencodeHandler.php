<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class UrlencodeHandler extends Handler
{
    public function mainProcedure()
    {
        return urlencode($this->request->getVal());
    }
} 