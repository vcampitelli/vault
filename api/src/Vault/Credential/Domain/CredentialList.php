<?php

/**
 * @package Vault\Domain
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-24
 */

namespace Vault\Credential\Domain;

use JsonSerializable;
use SplObjectStorage;

class CredentialList extends SplObjectStorage implements JsonSerializable
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $response = [];
        foreach ($this as $value) {
            $response[] = $value;
        }
        return $response;
    }
}
