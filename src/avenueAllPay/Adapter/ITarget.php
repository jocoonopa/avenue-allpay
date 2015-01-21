<?php

namespace Avenue\AllPay\Adapter;

use Avenue\AllPay\Strategy\Search;

interface ITarget 
{
    /**
     * 初始化 AllPayInOne 元件
     *
     * @param string $hashKey [all in one 介接的 HashKey]
     * @param string $hashIv [all in one 介接的 HashIV]
     * @param string $merchantID [特店編號]
     * 
     * @return Avenue\AllPay\AllInOne
     */
    abstract public function init($hashKey, $hashIv, $merchantID);

    /**
     * 結帳
     *
     * @param array $billInfo [訂單資訊關聯陣列]
     */
    abstract public function pay();

    /**
     * 退款
     */
    abstract public function cancel();

    /**
     * 通知結果
     */
    abstract public function notify();

    /**
     * 查詢訂單
     * 
     * @param  Avenue\AllPay\Strategy\Search $strategy
     * @return json 
     */
    abstract public function search(Search $strategy);
}