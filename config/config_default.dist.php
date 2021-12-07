<?php

use TurbineKreuzberg\Shared\Sentry\SentryConstants;

/**
 * Sentry Configuration
 */
$config[SentryConstants::DSN] = '';

/**
 * Sentry User Tracking
 */
$config[SentryConstants::IGNORED_EXCEPTIONS] = [
    // Example:
    ErrorException::class,
];

$config[SentryConstants::APPLICATION_VERSION] = '1.0.0';
