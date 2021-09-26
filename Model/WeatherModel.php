<?php

namespace HTCode\Weather\Model;

use HTCode\Weather\Model\ResourceModel\WeatherResource;
use Magento\Framework\Model\AbstractModel;

class WeatherModel extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(WeatherResource::class);
    }
}
