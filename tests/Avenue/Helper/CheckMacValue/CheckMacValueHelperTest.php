<?php

namespace Avenue\Helper\CheckMacValue;

use Avenue\PaymentMethod;
use Avenue\Adapter\Adapter;

use Avenue\Helper\TestConfigHelper;
use Avenue\Helper\CheckMacValue\CheckMacValueHelper;
use Avenue\Helper\CheckMacValue\Handler\SortHandler;
use Avenue\Helper\CheckMacValue\Handler\ConvertHandler;
use Avenue\Helper\CheckMacValue\Handler\HashHandler;
use Avenue\Helper\CheckMacValue\Handler\LowerHandler;
use Avenue\Helper\CheckMacValue\Handler\UrlencodeHandler;
use Avenue\Helper\CheckMacValue\Handler\CryptHandler;
use Avenue\Helper\CheckMacValue\Handler\Request;

class CheckMacValueTest extends \PHPUnit_Framework_TestCase
{
    const MD5_LENGTH = 32;

    public function initProvider()
    {
        $arr1 = array(
                    'Apple' => 'mac',
                    'MerchantID' => TestConfigHelper::MERCHANT_ID,
                    'Item' => 'asdojaoisjdajoisdja',
                    'KKOOII' => 'asodiasdojsadallqOO1123',
                    'LV99' => '0099PJ34Nnkj1n3',
                    'ChoosePayment' => 'ALL'
                );

        $arr2 = array('QmmkI' => 'okokmmmaaaPPPP');

        $arr3 = array('Moo' => '');

        return array(
            array($arr1),
            array(array_merge($arr1, $arr2)),
            array(array_merge($arr1, $arr2, $arr3))
        );
    }

    /**
     * @dataProvider initProvider
     */
    public function testSortHandler(array $arr)
    {
        $sortHandler = new SortHandler;

        $request = new Request($arr);

        $sortHandler->handle($request);

        ksort($arr);

        $this->assertEquals($sortHandler->getRequest()->getVal(), $arr);

        $convertHandler = new ConvertHandler;
        $this->_testConvertHandler($convertHandler, $sortHandler->getRequest());

        $hashHandler = new HashHandler(TestConfigHelper::HASH_KEY, TestConfigHelper::HASH_IV);
        $this->_testHashHandler($hashHandler, $convertHandler->getRequest());

        $urlencoder = new UrlencodeHandler();
        $this->_testUrlencodeHandler($urlencoder, $hashHandler->getRequest());

        $lower = new LowerHandler();
        $this->_testLowerHandler($lower, $urlencoder->getRequest());

        $crypt = new CryptHandler();
        $this->_testCryptHandler($crypt, $lower->getRequest());
    }

    public function _testConvertHandler(ConvertHandler $convertHandler, Request $request)
    {
        $convertHandler->handle($request);

        $convertString = $convertHandler->getRequest()->getVal();

        $this->assertContains('&', $convertString);
        $this->assertContains('=', $convertString);
        $this->assertContains('MerchantID', $convertString);
        $this->assertStringStartsWith('A', $convertString);

        return $convertHandler;
    }

    public function _testHashHandler(HashHandler $hashHandler, Request $request)
    {
        $hashHandler->handle($request);

        $hashString = $hashHandler->getRequest()->getVal();

        $this->assertStringStartsWith('HashKey=' . TestConfigHelper::HASH_KEY . '&', $hashString);
        $this->assertContains('MerchantID', $hashString);
        $this->assertStringEndsWith('&HashIV=' . TestConfigHelper::HASH_IV, $hashString);

        return $hashHandler;
    }

    public function _testUrlencodeHandler(UrlencodeHandler $urlencoder, Request $request)
    {
        $urlencoder->handle($request);

        $urlencodeString = $urlencoder->getRequest()->getVal();

        $this->assertStringStartsWith('HashKey', $urlencodeString);
        $this->assertContains('MerchantID', $urlencodeString);
        $this->assertContains('HashIV', $urlencodeString);
        $this->assertContains('%26', $urlencodeString);
        $this->assertContains('%3D', $urlencodeString);

        return $urlencoder;
    }

    public function _testLowerHandler(LowerHandler $lower, Request $request)
    {
        $lower->handle($request);

        $lowerString = $lower->getRequest()->getVal();

        $this->assertStringStartsWith('hashkey', $lowerString);
        $this->assertContains('merchantid', $lowerString);
        $this->assertContains('hashiv', $lowerString);
        $this->assertContains('%26', $lowerString);
        $this->assertContains('%3d', $lowerString);

        return $lower;
    }

    public function _testCryptHandler(CryptHandler $crypt, Request $request)
    {
        $crypt->handle($request);

        $cryptString = $crypt->getRequest()->getVal();

        $this->assertEquals(self::MD5_LENGTH, strlen($cryptString));

        return $crypt;
    }

    /**
     * @dataProvider initProvider
     */
    public function testVal(array $arr)
    {
        $check = new CheckMacValueHelper($arr, TestConfigHelper::HASH_KEY, TestConfigHelper::HASH_IV);

        $this->assertEquals($check->getVal(), $this->getValFromApi($arr));
    }

    protected function getValFromApi(array $arr)
    {
        return $this->cURLPost(TestConfigHelper::API_URL, $arr);
    }

    /**
     * 透過cURL傳遞$_POST資料取得結果
     * 
     * @param  string $url  目標路徑
     * @param  array  $post 傳遞的資料
     * @return string         
     */
    public function cURLPost($url, array $post) 
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true); // 啟用POST
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $sRes = curl_exec($ch);
        
        curl_close($ch);

        return $sRes;
    }
}