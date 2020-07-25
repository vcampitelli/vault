<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-24
 */

namespace Vault\Application\Domain;

use Slim\Domain\DomainException\DomainRecordNotFoundException;
use Vault\Credential\Domain\CredentialCollection;
use Vault\Credential\Domain\CredentialRepositoryInterface;
use Vault\Domain\AbstractJsonRepository;

class ApplicationJsonRepository extends AbstractJsonRepository implements ApplicationRepositoryInterface
{
    /**
     * Credential repository
     *
     * @var CredentialRepositoryInterface
     */
    private $credentialRepository;

    /**
     * Constructor
     *
     * @param CredentialRepositoryInterface $credentialRepository Credential repository
     */
    public function __construct(CredentialRepositoryInterface $credentialRepository)
    {
        $this->credentialRepository = $credentialRepository;
    }

    /**
     * Finds a record by its ID
     *
     * @param string $applicationId
     * @return Application
     */
    public function find(string $applicationId): Application
    {
        $data = $this->fetchDataFromJson('applications');
        if (! isset($data->{$applicationId})) {
            throw new DomainRecordNotFoundException("Application {$applicationId} not found");
        }

        $data = $data->{$applicationId};

        return new Application(
            $applicationId,
            $data->name,
            new CredentialCollection(
                $this->credentialRepository,
                (isset($data->credentials)) ? (array) $data->credentials : []
            )
        );
    }
}
