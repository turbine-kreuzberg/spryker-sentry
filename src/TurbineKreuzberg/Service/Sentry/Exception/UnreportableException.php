<?php

namespace TurbineKreuzberg\Service\Sentry\Exception;

use Exception;
use Throwable;

class UnreportableException extends Exception
{
    /**
     * @param \Throwable $throwable
     *
     * @return static
     */
    public static function fromThrowable(Throwable $throwable): self
    {
        return new self($throwable->getMessage(), $throwable->getCode(), $throwable->getPrevious());
    }
}
