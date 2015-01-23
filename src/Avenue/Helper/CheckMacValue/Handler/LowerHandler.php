<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class LowerHandler extends Handler
{
    public function mainProcedure()
    {
        return strtolower($this->request->getVal());
    }
} 