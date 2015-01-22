<?php

namespace Avenue;

use Avenue\PaymentMethod;
use Avenue\Adapter\Adapter;
use Avenue\Helper\ServiceURLHelper;

class AdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * 參考來源: http://aaronsaray.com/blog/2011/08/16/testing-protected-and-private-attributes-and-methods-using-phpunit/
     * 
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function initProvider()
    {
        return array(
          array('', 123, 123, false),
          array('test', 'test', false, true),
          array(1, 'vmaskldmamd@@!@#!@312m31231m231m3', '12312lk3m1lkm23lm1k23m', '2'),
          array(1, 1, 3, false)
        );
    }

    /**
     * @dataProvider initProvider
     */
    public function testInit($hashKey, $hashIv, $merchantID, $isProd)
    {
        /**
         * 歐付寶轉接元件
         * 
         * @var Avenue\Adapter\Adapter
         */
        $adapter = new Adapter();

        /**
         * 透過 PHPUnit 內建的方法取得私有屬性 $accessor，
         * accessor 在這邊會當做 AllInOne 的 getter/setter
         * 
         * @var Avenue\Helper\Accessor
         */
        // $accessor = \PHPUnit_Framework_Assert::readAttribute($adapter, 'accessor');

        $adapter->init($hashKey, $hashIv, $merchantID, $isProd);

        //$this->invokeMethod($user, 'cryptPassword', array('passwordToCrypt'));
        
        $this->assertEquals($hashKey, $adapter->allInOne->getHashKey());
        $this->assertEquals($hashIv, $adapter->allInOne->getHashIV());
        $this->assertEquals($merchantID, $adapter->allInOne->getMerchantID());
        $this->assertEquals(($isProd ? ServiceURLHelper::PROD : ServiceURLHelper::TEST), $adapter->allInOne->getServiceURL());
    }

    public function initTestProvider()
    {
        /**
         * 歐付寶轉接元件
         * 
         * @var Avenue\Adapter\Adapter
         */
        $adapter = new Adapter();

        $adapter->initTest();

        return array(
            array(
                $adapter,
                array(
                    'ReturnURL' => 'http://www.google.com',
                    'MerchantTradeNo' => rand(0, 1000000),
                    'MerchantTradeDate' => date('Y/m/d H:i:s'),
                    'TradeDesc' => '---------',
                    'ChoosePayment' => PaymentMethod::ALL,
                    'Remark' => '',
                    'TotalAmount' => 0,
                    'Items' => array(
                        array(
                            'Name' => 'Test1',
                            'Price' => 100,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        ),
                        array(
                            'Name' => 'Test2',
                            'Price' => 200,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        ),
                        array(
                            'Name' => 'Test3',
                            'Price' => 300,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        )
                        
                    )
                )
            ),
            array(
                $adapter,
                array(
                    'ReturnURL' => 'http://www.google.com',
                    'MerchantTradeNo' => rand(0, 1000000),
                    'MerchantTradeDate' => date('Y/m/d H:i:s'),
                    'TradeDesc' => '---------',
                    'ChoosePayment' => PaymentMethod::ALL,
                    'Remark' => '',
                    'TotalAmount' => 1800,
                    'Items' => array(
                        array(
                            'Name' => 'Test1',
                            'Price' => 100,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        ),
                        array(
                            'Name' => 'Test2',
                            'Price' => 200,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        ),
                        array(
                            'Name' => 'Test3',
                            'Price' => 300,
                            'Currency' => '元',
                            'Quantity' => 3,
                            'URL' => '',
                        )
                        
                    )
                )
            )
        );
    }

    /**
     * @dataProvider initTestProvider
     */
    public function testPay(Adapter $adapter, array $send)
    {
        $sz = $adapter->pay($send);

        $this->assertContains('__allpayForm', $sz);
        $this->assertContains('送出', $sz);
        $this->assertContains(ServiceURLHelper::TEST, $sz);
    }
}




