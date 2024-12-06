<?php

namespace App\Service\Weather\Builder;

use App\DTO\Weather\WeatherRequestDTO;

class WeatherRequestQueryBuilder implements WeatherRequestQueryBuilderInterface
{
    /**
     * @param WeatherRequestDTO $weatherRequest
     *
     * @return array
     */
    public function buildQueryFromWeatherRequest(WeatherRequestDTO $weatherRequest): array
    {
        return [
            WeatherRequestDTO::PROPERTY_LATITUDE => $weatherRequest->getLatitude(),
            WeatherRequestDTO::PROPERTY_LONGITUDE => $weatherRequest->getLongitude(),
            WeatherRequestDTO::PROPERTY_CURRENT => $this->formatCurrent($weatherRequest->getCurrent()),
            WeatherRequestDTO::PROPERTY_TIMEZONE => $weatherRequest->getTimezone(),
            WeatherRequestDTO::PROPERTY_FORECAST_DAYS => $weatherRequest->getForecastDays(),
        ];
    }

    private function formatCurrent(array $current): string
    {
        return implode(',', $current);
    }
}
