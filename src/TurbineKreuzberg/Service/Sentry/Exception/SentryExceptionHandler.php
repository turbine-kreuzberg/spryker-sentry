<?php

namespace TurbineKreuzberg\Service\Sentry\Exception;

use Throwable;
use TurbineKreuzberg\Service\Sentry\Gateway\SentryGateway;
use TurbineKreuzberg\Service\Sentry\SentryConfig;

class SentryExceptionHandler
{
    /**
     * @var \TurbineKreuzberg\Service\Sentry\Gateway\SentryGateway
     */
    private $sentryGateway;

    /**
     * @var \TurbineKreuzberg\Service\Sentry\SentryConfig
     */
    private $config;

    /**
     * @param \TurbineKreuzberg\Service\Sentry\Gateway\SentryGateway $sentryGateway
     * @param \TurbineKreuzberg\Service\Sentry\SentryConfig $config
     */
    public function __construct(SentryGateway $sentryGateway, SentryConfig $config)
    {
        $this->sentryGateway = $sentryGateway;
        $this->config = $config;
    }

    /**
     * @param \Throwable $throwable
     *
     * @return void
     */
    public function captureException(Throwable $throwable): void
    {
        if ($this->isExceptionIgnored($throwable)) {
            return;
        }

        $this->sentryGateway->captureException($throwable);
    }

    /**
     * @param \Throwable $throwable
     *
     * @return bool
     */
    private function isExceptionIgnored(Throwable $throwable): bool
    {
        $ignoredExceptions = $this->config->getIgnoredExceptions();

        foreach ($ignoredExceptions as $ignoredException) {
            if ($throwable instanceof $ignoredException) {
                return true;
            }
        }

        return false;
    }
}
