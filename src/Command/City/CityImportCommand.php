<?php

namespace App\Command\City;

use App\Service\City\CityImportServiceInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CityImportCommand extends Command
{
    /**
     * @var string
     */
    private string $commandName = 'importer:import-cities';

    /**
     * @var string
     */
    private string $description = 'Import the cities data from a CSV file.';

    /**
     * @var CityImportServiceInterface
     */
    private CityImportServiceInterface $cityImportService;

    /**
     * @param CityImportServiceInterface $cityImportService
     * @param string|null $name
     */
    public function __construct(
        CityImportServiceInterface $cityImportService,
        ?string $name = null,
    )
    {
        parent::__construct($name);
        $this->cityImportService = $cityImportService;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->description);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int
    {
        $cityImportReport = $this->cityImportService->import();

        $importedCount = $cityImportReport->getImportedCount();
        $totalCount = $cityImportReport->getTotalCount();

        if ($cityImportReport->isSuccessful())
        {
            $output->writeln(sprintf('Import Successful, imported %d out of %d cities', $importedCount, $totalCount));
            return self::SUCCESS;
        }

        $output->writeln(sprintf('Import Failed, imported %d out of %d cities', $importedCount, $totalCount));
        return self::FAILURE;
    }
}
