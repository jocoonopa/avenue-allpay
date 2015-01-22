<?php

namespace Avenue\Helper;

use Avenue\AllInOne;

class AccessHelper
{
    /**
     * 歐付寶介接元件
     * 
     * @var Avenue\AllInOne
     */
    private $allInOne;

    public function __construct(AllInOne $allInOne)
    {
        $this->allInOne = $allInOne;
    }

    public function setHashIv($val)
    {
        $this->allInOne->HashIv = $val;

        return $this;
    }

    public function getHashIv()
    {
        return $this->allInOne->HashIv;
    }

    public function setHashKey($val)
    {
        $this->allInOne->HashKey = $val;

        return $this;
    }

    public function getHashKey()
    {
        return $this->allInOne->HashKey;
    }

    public function setMerchantID($val)
    {
        $this->allInOne->MerchantID = $val;

        return $this;
    }

    public function getMerchantID()
    {
        return $this->allInOne->MerchantID;
    }

    public function setServiceURL($val)
    {
        $this->allInOne->ServiceURL = $val;

        return $this;
    }

    public function getServiceURL()
    {
        return $this->allInOne->ServiceURL;
    }
}