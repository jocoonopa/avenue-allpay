<?php

namespace Avenue\Adapter;

use Avenue\AllInOne;

use Avenue\Adapter\ITarget;

use Avenue\Helper\AccessHelper;
use Avenue\Helper\ServiceURLHelper;
use Avenue\Helper\Param\SendParamHelper;
use Avenue\Helper\Param\SendExtendParamHelper;
use Avenue\Helper\TestConfigHelper;

use Avenue\Strategy\Search;

class Adapter implements ITarget
{
    /**
     * 歐付寶介接元件
     * 
     * @var Avenue\AllInOne
     */
    private $allInOne;

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
        $this->accessor = new AccessHelper($this->allInOne);
        $this->send = new SendParamHelper();
        $this->sendExtend = new SendExtendParamHelper();
    }

    /**
     * {@inheritDoc}
     */
    public function init($hashKey, $hashIv, $merchantID, $isProd = false) 
    {
        $this->accessor
            ->setHashKey($hashKey)
            ->setHashIv($hashIv)
            ->setMerchantID($merchantID)
            ->setServiceURL($isProd ? ServiceURLHelper::PROD : ServiceURLHelper::TEST)
        ;

        return $this;
    }

    /**
     * 將元件初始化為測試狀態
     */
    public function initTest()
    {
        return $this->init(TestConfigHelper::HASH_KEY, TestConfigHelper::HASH_LV, TestConfigHelper::MERCHANT_ID, false);
    }

    /**
     * {@inheritDoc}
     */
    public function pay(array $send)
    {
        foreach ($send as $key => $val) {
            call_user_func_array(array($this->send, 'set' . $key), array($val));
        }

        $this->allInOne->Send = array_merge($this->allInOne->Send, $this->send->getDataProvider());
        $this->allInOne->SendExtend = array_merge($this->allInOne->SendExtend, $this->sendExtend->getDataProvider());

        return $this->allInOne->CheckOutString(($this->accessor->getServiceURL() === ServiceURLHelper::TEST) ? '送出' : null);
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