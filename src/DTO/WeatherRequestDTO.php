<?php

namespace App\DTO;

class WeatherRequestDTO
{
    public const string PROPERTY_LATITUDE = 'latitude';
    public const string PROPERTY_LONGITUDE = 'longitude';
    public const string PROPERTY_TIMEZONE = 'timezone';
    public const string PROPERTY_CURRENT = 'current';
    public const string PROPERTY_FORECAST_DAYS = 'forecast_days';

    private string $latitude;

    private string $longitude;

    private string $timezone;

    private int $forecastDays;

    private array $current;

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getForecastDays(): int
    {
        return $this->forecastDays;
    }

    public function setForecastDays(int $forecastDays): void
    {
        $this->forecastDays = $forecastDays;
    }

    public function getCurrent(): array
    {
        return $this->current;
    }

    public function setCurrent(array $current): void
    {
        $this->current = $current;
    }
}
