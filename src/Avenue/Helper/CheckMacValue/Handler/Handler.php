<?php

namespace Avenue\Helper\CheckMacValue\Handler;

abstract class Handler
{
    protected $next;
    protected $request;

    public function handle(Request $request)
    {
        $this->request = $request;

        $this->request->setVal($this->mainProcedure());

        if ($this->next) {
            return $this->next->handle($this->request);
        }
    }
    
    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }

    public function getRequest()
    {
        return $this->request;
    }

    abstract function mainProcedure();
}