<?php

namespace TurbineKreuzberg\Shared\Sentry;

interface SentryConstants
{
    /**
     * @var string
     */
    public const DSN = 'SENTRY:CONFIG:DSN';
    /**
     * @var string
     */
    public const IGNORED_EXCEPTIONS = 'SENTRY:CONFIG:IGNORED_EXCEPTIONS';
    /**
     * @var string
     */
    public const TRACE_SAMPLE_RATE = 'SENTRY:CONFIG:TRACE_SAMPLE_RATE';
    /**
     * @var string
     */
    public const APPLICATION_VERSION = 'SENTRY:CONFIG:APPLICATION_VERSION';
    public const CLASS_SERIALIZERS = 'SENTRY:CONFIG:CLASS_SERIALIZERS';
}
