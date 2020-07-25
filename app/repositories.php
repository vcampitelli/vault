<?php
declare(strict_types=1);

use Vault\Application\Domain\ApplicationRepositoryInterface;
use Vault\Application\Domain\ApplicationJsonRepository;
use Vault\Credential\Domain\CredentialRepositoryInterface;
use Vault\Credential\Domain\CredentialJsonRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our repository interfaces to their Json implementations
    $containerBuilder->addDefinitions(
        [
            ApplicationRepositoryInterface::class => \DI\autowire(ApplicationJsonRepository::class),
            CredentialRepositoryInterface::class => \DI\autowire(CredentialJsonRepository::class),
        ]
    );
};
