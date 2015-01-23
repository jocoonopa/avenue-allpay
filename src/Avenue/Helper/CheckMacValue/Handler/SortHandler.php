<?php

namespace Avenue\Helper\CheckMacValue\Handler;

class SortHandler extends Handler
{
    public function mainProcedure()
    {
        $post = $this->request->getVal();
        
        ksort($post);

        return $post;
    }
} 