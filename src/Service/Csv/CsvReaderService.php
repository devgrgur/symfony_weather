<?php

namespace App\Service\Csv;

use Iterator;
use League\Csv\Exception;
use League\Csv\Reader;
use League\Csv\UnavailableStream;

class CsvReaderService implements CsvReaderServiceInterface
{
    /**
     * @param string $filePath
     *
     * @return Iterator
     * @throws UnavailableStream
     * @throws Exception
     */
    public function createCsvIterator(string $filePath): Iterator
    {
        $csvFile = Reader::createFromPath($filePath);
        $csvFile->setHeaderOffset(0);

        return $csvFile->getIterator();
    }
}
