<?php

namespace App\Service\Csv;

use Iterator;

interface CsvReaderServiceInterface
{
    /**
     * @param string $filePath
     *
     * @return Iterator
     */
    public function createCsvIterator(string $filePath): Iterator;
}
