<?php

namespace HTCode\Weather\Controller\Index;

use HTCode\Weather\Helper\Configuration;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use HTCode\Weather\Service\OpenWeatherApiService;
use HTCode\Weather\Model\Weather\Updater;

class Index implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var OpenWeatherApiService
     */
    protected $apiService;

    /**
     * @var Updater
     */
    protected $updater;

    /**
     * @var Configuration
     */
    protected $configuration;

    public function __construct(
        JsonFactory $jsonFactory,
        OpenWeatherApiService $apiService,
        Updater $updater,
        Configuration $configuration
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->apiService = $apiService;
        $this->updater = $updater;
        $this->configuration = $configuration;
    }

    public function execute()
    {
        $town = $this->configuration->getTown();
        $weatherData = $this->apiService->getWeatherData($this->configuration->getApiKey(), $town);
        $weatherData['town'] = $town;
        $this->updater->saveWeatherHistory($weatherData);

        return $this->jsonFactory->create()->setData($weatherData);
    }
}
