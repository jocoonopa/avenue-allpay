<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class SortHandler extends Handler
{
    public function handle(Request $request)
    {
        $this->request = $request;

        $post = $this->request->getVal();
        
        ksort($post);

        $this->request->setVal($post);

        if ($this->next) {
            return $this->next->handle($this->request);
        }
    }

    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }
} 