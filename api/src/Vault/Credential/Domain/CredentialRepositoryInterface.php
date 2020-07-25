<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Credential\Domain;

interface CredentialRepositoryInterface
{
    /**
     * Finds a record by its ID
     *
     * @param int $credentialId
     * @return Credential
     */
    public function find(int $credentialId): Credential;
}
