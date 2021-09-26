<?php

namespace HTCode\Weather\Model\ResourceModel\Weather;

use HTCode\Weather\Model\ResourceModel\WeatherResource;
use HTCode\Weather\Model\WeatherModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class WeatherCollection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(WeatherModel::class, WeatherResource::class);
    }
}
