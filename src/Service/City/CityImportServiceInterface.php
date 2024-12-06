<?php

namespace App\Service\City;

use App\DTO\City\CityImportReportDTO;

interface CityImportServiceInterface
{
    /**
     * @return CityImportReportDTO
     */
    public function import(): CityImportReportDTO;
}
