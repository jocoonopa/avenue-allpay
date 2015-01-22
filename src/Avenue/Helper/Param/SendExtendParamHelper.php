<?php

namespace Avenue\Helper\Param;

use Avenue\AllInOne;
use Avenue\Helper\Param\ParamHelper;

class SendExtendParamHelper extends ParamHelper
{
    public function setExpireDate($val)
    {
        $this->dataProvider['ExpireDate'] = $val;

        return $this;
    }

    public function getExpireDate()
    {
        return $this->get('ExpireDate');
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
    public function setClientRedirectURL($val)
    {
        $this->dataProvider['ClientRedirectURL'] = $val;

        return $this;
    }

    public function getClientRedirectURL()
    {
        return $this->get('ClientRedirectURL');
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
    public function setExpireTime($val)
    {
        $this->dataProvider['ExpireTime'] = $val;

        return $this;
    }

    public function getExpireTime()
    {
        return $this->get('ExpireTime');
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
    public function setInstallmentAmount($val)
    {
        $this->dataProvider['InstallmentAmount'] = $val;

        return $this;
    }

    public function getInstallmentAmount()
    {
        return $this->get('InstallmentAmount');
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

    public function setPaymentInfoURL($val)
    {
        $this->dataProvider['PaymentInfoURL'] = $val;

        return $this;
    }

    public function getPaymentInfoURL()
    {
        return $this->get('PaymentInfoURL');
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
