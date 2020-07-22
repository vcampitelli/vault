<?php
declare(strict_types=1);

use Vault\Domain\CredentialRepositoryInterface;
use Vault\Domain\CredentialRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our CredentialRepositoryInterface interface to its default implementation
    $containerBuilder->addDefinitions(
        [
            CredentialRepositoryInterface::class => \DI\autowire(CredentialRepository::class),
        ]
    );
};
