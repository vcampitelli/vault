<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Domain;

use Slim\Domain\DomainException\DomainRecordNotFoundException;

abstract class AbstractJsonRepository
{
    /**
     * Reads JSON into an object
     *
     * @param string $index JSON key for this repository
     * @return \stdClass
     */
    protected function fetchDataFromJson(string $index): \stdClass
    {
        $data = \json_decode(
            \file_get_contents(\APPLICATION_PATH .  DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'database.json')
        );
        return $data->$index;
    }
}