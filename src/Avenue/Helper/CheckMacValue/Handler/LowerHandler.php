<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class LowerHandler extends Handler
{
    public function handle(Request $request)
    {
        $this->request = $request;

        $str = $this->request->getVal();

        $this->request->setVal(strtolower($str));

        if ($this->next) {
            return $this->next->handle($this->request);
        }
    }

    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }
} 