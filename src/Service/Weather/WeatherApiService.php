<?php

namespace App\Service\Weather;

use App\DTO\Weather\WeatherRequestDTO;
use App\Service\Weather\Builder\WeatherRequestQueryBuilderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherApiService implements WeatherApiServiceInterface
{
    private WeatherRequestQueryBuilderInterface $weatherRequestQueryBuilder;
    private HttpClientInterface $httpClient;
    private string $baseUrl;

    private const string HTTP_METHOD_GET = 'GET';

    private const string OPTION_QUERY = 'query';

    public function __construct(
        WeatherRequestQueryBuilderInterface $weatherRequestQueryBuilder,
        HttpClientInterface $httpClient,
        string $baseUrl
    )
    {
        $this->weatherRequestQueryBuilder = $weatherRequestQueryBuilder;
        $this->httpClient = $httpClient;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param WeatherRequestDTO $weatherRequest
     *
     * @return array
     */
    public function getWeatherData(WeatherRequestDTO $weatherRequest): array
    {
        $query = $this->weatherRequestQueryBuilder->buildQueryFromWeatherRequest($weatherRequest);

        $weatherResponse = $this->httpClient->request(
            self::HTTP_METHOD_GET,
            $this->baseUrl,
            [self::OPTION_QUERY => $query],
        );

        return $weatherResponse->toArray();
    }
}
