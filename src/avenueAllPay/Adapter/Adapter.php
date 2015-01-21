<?php

namespace Avenue\AllPay\Apdater;

use Avenue\AllPay\Apdater\ITarget;
use Avenue\AllPay\Strategy\Search;

class Adapter implements ITarget
{
    /**
     * {@inheritDoc}
     */
    public function init($hashKey, $hashIv, $merchantID) 
    {

    };

    /**
     * {@inheritDoc}
     */
    public function pay(){};

    /**
     * {@inheritDoc}
     */
    public function cancel(){};

    /**
     * {@inheritDoc}
     */
    public function notify(){};

    /**
     * {@inheritDoc} 
     */
    public function search(Search $strategy){};
}