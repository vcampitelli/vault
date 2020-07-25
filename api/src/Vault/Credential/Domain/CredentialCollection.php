<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-24
 */

namespace Vault\Credential\Domain;

class CredentialCollection
{
    /**
     * List of credentials indexed by environment
     *
     * @var CredentialList[]
     */
    private $credentials;

    /**
     * Constructor
     *
     * @param CredentialRepositoryInterface $credentialRepository Credential repository
     * @param array $credentials Credentials data
     */
    public function __construct(CredentialRepositoryInterface $credentialRepository, array $credentials)
    {
        $data = [];
        foreach ($credentials as $environment => $credentialIds) {
            $storage = new CredentialList();
            foreach ($credentialIds as $credentialId) {
                $storage->attach(
                    $credentialRepository->find($credentialId),
                    $environment
                );
            }
            $data[$environment] = $storage;
        }
        $this->credentials = $data;
    }

    /**
     * Returns the credential list for the specified environment
     *
     * @param string $environment
     * @return CredentialList
     */
    public function getByEnvironment(string $environment): CredentialList
    {
        if (! isset($this->credentials[$environment])) {
            $this->credentials[$environment] = new CredentialList();
        }
        return $this->credentials[$environment];
    }
}
