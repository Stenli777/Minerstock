<?php

namespace App\Services;

use App\Models\WtmCoin;

class BtcExchangeRateService
{
    protected $exchangeRate;

    public function __construct()
    {
        $this->exchangeRate = $this->fetchBtcExchangeRate();
    }

    /**
     * Получить курс BTC в долларах.
     *
     * @return float
     */
    public function getBtcExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Получить курс BTC из таблицы wtm_coins.
     *
     * @return float
     */
    protected function fetchBtcExchangeRate()
    {
        // Предполагается, что в таблице wtm_coins есть запись с именем 'BTC'
        $coin = WtmCoin::where('tag', 'BTC')->first();

        return $coin ? $coin->exchange_rate : 0;
    }
}
