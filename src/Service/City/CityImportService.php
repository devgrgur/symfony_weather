<?php

namespace App\Service\City;

use App\DTO\City\CityImportReportDTO;
use App\Service\Csv\CsvReaderServiceInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Iterator;

class CityImportService implements CityImportServiceInterface
{
    private const string FILE_PATH = __DIR__ . '/Data/cities.csv';

    /**
     * @var CsvReaderServiceInterface
     */
    private CsvReaderServiceInterface $csvReaderService;

    private Connection $dbalConnection;

    /**
     * @param CsvReaderServiceInterface $csvReaderService
     *
     * @param Connection $dbalConnection
     */
    public function __construct(
        CsvReaderServiceInterface $csvReaderService,
        Connection $dbalConnection
    ){
        $this->csvReaderService = $csvReaderService;
        $this->dbalConnection = $dbalConnection;
    }

    /**
     * @return CityImportReportDTO
     *
     * @throws Exception
     */
    public function import(): CityImportReportDTO
    {
        $csvIterator = $this->csvReaderService->createCsvIterator(self::FILE_PATH);

        $cities = $this->getAllCities($csvIterator);

        $cityTableColumns = $this->getCityTableColumns($cities[0]);
        $cityTableValues = $this->getCityTableValues($cities);

        $cityTableInsertQuery = "INSERT INTO city (" . $cityTableColumns . ") VALUES " . $cityTableValues;

        $totalCount = count($cities);
        $importedCount = $this->dbalConnection->executeQuery($cityTableInsertQuery)->rowCount();

        $this->dbalConnection->close();

        return $this->createCityImportReportDTO($totalCount, $importedCount);

    }

    /**
     * @param Iterator $csvIterator
     *
     * @return array
     */
    private function getAllCities(Iterator $csvIterator): array
    {
        $cities = [];
        foreach ($csvIterator as $city) {
            $cities[] = $city;
        }

        return $cities;
    }

    /**
     * @param array $cities
     *
     * @return string
     */
    private function getCityTableValues(array $cities): string
    {
        $tableValues = [];
        foreach ($cities as $city) {
            $quotedValues = array_map(function($value) {
                return $this->dbalConnection->quote($value);
            }, $city);

            $tableValues[] = '(' . implode(', ', $quotedValues) . ')';
        }

        $formattedTableValues = implode(', ', $tableValues);

        return $formattedTableValues;
    }

    /**
     * @param array $city
     *
     * @return string
     */
    private function getCityTableColumns(array $city): string
    {
        $tableColumns = array_keys($city);
        $formattedTableColumns = implode(', ', $tableColumns);

        return $formattedTableColumns;
    }

    /**
     * @param int $totalCount
     * @param int $importedCount
     *
     * @return CityImportReportDTO
     */
    private function createCityImportReportDTO(
        int $totalCount,
        int $importedCount
    ): CityImportReportDTO
    {
        $cityImportReportDTO = new CityImportReportDTO();

        $cityImportReportDTO->setTotalCount($totalCount);
        $cityImportReportDTO->setImportedCount($importedCount);
        $cityImportReportDTO->setIsSuccessful($totalCount === $importedCount);

        return $cityImportReportDTO;
    }
}
