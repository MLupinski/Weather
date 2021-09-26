<?php

namespace HTCode\Weather\Service;

use GuzzleHttp\Psr7\ResponseFactory;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use Magento\Framework\Webapi\Rest\Request;

class OpenWeatherApiService
{
    public const OPENWEATHER_API_BASE_URI = 'api.openweathermap.org/data/2.5/weather';
    /**
     * @var ResponseFactory
     */
    protected $responseFactory;

    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    public function __construct(ResponseFactory $responseFactory, ClientFactory $clientFactory)
    {
        $this->responseFactory = $responseFactory;
        $this->clientFactory = $clientFactory;
    }

    public function getWeatherData($apiKey, $town)
    {
        $response = $this->doRequest(
            [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'query' => [
                    'q' => $town,
                    'appid' => $apiKey
                ]
            ]
        );
        if ($response->getStatusCode() !== 200) {
            return $response->getreasonPhrase();
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    protected function doRequest(array $params = [], string $requestMethod = Request::HTTP_METHOD_GET)
    {
        $client = $this->clientFactory->create(
            [
                'config' => [
                    'base_uri' => self::OPENWEATHER_API_BASE_URI
                ]
            ]
        );
        try {
            $response = $client->request($requestMethod, '', $params);
        } catch (GuzzleException $exception) {
            $response = $this->responseFactory->create(
                [
                    'status' => $exception->getCode(),
                    'reason' => $exception->getMessage()
                ]
            );
        }

        return $response;
    }
}
