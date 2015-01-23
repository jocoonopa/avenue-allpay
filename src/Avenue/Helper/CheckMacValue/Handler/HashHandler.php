<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class HashHandler extends Handler
{
    private $hashKey;

    private $hashIV;

    public function __construct($hashKey, $hashIV)
    {
        $this->hashKey = $hashKey;

        $this->hashIV = $hashIV;
    }

    public function mainProcedure()
    {
        return 'HashKey=' . $this->hashKey . '&' .  $this->request->getVal() . '&HashIV=' . $this->hashIV;
    }
} 