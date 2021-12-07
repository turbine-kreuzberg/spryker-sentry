# Spryker Sentry

## About the package
This package enables [Sentry.io](https://sentry.io) to work with your [Spryker](https://spryker.com) shop by extending the Monitoring Module of Spryker and adding other hooks to here and there to enhance the data in Sentry.

### Features
- Integration of [Sentry.io](https://sentry.io) with the Spryker [Monitoring Module](https://github.com/spryker/monitoring)
- Possibility to ignore certain Exceptions with a configuration key

## Installation
### Composer
To get the latest version, simply require the package using [Composer](https://getcomposer.org):

```bash
composer require turbine-kreuzberg/spryker-sentry
```

### Configuration
Add the `TurbineKreuzberg` namespace to the `PROJECT_NAMESPACES` in your `config/Shared/config_default.php` file and configure the Sentry DSN:

```php
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'TurbineKreuzberg',
    // ...
];

$config[\TurbineKreuzberg\Shared\Sentry\SentryConstants::DSN] = '<your sentry DSN>';
```

Add the `SentryMonitoringExtensionPlugin` to `Pyz\Service\Monitoring\MonitoringDependencyProvider`:
```php
<?php

namespace Pyz\Service\Monitoring;

use Spryker\Service\Monitoring\MonitoringDependencyProvider as SprykerMonitoringDependencyProvider;
use TurbineKreuzberg\Service\Sentry\Plugin\Monitoring\SentryMonitoringExtensionPlugin;

class MonitoringDependencyProvider extends SprykerMonitoringDependencyProvider
{
    protected function getMonitoringExtensions(): array
    {
        return [
            // ...
            new SentryMonitoringExtensionPlugin(),
            // ...
        ];
    }
}
```

## Additional Configurations
You can adjust some configurations on the sentry module by adding some of this lines to your config file (ex. config_default.php):
```php
// You can ignore certain exceptions by adding them to this array
$config[SentryConstants::IGNORED_EXCEPTIONS] = [
    ErrorException::class, // Example
];

// You can set your application version so that it gets reported to sentry
$config[SentryConstants::APPLICATION_VERSION] = '1.0.0';

// You can even get it from an env variable
$config[SentryConstants::APPLICATION_VERSION] = getenv('MY_APP_VERSION');

// You can set the percentage of your requests that are going to be traced for
// performance monitoring, value goes from 0 to 1, being 0.2 = 20%
$config[SentryConstants::TRACE_SAMPLE_RATE] = 0.4;
```
