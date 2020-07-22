<?php

/**
 * @package Vault\Action
 * @author  Vinícius Campitelli <eu@viniciuscampitelli.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @since   2020-07-21
 */

namespace Vault\Action;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Vault\Domain\CredentialRepositoryInterface;

/**
 * Action to view a credential
 */
class ViewCredentialAction extends Action
{
    /**
     * Instance for the credential repository
     *
     * @var CredentialRepositoryInterface
     */
    private $credentialRepository;

    /**
     * Constructor
     *
     * @param CredentialRepositoryInterface $credentialRepository Instance for the credential repository
     */
    public function __construct(CredentialRepositoryInterface $credentialRepository)
    {
        $this->credentialRepository = $credentialRepository;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $credentialId = (int) $this->resolveArg('id');
        $credential = $this->credentialRepository->find($credentialId);

        // $this->logger->info("Credential # `${credentialId}` was viewed.");

        return $this->respondWithData($credential);
    }
}