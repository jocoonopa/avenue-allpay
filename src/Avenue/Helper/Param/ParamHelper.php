<?php

namespace Avenue\Helper\Param;

abstract class ParamHelper
{
    /**
     * 歐付寶傳送建立訂單網址時拋送的參數
     * 
     * @var array
     */
    private $dataProvider = array();

    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    protected function get($key, $default = null)
    {
        return (array_key_exists($key, $this->dataProvider)) ? $this->dataProvider[$key] : $default;
    }
}
