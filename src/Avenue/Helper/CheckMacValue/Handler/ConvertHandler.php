<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class ConvertHandler extends Handler
{
    public function handle(Request $request)
    {
        $this->request = $request;

        $post = $this->request->getVal();

        $this->request->setVal($this->convert($post));

        if ($this->next) {
            return $this->next->handle($this->request);
        }
    }

    public function setNext(Handler $handler)
    {
        $this->next = $handler;
    }

    protected function convert(array $arr)
    {
        $str = '';

        foreach ($arr as $key => $val) {
            $str .= $key . '=' . $val . '&';
        }

        return substr($str, 0, -1);
    }
} 