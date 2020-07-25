<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-24
 */

namespace Vault\Application\Domain;

use Vault\Credential\Domain\CredentialCollection;
use JsonSerializable;

class Application implements JsonSerializable
{
    /**
     * @var string|null
     */
    private $applicationId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var CredentialCollection|null
     */
    private $credentialCollection;

    /**
     * @param string|null $applicationId
     * @param string      $name
     * @param CredentialCollection|null $credentialCollection
     */
    public function __construct(?string $applicationId, string $name, ?CredentialCollection $credentialCollection)
    {
        $this->applicationId = $applicationId;
        $this->name = $name;
        $this->credentialCollection = $credentialCollection;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getCredentialsByEnvironment(string $environment)
    {
        return $this->credentialCollection->getByEnvironment($environment);
    }

    /**
     * Returns this record as an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->applicationId,
            'name' => $this->name,
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
