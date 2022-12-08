<?php

declare(strict_types = 1);

namespace CustomCommand\ImportCustomerData\Console;

interface ImportCustomerDataInterface
{

    /**
     * Import data from Customer data return array
     *
     * @param string $path
     * @return array
     */
    public function importData(string $path) :array;
}
