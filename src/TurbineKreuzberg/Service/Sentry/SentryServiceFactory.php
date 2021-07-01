<?php

namespace TurbineKreuzberg\Service\Sentry;

use Sentry\State\HubInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;
use TurbineKreuzberg\Service\Sentry\Exception\SentryExceptionHandler;
use TurbineKreuzberg\Service\Sentry\Gateway\SentryGateway;

/**
 * @method \TurbineKreuzberg\Service\Sentry\SentryConfig getConfig()
 */
class SentryServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Sentry\State\HubInterface
     */
    protected function getSentryHub(): HubInterface
    {
        return $this->getProvidedDependency(SentryDependencyProvider::SENTRY_HUB);
    }

    /**
     * @return \TurbineKreuzberg\Service\Sentry\Gateway\SentryGateway
     */
    public function createSentryGateway(): SentryGateway
    {
        return new SentryGateway(
            $this->getSentryHub()
        );
    }

    /**
     * @return \TurbineKreuzberg\Service\Sentry\Exception\SentryExceptionHandler
     */
    public function createSentryExceptionHandler(): SentryExceptionHandler
    {
        return new SentryExceptionHandler(
            $this->createSentryGateway(),
            $this->getConfig()
        );
    }
}
