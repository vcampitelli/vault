<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Domain;

use App\Domain\DomainException\DomainRecordNotFoundException;

class CredentialRepository implements CredentialRepositoryInterface
{
    /**
     * Finds a record by its ID
     *
     * @param int $credentialId
     * @return Credential
     */
    public function find(int $credentialId): Credential
    {
        return new Credential($credentialId, 'APP_ENVIRONMENT', 'development');
    }
}