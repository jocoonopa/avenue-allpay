<?php

namespace Avenue\Helper\Param;

use Avenue\AllInOne;
use Avenue\Helper\Param\ParamHelper;

class SendParamHelper extends ParamHelper
{
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    public function setItems(array $arr)
    {
        $this->dataProvider['Items'] = $arr;
    }

    public function addItem(array $item)
    {
        $this->dataProvider['Items'][] = $item;
    }

    public function removeItems()
    {
        $this->dataProvider['Items'] = array();
    }

    public function getItems()
    {
        return $this->dataProvider['Items'];
    }

    public function setReturnURL($val)
    {
        $this->dataProvider['ReturnURL'] = $val;

        return $this;
    }

    public function getReturnURL()
    {
        return $this->get('ReturnURL');
    }

    public function setMerchantTradeNo($val)
    {
        $this->dataProvider['MerchantTradeNo'] = $val;

        return $this;
    }

    public function getMerchantTradeNo()
    {
        return $this->get('MerchantTradeNo');
    }

    public function setMerchantTradeDate($val)
    {
        $this->dataProvider['MerchantTradeDate'] = $val;

        return $this;
    }

    public function getMerchantTradeDate()
    {
        return $this->get('MerchantTradeDate');
    }

    public function setTradeDesc($val)
    {
        $this->dataProvider['TradeDesc'] = $val;

        return $this;
    }

    public function getTradeDesc()
    {
        return $this->get('TradeDesc');
    }

    public function setChoosePayment($val)
    {
        $this->dataProvider['ChoosePayment'] = $val;

        return $this;
    }

    public function getChoosePayment()
    {
        return $this->get('ChoosePayment');
    }

    public function setRemark($val)
    {
        $this->dataProvider['Remark'] = $val;

        return $this;
    }

    public function getRemark()
    {
        return $this->get('Remark');
    }

    public function setChooseSubPayment($val)
    {
        $this->dataProvider['ChooseSubPayment'] = $val;

        return $this;
    }

    public function getChooseSubPayment()
    {
        return $this->get('ChooseSubPayment');
    }

    public function setNeedExtraPaidInfo($val)
    {
        $this->dataProvider['NeedExtraPaidInfo'] = $val;

        return $this;
    }

    public function getNeedExtraPaidInfo()
    {
        return $this->get('NeedExtraPaidInfo');
    }

    public function setDeviceSource($val)
    {
        $this->dataProvider['DeviceSource'] = $val;

        return $this;
    }

    public function getDeviceSource()
    {
        return $this->get('DeviceSource');
    }

    public function setIgnorePayment($val)
    {
        $this->dataProvider['IgnorePayment'] = $val;

        return $this;
    }

    public function getIgnorePayment()
    {
        return $this->get('IgnorePayment');
    }

    public function setClientBackURL($val)
    {
        $this->dataProvider['ClientBackURL'] = $val;

        return $this;
    }

    public function getClientBackURL()
    {
        return $this->get('ClientBackURL');
    }

    public function setOrderResultURL($val)
    {
        $this->dataProvider['OrderResultURL'] = $val;

        return $this;
    }

    public function getOrderResultURL()
    {
        return $this->get('OrderResultURL');
    }

    public function setTotalAmount($val)
    {
        $this->dataProvider['TotalAmount'] = $val;

        return $this;
    }

    public function getTotalAmount()
    {
        return $this->get('TotalAmount');
    }

    public function setPlatformID($val)
    {
        $this->dataProvider['PlatformID'] = $val;

        return $this;
    }

    public function getPlatformID()
    {
        return $this->get('PlatformID');
    }

    public function setPlatformChargeFee($val)
    {
        $this->dataProvider['PlatformChargeFee'] = $val;

        return $this;
    }

    public function getPlatformChargeFee()
    {
        return $this->get('PlatformChargeFee');
    }

    public function setExpireDate($val)
    {
        $this->dataProvider['ExpireDate'] = $val;

        return $this;
    }

    public function getExpireDate()
    {
        return $this->get('ExpireDate');
    }

    public function setPaymentInfoURL($val)
    {
        $this->dataProvider['PaymentInfoURL'] = $val;

        return $this;
    }

    public function getPaymentInfoURL()
    {
        return $this->get('PaymentInfoURL');
    }

    public function setClientRedirectURL($val)
    {
        $this->dataProvider['ClientRedirectURL'] = $val;

        return $this;
    }

    public function getClientRedirectURL()
    {
        return $this->get('ClientRedirectURL');
    }

    public function setDesc_1($val)
    {
        $this->dataProvider['Desc_1'] = $val;

        return $this;
    }

    public function getDesc_1()
    {
        return $this->get('Desc_1');
    }

    public function setDesc_2($val)
    {
        $this->dataProvider['Desc_2'] = $val;

        return $this;
    }

    public function getDesc_2()
    {
        return $this->get('Desc_2');
    }

    public function setDesc_3($val)
    {
        $this->dataProvider['Desc_3'] = $val;

        return $this;
    }

    public function getDesc_3()
    {
        return $this->get('Desc_3');
    }

    public function setDesc_4($val)
    {
        $this->dataProvider['Desc_4'] = $val;

        return $this;
    }

    public function getDesc_4()
    {
        return $this->get('Desc_4');
    }

    public function setAlipayItemName($val)
    {
        $this->dataProvider['AlipayItemName'] = $val;

        return $this;
    }

    public function getAlipayItemName()
    {
        return $this->get('AlipayItemName');
    }

    public function setAlipayItemCounts($val)
    {
        $this->dataProvider['AlipayItemCounts'] = $val;

        return $this;
    }

    public function getAlipayItemCounts()
    {
        return $this->get('AlipayItemCounts');
    }

    public function setAlipayItemPrice($val)
    {
        $this->dataProvider['AlipayItemPrice'] = $val;

        return $this;
    }

    public function getAlipayItemPrice()
    {
        return $this->get('AlipayItemPrice');
    }

    public function setEmail($val)
    {
        $this->dataProvider['Email'] = $val;

        return $this;
    }

    public function getEmail()
    {
        return $this->get('Email');
    }

    public function setPhoneNo($val)
    {
        $this->dataProvider['PhoneNo'] = $val;

        return $this;
    }

    public function getPhoneNo()
    {
        return $this->get('PhoneNo');
    }

    public function setUserName($val)
    {
        $this->dataProvider['UserName'] = $val;

        return $this;
    }

    public function getUserName()
    {
        return $this->get('UserName');
    }

    public function setCreditInstallment($val)
    {
        $this->dataProvider['CreditInstallment'] = $val;

        return $this;
    }

    public function getCreditInstallment()
    {
        return $this->get('CreditInstallment');
    }

    public function setRedeem($val)
    {
        $this->dataProvider['Redeem'] = $val;

        return $this;
    }

    public function getRedeem()
    {
        return $this->get('Redeem');
    }

    public function setUnionPay($val)
    {
        $this->dataProvider['UnionPay'] = $val;

        return $this;
    }

    public function getUnionPay()
    {
        return $this->get('UnionPay');
    }

    public function setLanguage($val)
    {
        $this->dataProvider['Language'] = $val;

        return $this;
    }

    public function getLanguage()
    {
        return $this->get('Language');
    }

    public function setPeriodAmount($val)
    {
        $this->dataProvider['PeriodAmount'] = $val;

        return $this;
    }

    public function getPeriodAmount()
    {
        return $this->get('PeriodAmount');
    }

    public function setPeriodType($val)
    {
        $this->dataProvider['PeriodType'] = $val;

        return $this;
    }

    public function getPeriodType()
    {
        return $this->get('PeriodType');
    }

    public function setFrequency($val)
    {
        $this->dataProvider['Frequency'] = $val;

        return $this;
    }

    public function getFrequency()
    {
        return $this->get('Frequency');
    }

    public function setExecTimes($val)
    {
        $this->dataProvider['ExecTimes'] = $val;

        return $this;
    }

    public function getExecTimes()
    {
        return $this->get('ExecTimes');
    }

    public function setPeriodReturnURL($val)
    {
        $this->dataProvider['PeriodReturnURL'] = $val;

        return $this;
    }

    public function getPeriodReturnURL()
    {
        return $this->get('PeriodReturnURL');
    }
}
