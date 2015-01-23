<?php

namespace Avenue\Adapter;

use Avenue\Strategy\Search;

interface ITarget 
{
    /**
     * 初始化 AllPayInOne 元件
     *
     * @param string $hashKey [all in one 介接的 HashKey]
     * @param string $hashIv [all in one 介接的 HashIV]
     * @param string $merchantID [特店編號]
     * @param boolean $isProd [正式環境/測試環境]
     */
    function init($hashKey, $hashIv, $merchantID, $isProd = false);

    /**
     * 結帳
     *
     * @param array $billInfo [訂單資訊關聯陣列]
     */
    function pay(array $send);

    /**
     * 退款
     */
    function cancel();

    /**
     * 通知結果
     */
    function notify();

    /**
     * 查詢訂單
     * 
     * @param  Avenue\AllPay\Strategy\Search $strategy
     * @return json 
     */
    //function search(Search $strategy);
}