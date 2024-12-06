<?php

namespace App\DTO\City;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CityDTO
{
    /**
     * @var string
     */
    #[SerializedName('city')]
    private string $name;

    /**
     * @var string
     */
    #[SerializedName('lat')]
    private string $latitude;

    /**
     * @var string
     */
    #[SerializedName('lng')]
    private string $longitude;

    /**
     * @var string
     */
    private string $country;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}
