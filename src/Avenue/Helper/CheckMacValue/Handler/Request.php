<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class Request
{
    private $val;

    public function __construct($val)
    {
        $this->val = $val;
    }

    public function setVal($val)
    {
        $this->val = $val;

        return $this;
    }

    public function getVal()
    {
        return $this->val;
    }
}