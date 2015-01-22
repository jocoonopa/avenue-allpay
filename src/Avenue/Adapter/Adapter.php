<?php

namespace Avenue\Adapter;

use Avenue\AllInOne;

use Avenue\Adapter\ITarget;

use Avenue\Helper\AccessHelper;
use Avenue\Helper\ServiceURLHelper;
// use Avenue\Helper\Param\SendParamHelper;
// use Avenue\Helper\Param\SendExtendParamHelper;
use Avenue\Helper\TestConfigHelper;

use Avenue\Strategy\Search;

class Adapter implements ITarget
{
    /**
     * 歐付寶介接元件
     * 
     * @var Avenue\AllInOne
     */
    public $allInOne;

    /**
     * 歐付寶屬性存取元件
     * 
     * @var Avenue\Helper\AccessHelper
     */
    private $accessor;

    /**
     * 歐付寶建立訂單 POST參數存取元件
     * 
     * @var Avenue\Helper\SendHelper
     */
    private $send;

    /**
     * 歐付寶建立訂單 POST延伸參數存取元件
     * 
     * @var Avenue\Helper\SendExtendHelper
     */
    private $sendExtend;

    public function __construct()
    {
        $this->allInOne = new AllInOne;
    }

    /**
     * {@inheritDoc}
     */
    public function init($hashKey, $hashIV, $merchantID, $isProd = false) 
    {
        $this->allInOne
            ->setHashKey($hashKey)
            ->setHashIV($hashIV)
            ->setMerchantID($merchantID)
            ->setServiceURL($isProd ? ServiceURLHelper::PROD : ServiceURLHelper::TEST)
        ;

        return $this;
    }

    /**
     * 將元件初始化為測試狀態
     */
    public function initTest($isProd = false)
    {
        return $this->init(TestConfigHelper::HASH_KEY, TestConfigHelper::HASH_IV, TestConfigHelper::MERCHANT_ID, $isProd);
    }

    /**
     * {@inheritDoc}
     */
    public function pay(array $send)
    {
        foreach ($send as $key => $val) {
            call_user_func_array(array($this->allInOne, 'set' . $key), array($val));
        }

        try {
            return $this->allInOne->CheckOutString(($this->allInOne->getServiceURL() === ServiceURLHelper::TEST) ? '送出' : null);
        } catch (\Exception $e) {
            throw $e;
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function cancel(){}

    /**
     * {@inheritDoc}
     */
    public function notify(){}

    /**
     * {@inheritDoc} 
     */
    public function search(Search $strategy){}
}