# Spryker Sentry

## About the package
This package enables sentry to work with your SprykerShop by extending the Monitoring Module of Spryker and adding other hooks to here and there to enhance the data in Sentry.

### Features
- Integration of Sentry with the Spryker Monitoring Module
- Possibility to ignore certain Exceptions with a configuration key

## Installation
### Composer
To get the latest version, simply require the package using [Composer](https://getcomposer.org):

```bash
composer require turbinekreuzberg/spryker-sentry
```

### Configuration
Add the `Turbine` namespace to the `CORE_NAMESPACES` in your `config/Shared/config_default.php` file and configure the Sentry DSN:

```php
$config[KernelConstants::PROJECT_NAMESPACES] = [
    // ...
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
