<?php

namespace Avenue\Helper\CheckMacValue;

use Avenue\Helper\CheckMacValue\Handler\ConvertHandler;
use Avenue\Helper\CheckMacValue\Handler\CryptHandler;
use Avenue\Helper\CheckMacValue\Handler\HashHandler;
use Avenue\Helper\CheckMacValue\Handler\LowerHandler;
use Avenue\Helper\CheckMacValue\Handler\SortHandler;
use Avenue\Helper\CheckMacValue\Handler\UrlencodeHandler;
use Avenue\Helper\CheckMacValue\Handler\Request;

class CheckMacValueHelper
{
    private $val;

    private $lastHandler;

    public function __construct(array $post, $hashKey, $hashIV)
    {
        if (!is_array($post)) {
            return $this;
        }

        $convertHandler = new ConvertHandler();
        $this->lastHandler = $cryptHandler = new CryptHandler();
        $hashHandler = new HashHandler($hashKey, $hashIV);
        $lowerHandler = new LowerHandler();
        $sortHandler = new SortHandler();
        $urlencodeHandler = new UrlencodeHandler();

        // 設定接班人
        $sortHandler->setNext($convertHandler);
        $convertHandler->setNext($hashHandler);
        $hashHandler->setNext($urlencodeHandler);
        $urlencodeHandler->setNext($lowerHandler);
        $lowerHandler->setNext($this->lastHandler);

        $request = new Request($post);

        // 責任鏈開始
        $sortHandler->handle($request);
    }

    public function getVal()
    {
        return $this->lastHandler->getRequest()->getVal();
    }
}