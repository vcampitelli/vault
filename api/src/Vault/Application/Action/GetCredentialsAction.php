<?php

/**
 * @package Vault\Application
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Application\Action;

use Psr\Http\Message\ResponseInterface;
use Slim\Application\Actions\Action;
use Vault\Application\Domain\ApplicationRepositoryInterface;

class GetCredentialsAction extends Action
{
    /**
     * Instance for the application repository
     *
     * @var ApplicationRepositoryInterface
     */
    private $applicationRepository;

    /**
     * Constructor
     *
     * @param ApplicationRepositoryInterface $applicationRepository Instance for the application repository
     */
    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): ResponseInterface
    {
        $applicationId = $this->resolveArg('application');
        $application = $this->applicationRepository->find($applicationId);

        $response = $application->toArray();
        $response['credentials'] = $application->getCredentialsByEnvironment($this->resolveArg('environment'));
        return $this->respondWithData($response);
    }
}
