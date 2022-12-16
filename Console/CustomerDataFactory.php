<?php

namespace CustomCommand\ImportCustomerData\Console;

use Magento\Framework\Exception\LocalizedException;
use CustomCommand\ImportCustomerData\Console\ImportJson;
use CustomCommand\ImportCustomerData\Console\ImportCsv;

class CustomerDataFactory
{

    /**
     * @var ImportJson
     */
    private $importCsv;

    /**
     * @var ImportCsv
     */
    private $importJson;

    /**
     * Param
     *
     * @param ImportJson $importJson
     * @param ImportCsv $importCsv
     */
    
    public function __construct(
        ImportJson $importJson,
        ImportCsv $importCsv
    ) {
        $this->importJson = $importJson;
        $this->importCsv = $importCsv;
    }
    /**
     * Create to supply arr data
     *
     * @param string $classVar
     * @param string $path
     */
    public function create(string $classVar, string $path)
    {
        switch ($classVar) {
            case 'json':
                $data = $this->importJson->importData($path);
                break;
            case 'csv':
                $data = $this->importCsv->importData($path);
                break;
            default:
                throw new LocalizedException(__("Undefine Method"));
        }

        return $data;
    }
}
