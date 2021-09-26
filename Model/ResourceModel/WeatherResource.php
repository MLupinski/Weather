<?php

namespace HTCode\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class WeatherResource extends AbstractDb
{
    public const WEATHER_MAIN_TABLE = 'weather_data';
    protected function _construct()
    {
        $this->_init(self::WEATHER_MAIN_TABLE, 'weather_id');
    }
}
