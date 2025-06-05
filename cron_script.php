<?php
// cron_script.php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the Laravel scheduler
$status = $kernel->call('schedule:run');

exit($status);
