<?php

namespace App\Service\Weather\Builder;

use App\DTO\Weather\WeatherRequestDTO;

interface WeatherRequestQueryBuilderInterface
{
    /**
     * Builds valid query from weather request
     *
     * @param WeatherRequestDTO $weatherRequest
     *
     * @return array
     */
    public function buildQueryFromWeatherRequest(WeatherRequestDTO $weatherRequest): array;
}
