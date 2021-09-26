<?php

namespace HTCode\Weather\Model\Weather;

use HTCode\Weather\Model\WeatherModelFactory;
use HTCode\Weather\Model\ResourceModel\WeatherResource;

class Updater
{
    /**
     * @var WeatherModelFactory
     */
    protected $weatherFactory;

    /**
     * @var WeatherResource
     */
    protected $weatherResource;

    public function __construct(WeatherModelFactory $weatherFactory, WeatherResource $weatherResource)
    {
        $this->weatherFactory = $weatherFactory;
        $this->weatherResource = $weatherResource;
    }

    public function saveWeatherHistory($data)
    {
        $weatherModel = $this->weatherFactory->create();
        $weatherData = [
            'town' => $data['town'],
            'description' => $data['weather'][0]['description'],
            'current_temp' => round((float) $data['main']['temp'] - 273.15),
            'max_temp' => round((float) $data['main']['temp_max'] - 273.15),
            'min_temp' => round((float) $data['main']['temp_min'] - 273.15),
            'wind_speed' => $data['wind']['speed'],
            'check_datetime' => date('Y-m-d H:i:s')
        ];

        $weatherModel->addData($weatherData);
        $this->weatherResource->save($weatherModel);
    }
}
