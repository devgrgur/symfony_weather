<?php

namespace App\Service\Weather;

use App\DTO\WeatherRequestDTO;

interface WeatherApiServiceInterface
{
    /**
     * Get weather data from API
     *
     * @param WeatherRequestDTO $weatherRequest
     * @return array
     */
    public function getWeatherData(WeatherRequestDTO $weatherRequest): array;
}
