<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Credential\Domain;

use Slim\Domain\DomainException\DomainRecordNotFoundException;
use Vault\Domain\AbstractJsonRepository;

class CredentialJsonRepository extends AbstractJsonRepository implements CredentialRepositoryInterface
{
    /**
     * Finds a record by its ID
     *
     * @param int $credentialId
     * @return Credential
     */
    public function find(int $credentialId): Credential
    {
        $data = $this->fetchDataFromJson('credentials');
        if (! isset($data->$credentialId)) {
            throw new DomainRecordNotFoundException("Credential {$credentialId} not found");
        }

        $data = $data->$credentialId;

        return new Credential($credentialId, $data->name, $data->value);
    }
}
