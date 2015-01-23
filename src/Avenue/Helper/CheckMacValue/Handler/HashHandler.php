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

    public function handle(Request $request)
    {
        $this->request = $request;

        $str = $this->request->getVal();

        $this->request->setVal($this->hash($str));

        if ($this->next) {
            return $this->next->handle($this->request);
        }
    }

    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }

    public function hash($str)
    {
        return 'HashKey=' . $this->hashKey . '&' .  $str . '&HashIV=' . $this->hashIV;
    }
} 