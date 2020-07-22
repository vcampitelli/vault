<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Domain;

use JsonSerializable;

class Credential implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $credentialId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

        /**
     * @param int|null  $credentialId
     * @param string    $name
     * @param string    $value
     */
    public function __construct(?int $credentialId, string $name, string $value)
    {
        $this->credentialId = $credentialId;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return int|null
     */
    public function credentialId(): ?int
    {
        return $this->credentialId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->credentialId,
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}