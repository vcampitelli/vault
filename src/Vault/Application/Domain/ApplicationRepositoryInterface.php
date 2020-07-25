<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-24
 */

namespace Vault\Application\Domain;

interface ApplicationRepositoryInterface
{
    /**
     * Finds a record by its ID
     *
     * @param string $applicationId
     * @return Application
     */
    public function find(string $applicationId): Application;
}