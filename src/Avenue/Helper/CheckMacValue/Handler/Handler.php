<?php

namespace Avenue\Helper\CheckMacValue\Handler;

abstract class Handler
{
    protected $next;
    protected $request;

    abstract public function handle(Request $request);
    abstract public function setNext(Handler $handler);

    public function getRequest()
    {
        return $this->request;
    }
}