<?php
// queue_worker.php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the queue worker once
$status = $kernel->call('queue:work --stop-when-empty');

exit($status);
