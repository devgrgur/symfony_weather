<?php

namespace App\DTO\City;

class CityImportReportDTO
{
    /**
     * @var bool
     */
    private bool $isSuccessful;

    /**
     * @var int
     */
    private int $totalCount;

    /**
     * @var int
     */
    private int $importedCount;

    /**
     * @return int
     */
    public function getImportedCount(): int
    {
        return $this->importedCount;
    }

    /**
     * @param int $importedCount
     */
    public function setImportedCount(int $importedCount): void
    {
        $this->importedCount = $importedCount;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount(int $totalCount): void
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    /**
     * @param bool $isSuccessful
     */
    public function setIsSuccessful(bool $isSuccessful): void
    {
        $this->isSuccessful = $isSuccessful;
    }
}
