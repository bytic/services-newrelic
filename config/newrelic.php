<?php

// NOT IN USE AT THIS POINT
return [
    'enabled' => getenv('NEWRELIC_ENABLED', true),
    'application_name' => getenv('NEWRELIC_APPLICATION_NAME', ''),
    'license_key' => getenv('NEWRELIC_LICENSE_KEY', ''),

    'api_key' => getenv('NEWRELIC_API_KEY', ''),
    'api_host' => getenv('NEWRELIC_API_HOST', 'api.newrelic.com'),
];
