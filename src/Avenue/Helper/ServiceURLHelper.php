<?php

namespace Avenue\Helper;

abstract class ServiceURLHelper
{
    /**
     * 測試環境訂單產生網址
     */
    const TEST = 'http://payment-stage.allpay.com.tw/Cashier/AioCheckOut';

    /**
     * 正式環境訂單產生網址
     */
    const PROD = 'https://payment.allpay.com.tw/Cashier/AioCheckOut';
} 